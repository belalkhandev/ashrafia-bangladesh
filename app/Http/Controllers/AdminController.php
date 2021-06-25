<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Mureed;
use App\Models\Upazila;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function users()
    {
        $data = [
            'users' => User::whereHas('roles', function($q) {
                $q->whereIn('name', ['super_admin', 'admin']);
            })->paginate(10)
        ];

        return view('user-list')->with($data);
    }

    public function mureeds()
    {
        $data = [
            'users' => User::whereHas('mureed')->whereHas('roles', function($q) {
                $q->where('name', 'disciple');
            })->paginate(10)
        ];

        return view('mureeds')->with($data);
    }

    
    public function profile($id)
    {
        if (Auth::user() && (Auth::user()->id == $id || Auth::user()->hasRoles(['super_admin', 'admin']))) {
            //can access
        } else {
            abort(403, 'Access Denied');
        }

        $data = [
            'user' => User::with('mureed')->find($id)
        ];

        return view('profile')->with($data);
    }

    public function profileEdit($id)
    {
        if (Auth::user() && (Auth::user()->id == $id || Auth::user()->hasRoles(['super_admin', 'admin']))) {
            //can access
        } else {
            abort(403, 'Access Denied');
        }

        $mureed = Mureed::where('user_id', $id)->first();

        if (!$mureed) {
            abort(404, 'Page not found');
        }

        $data = [
            'divisions' => Division::get(),
            'districts' => District::where('division_id', $mureed->division_id)->get(),
            'upazilas' => Upazila::where('district_id', $mureed->district_id)->get(),
            'mureed' => $mureed
        ];

        return view('edit-profile')->with($data);
    }

    public function profileUpdate(Request $request, $id)
    {
        if (Auth::user() && (Auth::user()->id == $id || Auth::user()->hasRoles(['super_admin', 'admin']))) {
            //can access
        } else {
            abort(403, 'Access Denied');
        }

        //set validation rules
        $rules = [
            'name' => 'required',
            'father_name' => 'required',
            'head_of_family' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'profession' => 'required',
            'place' => 'required',
            'mobile' => 'required',
            'home_address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'emergency_contact' => 'required',
            'emergency_telephone' => 'required',
            'disciple_of' => 'required',
            'photo' => 'mimes:jpg,png.jpeg,gif'
        ];

        //set validation custom message
        $messages = [
            'father_name.required' => 'Father/Husband name required',
            'division_id.required' => 'Division is required',
            'district_id.required' => 'District is required',
            'disciple_of.required' => 'Disciple of required',
        ];

        $this->validate($request, $rules, $messages);

        try {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->save();
            //udpate murids
            $murid = Mureed::where('user_id', $id)->first();
            $murid->division_id = $request->get('division_id');
            $murid->district_id = $request->get('district_id');
            $murid->upazila_id = $request->get('upazila_id');
            $murid->name = $request->get('name');
            $murid->father_name = $request->get('father_name');
            $murid->head_of_family = $request->get('head_of_family');
            $murid->birthdate = $request->get('birthdate');
            $murid->gender = $request->get('gender');
            $murid->blood_group = $request->get('blood_group');
            $murid->place = $request->get('place');
            $murid->nid = $request->get('nid');
            $murid->nationality = $request->get('nationality');
            $murid->profession = $request->get('profession');
            $murid->home_address = $request->get('home_address');
            $murid->telephone_home = $request->get('telephone_home');
            $murid->mobile = $request->get('mobile');
            $murid->office_address = $request->get('office_address');
            $murid->telephone_office = $request->get('telephone_office');
            $murid->fax = $request->get('fax');
            $murid->emergency_contact = $request->get('emergency_contact');
            $murid->emergency_telephone = $request->get('emergency_telephone');
            $murid->disciple_of = $request->get('disciple_of');
            $murid->email = $request->get('email');
            $murid->website = $request->get('website');

            //photo upload
            if ($request->hasFile('photo')) {
                //find old_photo
                $old_photo = $murid->photo;
                $photo_path = Utility::fileUpload($request, 'photo', 'mureeds');
                $murid->photo = $photo_path;

                if ($old_photo) {
                    unlink($old_photo);
                }
            }
            //signature upload
            if ($request->hasFile('signature')) {
                $old_sign = $murid->signature;
                $sign_path = Utility::fileUpload($request, 'signature', 'mureeds');
                $murid->signature = $sign_path;
                if ($old_sign) {
                    unlink($old_sign);
                }
            }

            $murid->updated_by = Auth::user()->id;

            if ($murid->save()) {
                if(Auth::user()->id !== $id) {
                    return response()->json([
                        'type' => 'success',
                        'title' => 'Congratulation',
                        'message' => 'Congratulations! Updated successfully',
                        'redirect' => route('user.profile', $id)
                    ]);
                }

                return response()->json([
                    'type' => 'success',
                    'title' => 'Congratulation',
                    'message' => 'Congratulations! Updated successfully',
                    'redirect' => route('user.profile', $id)
                ]);
            }

            return response()->json([
                'type' => 'success',
                'title' => 'Congratulation',
                'message' => 'Congratulations! Updated successfully'
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occured while updating. '.$e->getMessage() . $e->getLine(),
            ]);
        }
    }
}
