@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li class="active">Edit</li>
    </ul>
    {!! Form::model($patient, ['url' => route('patient.update', ['patient' => $patient->id]), 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Edit patient</h4></span>
            <span class="pull-right">
                @include('admin.patients.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.patients.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.patient.submit-btn', ['text' => 'Update', 'class' => 'blue'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection