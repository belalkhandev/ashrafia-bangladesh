@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">{{ __('lang.notification') }}</h5>
                    @if(Auth::user()->hasRoles(['super_admin', 'admin']))
                    <a href="{{ route('notification.create') }}" class="btn btn-primary">{{ __('lang.add_new') }}</a>
                    @endif
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('lang.sl') }}</th>
                                <th>{{ __('lang.title') }}</th>
                                <th>{{ __('lang.description') }}</th>
                                <th>{{ __('lang.image') }}</th>
                                @if(Auth::user()->hasRoles(['super_admin', 'admin']))
                                <th class="text-right">{{ __('lang.action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if($notifications->isNotEmpty())
                                @foreach ($notifications as $key => $notif)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $notif->title }}</td>
                                    <td>{{ $notif->description }}</td>
                                    <td>
                                        <div class="user-img">
                                            <img src="{{ asset($notif->image) }}" alt="no-image">
                                        </div>
                                    </td>
                                    @if(Auth::user()->hasRoles(['super_admin', 'admin']))
                                    <td class="text-right">
                                        <div class="action-group">
                                            {!! Form::open(['route' => 'send.notification', 'method' => 'POST']) !!}
                                            <input type="hidden" name="notification_id" value="{{ $notif->id }}">
                                            <button class="btn btn-sm btn-secondary" type="submit" title="Send Notification" onclick="formSubmit(this, event)">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                            {!! Form::close() !!}

                                            <a href="{{ route('notification.edit', $notif->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                                            {!! Form::open(['route' => ['notification.delete', $notif->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="deleteSubmit(this, event)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                    @endif
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
