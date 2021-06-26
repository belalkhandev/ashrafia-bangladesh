<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class NotificationsController extends Controller
{
    public function index()
    {
        $data = [
            'notifications' => Notification::orderBy('updated_at', 'DESC')->paginate(20)
        ];

        return view('notification.index')->with($data);
    }

    public function create()
    {

        $data = [
            'page_title' => 'Add new notification',
        ];

        return view('notification.create')->with($data);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];

        $this->validate($request, $rules);

        try {

            $notification = new Notification();
            $notification->title = $request->get('title');
            $notification->description = $request->get('description');

            //upload image
            if ($request->hasFile('image')) {
                $path = Utility::fileUpload($request, 'image', 'notifications');

                $notification->image = $path;
            }

            if ($notification->save()) {
                return response()->json([
                    'type' => 'success',
                    'title' => 'Congratulation',
                    'message' => 'Notification saved successfully'
                ]);
            }

            return response()->json([
                'type' => 'error',
                'title' => 'Failed to create',
                'message' => 'Notificaiotn failed to create'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'type' => 'error',
                'title' => 'Something went wrong',
                'message' => 'An error occurred while creating ' . $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $notificaition = Notification::find($id);

        $data = [
            'notification' => $notificaition,
        ];

        return view('notification.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];

        $this->validate($request, $rules);

        try {

            $notification = Notification::find($id);
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

            if ($notification->save()) {
                return response()->json([
                    'type' => 'success',
                    'title' => 'Congratulation',
                    'message' => 'Notification Updated successfully'
                ]);
            }

            return response()->json([
                'type' => 'error',
                'title' => 'Failed to update',
                'message' => 'Notificaiotn failed to update'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'type' => 'error',
                'title' => 'Something went wrong',
                'message' => 'An error occurred while updating ' . $e->getMessage()
            ]);
        }
    }

    public function destroy(Notification $notification, $id)
    {
        $notification = $notification->find($id);
        $notif_image = $notification->image;

        if ($notification->delete()) {
            if ($notif_image) {
                $base_url = URL::to('/').'/';
                $old_image = str_replace($base_url, '', $notif_image);
                unlink($old_image);
            }

            return response()->json([
                'type' => 'success',
                'title' => 'Deleted',
                'message' => 'Notification Deleted Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed to delete',
            'message' => 'Notification failed to delete'
        ]);
    }

    // send notification
    public function sendNotification(Request $request)
    {
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

        return $response;
    }
}
