@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class=""><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class="{{ request()->is('drug*') ? 'active' : '' }}"><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('drug.index', 'Drug management ') !!}</li>
        <li class="active">Create</li>
    </ul>
    {!! Form::open(['url' => route('drug.store'), 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @include('admin.drug.back-btn', ['text' => 'Drug'])
        </div>
        <div class="panel-body">
            @include('admin.drug.form', ['disabled' => false])
        </div>
        <div class="panel-footer">
            @include('admin.drug.submit-btn', ['text' => 'Create', 'class' => 'success'])
            @include('admin.drug.back-btn', ['text' => 'Cancel'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection