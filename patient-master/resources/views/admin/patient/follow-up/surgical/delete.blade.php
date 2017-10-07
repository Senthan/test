@extends('admin.layouts.master')
@section('content')


    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li>{!! link_to_route('surgical.followup.index', 'Non Surgical Followup Management', ['patient' => $patient->id]) !!}</li>
        <li class="active">Delete</li>
    </ul>

    <div class="block-header">
        <h1>Delete surgical followup</h1>
    </div>
    <div class="row clearfix">
        <div class="ui segments">
            <div class="ui green segment">
                {!! Form::model($surgicalFollowup, ['url' => route('surgical.followup.destroy', ['patient' => $patient, 'surgicalFollowup' => $surgicalFollowup]), 'role' => 'form', 'class' => 'form-horizontal ui form', 'method' => 'DELETE']) !!}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a class="ui small button" href="{{ route('surgical.followup.index', ['patient' => $patient->id]) }}">Back</a>
                    </div>
                    <div class="panel-body">
                        <p>Do you really want to delete this ({{ $surgicalFollowup->date }}) {!! $patient->patient_uuid !!} SurgicalFollowup?</p>
                    </div>
                    <div class="panel-footer">
                        <button class="ui button red" type="submit">Delete</button>
                        <a class="ui button" href="{{ route('surgical.followup.index', ['patient' => $patient]) }}">Cancel</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection