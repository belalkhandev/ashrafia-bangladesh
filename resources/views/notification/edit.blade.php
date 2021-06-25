@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">Update Notification</h5>
                    <a href="{{ route('notification.list') }}" class="btn btn-secondary">Notification List</a>
                </div>
                {!! Form::open(['route' => ['notification.update', $notification->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" placeholder="Notification title" class="form-control" value="{{ $notification->title }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description"  class="form-control" placeholder="Write description" rows="5">{{ $notification->description }}</textarea>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="input-file">                            
                            <input type="file" name="image">
                        </div>
                        <span class="text-danger"></span>
                        @if($notification->image)
                            <img src="{{ asset($notification->image) }}" width="100px" alt="">
                        @endif
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Update Notification</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
