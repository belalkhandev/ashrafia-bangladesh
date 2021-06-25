@extends('layouts.master')

@section('content')

    @if($user->mureed)
    <div class="box">
        <div class="box-header">
            <h5 class="box-title">User Profile</h5>
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
                        <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-sm btn-secondary w-100">Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-profile">
                        <h5 class="profile-section-title">Personal Information</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->mureed->name }}</td>
                            </tr>
                            <tr>
                                <th>Father/Husband Name</th>
                                <td>{{ $user->mureed->father_name }}</td>
                            </tr>
                            <tr>
                                <th>Head-of-Family</th>
                                <td>{{ $user->mureed->head_of_family }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ Str::ucfirst($user->mureed->gender) }}</td>
                            </tr>
                            <tr>
                                <th>Birthdate</th>
                                <td>{{ user_formatted_date($user->mureed->birthdate) }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>{{ $user->mureed->age }}</td>
                            </tr>
                            <tr>
                                <th>Blood Group</th>
                                <td>{{ $user->mureed->blood_group }}</td>
                            </tr>
                            <tr>
                                <th>Place</th>
                                <td>{{ $user->mureed->place }}</td>
                            </tr>
                            <tr>
                                <th>NID</th>
                                <td>{{ $user->mureed->nid }}</td>
                            </tr>
                            <tr>
                                <th>Nationality</th>
                                <td>{{ $user->mureed->nationality }}</td>
                            </tr>
                            <tr>
                                <th>Profession</th>
                                <td>{{ $user->mureed->profession }}</td>
                            </tr>
                            <tr>
                                <th>Disciple/Mureed of</th>
                                <td>{{ $user->mureed->disciple_of }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Contact & Address</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>Division</th>
                                <td>{{ $user->mureed->division->name }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                            <tr>
                                <th>Upazila</th>
                                <td>{{ $user->mureed->upazila->name }}</td>
                            </tr>
                            <tr>
                                <th>Home Address</th>
                                <td>{{ $user->mureed->home_address }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ user_formatted_date($user->mureed->mobile) }}</td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td>{{ $user->mureed->telephone_home }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Office Information</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>Address</th>
                                <td>{{ $user->mureed->office_address }}</td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>{{ $user->mureed->upazila->name }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">Emergency Contact</h5>
                        <table>
                            <tr>
                                <th>Emergency Contact</th>
                                <td>{{ $user->mureed->emergency_contact }}</td>
                            </tr>
                            <tr>
                                <th>Emergency Telephone</th>
                                <td>{{ $user->mureed->emergency_telephone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5 class="profile-section-title">Profile Action</h5>
                    <div class="profile-navbar">
                        <ul>
                            <li>
                                <a href="{{ route('user.profile.edit', $user->id) }}">
                                    <i class="fas fa-user"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            @if(Auth::user()->id === $user->id)
                            <li>
                                <a href="">
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
                                <a href="" class="text-danger">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete Account</span>
                                </a>
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

    @else

    <div class="box">
        <div class="box-header">
            <h5 class="box-title">User Profile</h5>
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
                        <h5 class="profile-section-title">Personal Information</h5>
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
                    <h5 class="profile-section-title">Profile Action</h5>
                    <div class="profile-navbar">
                        <ul>
                            @if(Auth::user()->id === $user->id)
                            <li>
                                <a href="">
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
                                <a href="" class="text-danger">
                                    <i class="fas fa-trash"></i>
                                    <span>Delete Account</span>
                                </a>
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

@endsection