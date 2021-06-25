@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">Mureeds</h5>
                    <a href="{{ route('fr.register') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>User ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Profession</th>
                                <th>Address</th>
                                <th>Register Date</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->isNotEmpty())
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ ($users->perPage()*($users->currentPage()-1))+($key+1) }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <div class="user-img">
                                            <img src="{{ $user->mureed->photo }}" alt="{{ $user->name }}_photo">
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $user->name }}</strong>
                                        <br>
                                        {{ $user->mureed->mobile }}
                                    </td>
                                    <td>{{ Str::ucfirst($user->mureed->gender) }}</td>
                                    <td>{{ $user->mureed->age }}</td>
                                    <td>{{ $user->mureed->profession }}</td>
                                    <td>{!! $user->mureed->home_address.', <br>'.$user->mureed->district->name.', '. $user->mureed->division->name.' ' !!}</td>
                                    <td>{{ user_formatted_date($user->created_at) }}</td>
                                    <td class="text-right">
                                        <div class="action-group">
                                            <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
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
            <div class="box-footer">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
