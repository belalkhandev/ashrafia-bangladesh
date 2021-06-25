@extends('layouts.master')

@section('content')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolorem fugiat illo iure maiores minus molestiae numquam, placeat sapiente temporibus! Asperiores atque cum deserunt dignissimos dolore enim harum magni quae.
    <div class="dashboard-widgets">
        <div class="row">
            <div class="col-md-3">
                <div class="widget-item">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="widget-content">
                        <h2>{{ \App\Models\User::whereHas('roles', function ($q){ $q->where('name', 'disciple'); })->get()->count() }}</h2>
                        <p>Mureeds</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="widget-content">
                        <h2>{{ \App\Models\User::where('is_active', 1)->whereHas('roles', function ($q){ $q->whereIn('name', ['superadmin', 'admin']); })->get()->count() }}</h2>
                        <p>Superadmin & Admin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="widget-content">
                        <h2>{{ \App\Models\User::where('is_active', 1)->whereHas('mureed', function ($q){ $q->where('gender', 'male'); })->get()->count() }}</h2>
                        <p>Male</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-item">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="widget-content">
                        <h2>{{ \App\Models\User::where('is_active', 1)->whereHas('mureed', function ($q){ $q->where('gender', 'female'); })->get()->count() }}</h2>
                        <p>Female</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
