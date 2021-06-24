<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mureed;
use App\Models\Role;
use App\Models\User;
use App\Models\Utility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class UsersController extends Controller
{

    public function userList()
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        $users = User::with('mureed')->where('is_active', 1)->where('id', '!=', $this->guard()->user()->id)->get();

        if ($users->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'user' => $users,
                'message' => $users->count().' User found'
            ]);
        }

        return response()->json([
            'status' => false,
            'user' => null,
            'message' => 'No user found'
        ]);
    }

    public function userDetailsShow(Request $request)
    {
        //set validation rules
        $rules = [
            'user_id' => 'required',
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


        $user = User::with('mureed')->find($request->input('user_id'));

        if ($user) {
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => ' User found'
            ]);
        }

        return response()->json([
            'status' => false,
            'user' => null,
            'message' => 'No user found'
        ]);
    }

    //user register
    public function register(Request $request)
    {
        if ($this->guard()->user()) {
            if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Access denied'
                ]);
            }
        }
        
        //set validation rules
        $rules = [
            'name' => 'required',
            'father_name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'nid' => 'unique:mureeds,nid',
            'nationality' => 'required',
            'mobile' => 'required',
            'home_address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];

        //set validation custom message
        $messages = [
            'father_name.required' => 'Father/Husband name required',
            'division_id.required' => 'Division is required',
            'district_id.required' => 'District is required',
            'password_confirmation.required' => 'Confirm password required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            //register new user
            $user = new User();
            $user->name = $request->input('name');
            $user->username = User::userId();
            $user->password = app('hash')->make($request->input('password'));
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

                $murid->created_by = Auth::guard('api')->check() ? Auth::guard('api')->user()->id : $user->id;

                $murid->save();
                DB::commit();
                $user->mureed;

                $token = null;

                if ($this->guard()->user()) {
                    dd($this->guard()->user());
                }

                if(Auth::guard('api')->check()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Congratulations! User registered successfully',
                        'user' => $user,
                    ]);
                } else {                    
                    //create token
                    $token = $user->createToken('ashrafia')->accessToken;
                }

                return response()->json([
                    'status' => true,
                    'message' => 'You have registered successfully',
                    'user' => $user,
                    'token' => $token
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Failed to register',
            ]);

        }catch(\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => 'An error occured while register. '.$e->getMessage() . $e->getLine(),
            ]);
        }
    }

    // login
    public function login(Request $request)
    {
        //set validation rules
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        //set validation custom message
        $messages = [
            'username.required' => 'User ID is required'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $credentials = $request->only('username', 'password');

        if ($authorized = Auth::guard()->attempt($credentials)) {
            $user = Auth::guard()->user();

            if ($user->is_active) {
                $token = $user->createToken($authorized)->accessToken;    
                $user->mureed;

                return response()->json([
                    'status' => true,
                    'message' => 'Logged in successfully',
                    'user' => $user,
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to Login, Invalid credentials',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to login, Invalid credentials'
            ]);
        }
    }

    //user register
    public function update(Request $request)
    {
        if ($this->guard()->user()->id != $request->input('user_id')) {
            if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
                return response()->json([
                    'status' => false,
                    'message' => 'Access denied'
                ]);
            }
        }
        //set validation rules
        $rules = [
            'user_id' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'mobile' => 'required',
            'home_address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ];

        //set validation custom message
        $messages = [
            'father_name.required' => 'Father/Husband name required',
            'division_id.required' => 'Division is required',
            'district_id.required' => 'District is required',
            'password_confirmation.required' => 'Confirm password required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        try {
            $user = User::find($request->input('user_id'));
            $user->name = $request->input('name');
            $user->save();
            //udpate murids
            $murid = Mureed::where('user_id', $request->input('user_id'))->first();
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

            $murid->updated_by = $this->guard()->user()->id;

            if ($murid->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Updated successfully mureed information',
                    'mureed' => $murid,
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Failed to update',
            ]);

        }catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occured while register. '.$e->getMessage() . $e->getLine(),
            ]);
        }
    }

    /**
     * update user role
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function roleUpdate(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        //set validation rules
        $rules = [
            'user_id' => 'required',
            'role_id' => 'required'
        ];

        $messages = [
            'user_id.required' => 'User required',
            'role_id.required' => 'Role required'
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $user = User::find($request->input('user_id'));
        $user->detachRole($user->role());
        //attach new role
        $role = Role::find($request->input('role_id'));
        $user->attachRole($role);

        return response()->json([
            'status' => true,
            'message' => 'User role has been updated'
        ]);

    }

    /**
     * update user pasword
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        //set validation rules
        $rules = [
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $messages = [
            'password.required' => 'New password required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        //check current passwwor matched
        if(!Hash::check($request->get('current_password'), Auth::guard('api')->user()->password)){
            return response()->json([
                'status' => false,
                'message' => 'Current password does not matched'
            ]);
        } else {
            $user = $this->guard()->user();
            $user->password = Hash::make($request['password']);

            if ($user->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Password has been changed successfully'
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Failed to change password'
            ]);
        }

    }
    
    /**
     * update user reset password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }
        //set validation rules
        $rules = [
            'user_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];

        $messages = [
            'password.required' => 'New password required',
        ];

        //make validation
        $validation = Validator::make($request->all(), $rules, $messages);

        //check validation
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $user = User::find($request->input('user_id'));
        $user->password = Hash::make($request['password']);

        if ($user->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Password has been changed successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to change password'
        ]);

    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if ($this->guard()->user()) {
            return response()->json([
                'status' => true,
                'user' => $this->guard()->user(),
                'message' => 'Authorized'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Unauthorized'
        ], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function roleList()
    {
        if (!$this->guard()->user()->hasRoles(['super_admin', 'admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }

        if ($this->guard()->user()->hasRole('super_admin')) {
            $roles = Role::select('id', 'name', 'display_name')->get();
        }

        if ($this->guard()->user()->hasRole('admin')) {
            $roles = Role::select('id', 'name', 'display_name')->where('name', '!=', 'super_admin')->get();
        }

        if ($roles->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'roles' => $roles,
                'message' => 'Roles found'
            ]);
        }

        return response()->json([
            'status' => false,
            'roles' => null,
            'message' => 'No roles found'
        ]);
    }

    /**
     * delete user by superadmin
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(Request $request)
    {
        if (!$this->guard()->user()->hasRoles(['super_admin'])) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied'
            ]);
        }
        //set validation rules
        $rules = [
            'user_id' => 'required',
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

        $user = User::find($request->input('user_id'));
        $mureed = Mureed::where('user_id', $request->input('user_id'))->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Did not find user '
            ],);
        }

        $user->is_active = 0;
        $user->deleted_at = Carbon::now();
        $user->deleted_by = Auth::guard('api')->user()->id;

        if ($user->save()) {
            //murid
            if ($mureed) {
                $mureed->is_active = 0;
                $mureed->deleted_at = Carbon::now();
                $mureed->deleted_by =Auth::guard('api')->user()->id;
                $mureed->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to delete'
        ]);

    }

     /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $token = $this->guard()->user()->token();
        if ($token->revoke()) {
            return response()->json([
                'status' => true,
                'message' => 'You have been successfully logged out!'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to logout!'
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
