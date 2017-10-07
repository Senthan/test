@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="{{ request()->is('dose*') ? 'active' : '' }}"><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class=""><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('dose.index', 'drug-dose') !!}</li>
        <li class="active">Full Details</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Full Details</h4></span>
            <span class="pull-right">
                @include('admin.drug-dose.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th class="col-sm-2">Name</th>
                    <td>{{ $drug->name }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $drug->dose->dose }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection