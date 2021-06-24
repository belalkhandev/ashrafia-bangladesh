@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Users</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->mureed ? $user->mureed->phone : "" }}</td>
                                <td>{{ $user->mureed ? $user->mureed->age : 0 }}</td>
                                <td>{{ $user->mureed ? $user->mureed->home_address : 0 }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="" class="">
                                            View
                                        </a> |
                                        <a href="" class="">
                                            Edit
                                        </a> |
                                        <a href="" class="">
                                            Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
