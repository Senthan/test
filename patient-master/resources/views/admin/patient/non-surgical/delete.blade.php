@extends('admin.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li>{!! link_to_route('non.surgical.index', 'Non Surgical Management', ['patient' => $patient->id]) !!}</li>
        <li class="active">Delete</li>
    </ul>

    <div class="block-header">
        <h1>Delete {!! $patient->patient_uuid !!} non surgical</h1>
    </div>
    <div class="row clearfix">
        <div class="ui segments">
            <div class="ui green segment">
                {!! Form::model($nonSurgical, ['url' => route('non.surgical.destroy', ['patient' => $patient->id, 'nonSurgical' => $nonSurgical]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'DELETE']) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="ui small button" href="{{ route('non.surgical.index', ['patient' => $patient->id]) }}">Back</a>
                    </div>
                    <div class="panel-body">
                        <p>Do you really want to delete this ({{ $nonSurgical->date_of_admission }}) Non Surgical?</p>
                    </div>
                    <div class="panel-footer">
                        <button class="ui button red" type="submit">Delete</button>
                        <a class="ui button" href="{{ route('non.surgical.index', ['patient' => $patient->id]) }}">Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection