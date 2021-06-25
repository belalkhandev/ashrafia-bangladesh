@extends('layouts.master')

@section('content')
    
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="box">
                <div class="box-header box-header-action">
                    <h5 class="box-title">Create Notification</h5>
                    <a href="{{ route('notification.list') }}" class="btn btn-secondary">Notification List</a>
                </div>
                {!! Form::open(['route' => 'notification.store', 'method' => 'POST']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" placeholder="Notification title" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description"  class="form-control" placeholder="Write description" rows="5"></textarea>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="input-file">                            
                            <input type="file" name="image">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Save Notification</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
