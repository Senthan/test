@extends('admin.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient management ') !!}</li>
        <li class="active">Edit</li>
    </ul>
    {!! Form::model($profile, ['url' => route('patient.save.profile', ['patient' => $patient->id]), 'method' => 'PATCH', 'files' => true]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @include('admin.patient.back-btn', ['text' => 'patients'])
        </div>
        <div class="panel-body">
            @include('admin.patient.profile.form', ['disabled' => 'disabled'])
        </div>
        <div class="panel-footer">
            @include('admin.patient.submit-btn', ['text' => 'Update', 'class' => 'info'])
            @include('admin.patient.back-btn', ['text' => 'Cancel'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        $(document).ready(function()
        {
            $('[type="file"]').ezdz();
        });
    </script>
@endsection