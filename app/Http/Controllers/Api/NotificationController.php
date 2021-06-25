<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
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

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'notification_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'
        ];

        $this->validate($request, $rules);

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
                    unlink($old_image);
                }
            }

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
