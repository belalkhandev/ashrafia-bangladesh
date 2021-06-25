<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Utility;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $data = [
            'notifications' => Notification::paginate(20)
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
                unlink($notif_image);
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
}
