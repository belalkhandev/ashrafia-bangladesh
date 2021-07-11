<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin', 'disciple'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        $notifications = Notification::get();

        if ($notifications->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'notifications' => $notifications,
                'message' => $notifications->count().' Notification found'
            ]);
        }

        return response()->json([
            'status' => false,
            'notification' => null,
            'message' => 'No notification found'
        ]);


    }

    public function store(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        //set validation rules
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        try {

            $notification = new Notification();
            $notification->title = $request->get('title');
            $notification->description = $request->get('description');

            //upload image
            if ($request->hasFile('image')) {
                $path = Utility::fileUpload($request, 'image', 'notifications');

                $notification->image = $path;
            }

            $notification->created_by = $this->guard()->user()->id;

            if ($notification->save()) {
                return response()->json([
                    'status' => true,
                    'notification' => $notification,
                    'message' => 'Notification has been created successfully'
                ]);
            }

            return response()->json([
                'status' => false,
                'notification' => null,
                'message' => 'Failed to create notification'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while creating notification. '.$e->getMessage()
            ]);            
        }
    }

    public function update(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        //set validation rules
        $rules = [
            'notification_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        try {

            $notification = Notification::find($request->input('notification_id'));
            $notification->title = $request->get('title');
            $notification->description = $request->get('description');

            //upload image
            if ($request->hasFile('image')) {
                $old_image = $notification->image;
                $path = Utility::fileUpload($request, 'image', 'notifications');

                $notification->image = $path;
                if ($old_image) {
                    $base_url = URL::to('/').'/';
                    $old_image = str_replace($base_url, '', $old_image);
                    unlink($old_image);
                }
            }

            $notification->updated_by = $this->guard()->user()->id;

            if ($notification->save()) {
                return response()->json([
                    'status' => true,
                    'notification' => $notification,
                    'message' => 'Notification has been updated successfully'
                ]);
            }

            return response()->json([
                'status' => false,
                'notification' => null,
                'message' => 'Failed to update notification'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while updating notification. '.$e->getMessage()
            ]);            
        }
    }

    public function destroy(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }
        //set validation rules
        $rules = [
            'notification_id' => 'required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $notif = Notification::find($request->input('notification_id'));

        $image= $notif->image;

        if ($notif->delete()) {
            if($image) {
                $base_url = URL::to('/').'/';
                $image = str_replace($base_url, '', $image);
                unlink($image);
            }
            return response()->json([
                'status' => true,
                'message' => 'Notification has been deleted successfully'
            ]);

        }

        

        return response()->json([
            'status' => false,
            'message' => 'Failed to delete'
        ]);

    }

    // send notification
    public function sendNotification(Request $request)
    {
        //set validation rules
        $rules = [
            'notification_id' => 'required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }
        
        $notif = Notification::find($request->get('notification_id'));
        $tokens = User::whereNotNull('uuid')->pluck('uuid')->all();

        if (!$tokens) {
            return "No User Found";
        }

        $SERVER_API_KEY = 'AAAA19sbIac:APA91bEQSnvl-JuFFa1X86zVdvFLwFQo4r87rbCvXoBcWx3uv_X7XLZjO7F_2LZfCzHg42iofWX1Belo_Payjxe4iQP7FE7T56NCbFAT0XF-PJHz6Ye5jBm-mHvbksoT_JDSCdb4YhIC';

        if ($notif->image) {
            $data = [
                "registration_ids" => $tokens,
                "notification" => [
                    "title" => $notif->title,
                    "body" => $notif->description,
                    "image" => $notif->image
                ]
            ];
        } else {
            $data = [
                "registration_ids" => $tokens,
                "notification" => [
                    "title" => $notif->title,
                    "body" => $notif->description,
                    "image" => $notif->image
                ]
            ];
        }

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        $fcm_url = 'https://fcm.googleapis.com/fcm/send';

        curl_setopt($ch, CURLOPT_URL, $fcm_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);

        return response()->json([
            'status' => true,
            'message' => 'Notification has been sent'
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }
}
