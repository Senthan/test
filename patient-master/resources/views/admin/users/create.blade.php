@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
{{--        <li>{!! link_to_route('user.index', 'Users') !!}</li>--}}
        <li class="active">Create</li>
    </ul>
{{--    {!! Form::open(['url' => route('user.index'), 'role' => 'form', 'class' => 'form-horizontal']) !!}--}}

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Create user</h4></span>
            <span class="pull-right">
                @include('admin.users.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.users.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.users.submit-btn', ['text' => 'Create', 'class' => 'green'])
        </div>
    </div>
{{--    {!! Form::close() !!}--}}
@endsection