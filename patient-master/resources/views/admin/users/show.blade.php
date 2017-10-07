@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('user.index', 'Users ') !!}</li>
        <li class="active">Full Details</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Full Details</h4></span>
            <span class="pull-right">
                @include('admin.users.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th class="col-sm-2">Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role->role_name }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection