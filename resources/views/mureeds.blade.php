@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">{{ __('lang.mureed') }}</h5>
                    <a href="{{ route('fr.register') }}" class="btn btn-primary">{{ __('lang.add_new') }}</a>
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('lang.sl') }}</th>
                                <th>{{ __('lang.user_id') }}</th>
                                <th>{{ __('lang.photo') }}</th>
                                <th>{{ __('lang.name') }}</th>
                                <th>{{ __('lang.gender') }}</th>
                                <th>{{ __('lang.age') }}</th>
                                <th>{{ __('lang.profession') }}</th>
                                <th>{{ __('lang.address') }}</th>
                                <th>{{ __('lang.register_date') }}</th>
                                <th class="text-right">{{ __('lang.action') }}</th>
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
