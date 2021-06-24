<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Mureed;
use App\Models\Role;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function register()
    {
        if (Auth::user()) {
            if (!Auth::user()->hasRoles(['super_admin', 'admin'])) {
                abort(403, 'Access Denied');
            }
        }
        $data = [
            'divisions' => Division::get(),
        ];

        return view('register')->with($data);
    }

    public function store(Request $request)
    {
        if (Auth::user()) {
            if (!Auth::user()->hasRoles(['super_admin', 'admin'])) {
                abort(403, 'Access Denied');
            }
        }
        //set validation rules
        $rules = [
            'name' => 'required',
            'father_name' => 'required',
            'head_of_family' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'nid' => 'unique:mureeds,nid',
            'nationality' => 'required',
            'profession' => 'required',
            'place' => 'required',
            'mobile' => 'required',
            'home_address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'emergency_contact' => 'required',
            'contact_number' => 'required',
            'disciple_of' => 'required',
            'photo' => 'required|mimes:jpg,png.jpeg,gif'
        ];

        //set validation custom message
        $messages = [
            'father_name.required' => 'Father/Husband name required',
            'division_id.required' => 'Division is required',
            'district_id.required' => 'District is required',
            'disciple_of.required' => 'Disciple of required',
        ];

        if ($request->get('password')) {
            $rules['password'] = 'required|confirmed';
            $rules['password_confirmation'] = 'required';
            $messages['password_confirmation.required'] = 'Confirm password required';
        }

        $this->validate($request, $rules, $messages);

        try {
            DB::beginTransaction();

            //register new user
            $user = new User();
            $user->name = $request->input('name');
            $user->username = User::userId();
            $user->password = app('hash')->make($request->input('password') ? $request->input('password') : '123@456');
            $user->otp = rand(111111, 999999);

            if ($user->save()) {
                //assign role
                $user->attachRole(Role::where('name', 'disciple')->first());
                //register as murids
                $murid = new Mureed();
                $murid->user_id = $user->id;
                $murid->division_id = $request->input('division_id');
                $murid->district_id = $request->input('district_id');
                $murid->upazila_id = $request->input('upazila_id');
                $murid->name = $request->input('name');
                $murid->father_name = $request->input('father_name');
                $murid->head_of_family = $request->input('head_of_family');
                $murid->birthdate = $request->input('birthdate');
                $murid->gender = $request->input('gender');
                $murid->blood_group = $request->input('blood_group');
                $murid->place = $request->input('place');
                $murid->nid = $request->input('nid');
                $murid->nationality = $request->input('nationality');
                $murid->profession = $request->input('profession');
                $murid->home_address = $request->input('home_address');
                $murid->telephone_home = $request->input('telephone_home');
                $murid->mobile = $request->input('mobile');
                $murid->office_address = $request->input('office_address');
                $murid->telephone_office = $request->input('telephone_office');
                $murid->fax = $request->input('fax');
                $murid->emergency_contact = $request->input('emergency_contact');
                $murid->emergency_telephone = $request->input('emergency_telephone');
                $murid->disciple_of = $request->input('disciple_of');
                $murid->email = $request->input('email');
                $murid->website = $request->input('website');
                $murid->remarks = $request->input('remarks');

                //photo upload
                if ($request->hasFile('photo')) {
                    $photo_path = Utility::fileUpload($request, 'photo', 'mureeds');

                    $murid->photo = $photo_path;
                }
                //signature upload
                if ($request->hasFile('signature')) {
                    $sign_path = Utility::fileUpload($request, 'signature', 'mureeds');

                    $murid->signature = $sign_path;
                }

                $murid->created_by = Auth::user() ? Auth::user()->id : null;

                $murid->save();
                DB::commit();

                $user->mureed;

                if(Auth::user()) {
                    return response()->json([
                        'type' => 'success',
                        'title' => 'Congratulation',
                        'message' => 'Congratulations! User registered successfully',
                        'data' => $user,
                    ]);
                }

                $password = $request->get('password') ? $request->get('password') : '123@456';

                //atempt to login
                 Auth::attempt(['username' => $user->username, 'password' => $password]);

                if (!Auth::check()) {
                    return response()->json([
                        'type' => 'warning',
                        'title' => 'Congratulation',
                        'message' => 'You have registered successfully',
                    ]);
                } else {
                    return response()->json([
                        'type' => 'success',
                        'title' => 'Congratulation',
                        'message' => 'You have registered successfully',
                    ]);
                }

                
            }

            return response()->json([
                'type' => 'warning',
                'title' => 'Opps! Failed',
                'message' => 'Failed to register',
            ]);

        }catch(\Exception $e) {
            DB::rollback();
            return response()->json([
                'type' => 'error',
                'title' => 'Something went wrong',
                'message' => 'An error occured while register. '.$e->getMessage() . $e->getLine(),
            ]);
        }
    }
}
