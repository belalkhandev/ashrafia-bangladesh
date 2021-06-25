@extends('layouts.master')

@section('content')
    {{-- widgets --}}
    <div class="widgets">
        <div class="row">
            <div class="col-md-3">
                <div class="widget-item widget-one">
                    <div class="widget-body">
                        <div class="widget-content">
                            <p class="text-secondary">Total Mureeds</p>
                            <h1 class="text-info">{{ \App\Models\User::whereHas('mureed')->whereHas('roles', function ($q){ $q->where('name', 'disciple'); })->where('is_active', 1)->get()->count() }}</h1>
                        </div>
                        <div class="widget-icon">
                            <span>
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item widget-two">
                    <div class="widget-body">
                        <div class="widget-content">
                            <p class="text-secondary">Total Superadmin/Admin </p>
                            <h1 class="text-danger">{{ \App\Models\User::where('is_active', 1)->whereHas('roles', function ($q){ $q->whereIn('name', ['superadmin', 'admin']); })->get()->count() }}</h1>
                        </div>
                        <div class="widget-icon">
                            <span>
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item widget-three">
                    <div class="widget-body">
                        <div class="widget-content">
                            <p class="text-secondary">Total Male Mureeds</p>
                            <h1 class="text-success">{{ \App\Models\User::where('is_active', 1)->whereHas('mureed', function ($q){ $q->where('gender', 'male'); })->get()->count() }}</h1>
                        </div>
                        <div class="widget-icon">
                            <span>
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item widget-four">
                    <div class="widget-body">
                        <div class="widget-content">
                            <p class="text-secondary">Total Female Mureeds</p>
                            <h1 class="text-warning">{{ \App\Models\User::where('is_active', 1)->whereHas('mureed', function ($q){ $q->where('gender', 'female'); })->get()->count() }}</h1>
                        </div>
                        <div class="widget-icon">
                            <span>
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Recent Users Table --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">{{ $users->count() }} Recent Registered User</h5>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Register Date</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->isNotEmpty())
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mureed->home_address }}</td>
                                    <td>{{ user_formatted_date($user->created_at) }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else 
                            <tr>
                                <td colspan="6">No Data Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">Notifications</h5>
                </div>
                <div class="box-body"></div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>
@endsection
