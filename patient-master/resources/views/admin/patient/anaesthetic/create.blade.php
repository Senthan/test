@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'patients') !!}</li>
        <li class="active">Create</li>
    </ul>

    {!! Form::model($anaesthetic, ['url' => route('patient.add.anaesthetic', ['patient' => $patient->id]),  'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Anaesthetic Evaluation</h4></span>
            <span class="pull-right">
                @include('admin.patient.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.patient.anaesthetic.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.patient.submit-btn', ['text' => 'Add Anaesthetic', 'class' => 'green'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        $(function () {
            $('#date').datetimepicker({
                format: 'YYYY-MM-DD HH:MM:ss'
            });

            $('#admission_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#discharge_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@endsection