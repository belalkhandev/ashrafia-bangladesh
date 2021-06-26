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
            'emergency_telephone' => 'required',
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
            $user->name = $request->get('name');
            $user->username = User::userId();
            $user->password = app('hash')->make($request->get('password') ? $request->get('password') : '123@456');
            $user->otp = rand(111111, 999999);

            if ($user->save()) {
                //assign role
                $user->attachRole(Role::where('name', 'disciple')->first());
                //register as murids
                $murid = new Mureed();
                $murid->user_id = $user->id;
                $murid->division_id = $request->get('division_id');
                $murid->district_id = $request->get('district_id');
                $murid->upazila_id = $request->get('upazila_id');
                $murid->name = $request->get('name');
                $murid->father_name = $request->get('father_name');
                $murid->head_of_family = $request->get('head_of_family');
                $murid->birthdate = database_formatted_date($request->get('birthdate'));
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
                $murid->remarks = $request->get('remarks');

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
                    ]);
                }

                $password = $request->get('password') ? $request->get('password') : '123@456';

                //atempt to login
                 Auth::attempt(['username' => $user->username, 'password' => $password]);

                 return response()->json([
                    'type' => 'success',
                    'title' => 'Congratulation',
                    'message' => 'You have registered successfully',
                    'redirect' => route('fr.home')
                ]);

                
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
