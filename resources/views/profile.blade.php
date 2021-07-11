@extends('layouts.master')

@section('content')

    @if($user->mureed)
    <div class="box">
        <div class="box-header">
            <h5 class="box-title">{{ __('lang.user_profile') }}</h5>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile">
                        <img src="{{ $user->mureed ? $user->mureed->photo : "" }}" alt="no-image">
                        <h3>{{ $user->name }}</h3>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            <span>{{ $user->mureed->mobile }}</span>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <span>{{ $user->mureed->email }}</span>
                        </p>
                        <p>
                            <i class="fas fa-globe"></i>
                            <span>{{ $user->mureed->website }}</span>
                        </p>
                        <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-sm btn-secondary w-100">{{ __('lang.edit_profile') }}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-profile">
                        <h5 class="profile-section-title">{{ __('lang.personal_information') }}</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('lang.name') }}</th>
                                <td>{{ $user->mureed->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.father_name') }}</th>
                                <td>{{ $user->mureed->father_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.family_head') }}</th>
                                <td>{{ $user->mureed->head_of_family }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('lang.gender') }}</th>
                                <td>{{ Str::ucfirst($user->mureed->gender) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.birthdate') }}</th>
                                <td>{{ user_formatted_date($user->mureed->birthdate) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.age') }}</th>
                                <td>{{ $user->mureed->age }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.blood_group') }}</th>
                                <td>{{ $user->mureed->blood_group }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.place') }}</th>
                                <td>{{ $user->mureed->place }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.nid') }}</th>
                                <td>{{ $user->mureed->nid }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.nationality') }}</th>
                                <td>{{ $user->mureed->nationality }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.profession') }}</th>
                                <td>{{ $user->mureed->profession }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.desciple') }}</th>
                                <td>{{ $user->mureed->disciple_of }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Contact & Address</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('reg.division') }}</th>
                                <td>{{ $user->mureed->division->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.district') }}</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.upazila') }}</th>
                                <td>{{ $user->mureed->upazila ? $user->mureed->upazila->name : "-" }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.home_address') }}</th>
                                <td>{{ $user->mureed->home_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.mobile_no') }}</th>
                                <td>{{ user_formatted_date($user->mureed->mobile) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.telephone_home') }}</th>
                                <td>{{ $user->mureed->telephone_home }}</td>
                            </tr>                            
                            <tr>
                                <th>{{ __('reg.facebook_id') }}</th>
                                <td>{{ $user->mureed->fax }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Office Information</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('reg.office_address') }}</th>
                                <td>{{ $user->mureed->office_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.telephone_office') }}</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Emergency Contact</h5>
                        <table>
                            <tr>
                                <th>{{ __('reg.emergency_contact') }}</th>
                                <td>{{ $user->mureed->emergency_contact }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.emergency_telephone') }}</th>
                                <td>{{ $user->mureed->emergency_telephone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="profile-section-title">{{ __('lang.profile') }} {{ __('lang.action') }}</h5>
                    <div class="profile-navbar">
                        <ul>
                            <li>
                                <a href="{{ route('user.profile.edit', $user->id) }}">
                                    <i class="fas fa-user"></i>
                                    <span>{{ __('lang.edit_profile') }}</span>
                                </a>
                            </li>
                            @if(Auth::user()->id === $user->id)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="fas fa-key"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->hasRoles(['super_admin', 'admin']) && Auth::user()->id !== $user->id)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#resetPasswordModal">
                                    <i class="fas fa-key"></i>
                                    <span>Reset Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#changeRoleModal">
                                    <i class="fas fa-cog"></i>
                                    <span>Change Role ({{ $user->role()->display_name }})</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->hasRoles(['super_admin']) && Auth::user()->id !== $user->id)
                            <li>
                                {!! Form::open(['route' => ['user.delete', $user->id], 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="deleteSubmit(this, event)">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete Account</span>
                                </button>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer"></div>
    </div>

    @else

    <div class="box">
        <div class="box-header">
            <h5 class="box-title">{{ __('lang.user_profile') }}</h5>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-profile">
                        <h3>{{ $user->name }}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-profile">
                        <h5 class="profile-section-title">{{ __('lang.personal_information') }}</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="profile-section-title">{{ __('lang.profile') }} {{ __('lang.action') }}</h5>
                    <div class="profile-navbar">
                        <ul>
                            @if(Auth::user()->id === $user->id)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="fas fa-key"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->hasRoles(['super_admin', 'admin']) && Auth::user()->id !== $user->id)
                            <li>
                                <a href="">
                                    <i class="fas fa-key"></i>
                                    <span>Reset Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fas fa-cog"></i>
                                    <span>Change Role ({{ $user->role()->display_name }})</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->hasRoles(['super_admin']) && Auth::user()->id !== $user->id)
                            <li>
                                {!! Form::open(['route', ['user.delete', $user->id], 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete Account</span>
                                </button>
                                {!! Form::close() !!}
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">

        </div>
    </div>
    @endif

    <div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::open(['route' => ['user.change.password', $user->id], 'method' => 'PUT']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input type="password" name="current_password" placeholder="********" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" placeholder="********" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="********" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="submit" onclick="formSubmit(this, event)">Reset Password</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRoles(['super_admin', 'admin']) && Auth::user()->id !== $user->id)
        <div class="modal fade" id="resetPasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route' => ['user.reset.password', $user->id], 'method' => 'PUT']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" placeholder="********" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="********" class="form-control">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="submit" onclick="formSubmit(this, event)">Reset Password</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="modal fade" id="changeRoleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {!! Form::open(['route' => ['user.role.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Role</label>
                            {!! Form::select('role', formSelectOptions(\App\Models\Role::get(), 'id', 'display_name'), $user->role()->id, ['placeholder' => 'Select Role', 'class' => 'form-control']) !!}
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="submit" onclick="formSubmit(this, event)">Change Role</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endif
@endsection