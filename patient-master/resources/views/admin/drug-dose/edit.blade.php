@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class=""><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class="{{ request()->is('drug*') ? 'active' : '' }}"><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('dose.index', 'drug-dose') !!}</li>
        <li class="active">Edit</li>
    </ul>
    {!! Form::model($dose, ['url' => route('dose.update', ['drug' => $dose->id]), 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Edit drug with dose</h4></span>
            <span class="pull-right">
                @include('admin.drug-dose.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.drug-dose.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.drug-dose.submit-btn', ['text' => 'Update', 'class' => 'blue'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection