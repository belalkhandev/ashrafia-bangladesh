@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">Notifications</h5>
                    <a href="{{ route('notification.create') }}" class="btn btn-primary">Add Notification</a>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($notifications->isNotEmpty())
                                @foreach ($notifications as $key => $notif)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $notif->title }}</td>
                                    <td>{{ $notif->description }}</td>
                                    <td>Active</td>
                                    <td>
                                        <div class="user-img">
                                            <img src="{{ asset($notif->image) }}" alt="no-image">
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="action-group">
                                            <a href="{{ route('notification.edit', $notif->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('notification.delete', $notif->id) }}" onclick="return confirm('Are you sure want to delete')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
@endsection
