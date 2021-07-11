@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <h5 class="box-title">{{ __('lang.user') }}</h5>
                </div>
                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('lang.sl') }}</th>
                                <th>{{ __('lang.user_id') }}</th>
                                <th>{{ __('lang.name') }}</th>
                                <th>{{ __('lang.role') }}</th>
                                <th>{{ __('lang.register_date') }}</th>
                                <th class="text-right">{{ __('lang.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->isNotEmpty())
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role()->name }}</td>
                                    <td>{{ user_formatted_date($user->created_at) }}</td>
                                    <td class="text-right">
                                        <div class="action-group">
                                            <a href="{{ route('user.profile', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                            {!! Form::open(['route' => ['user.delete', $user->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="deleteSubmit(this, event)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else 
                            <tr>
                                <td colspan="6">{{ __('lang.no_data') }}</td>
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