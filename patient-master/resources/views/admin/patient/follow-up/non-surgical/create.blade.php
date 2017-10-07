@extends('admin.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li>{!! link_to_route('non.surgical.followup.index', 'Non Surgical Followup Management', ['patient' => $patient->id]) !!}</li>
        <li class="active">Create</li>
    </ul>

    <section class="content">
        {!! Form::open(['url' => route('non.surgical.followup.store', ['patient' => $patient]), 'role' => 'form', 'class' => 'form-horizontal ui form']) !!}
            <div class="ui segments">
                <div class="ui segment clearfix">
                    <h2 class="pull-left">Create {!! $patient->patient_uuid !!} Non Surgical Followup</h2>
                    <div class="pull-right">
                        <a class="ui small button" href="{{ route('non.surgical.followup.index', ['patient' => $patient->id]) }}">Back</a>
                    </div>
                </div>
                <div class="ui green segment">
                    @include('admin.patient.follow-up.non-surgical.form')
                </div>
                <div class="ui segment">
                    <button class="ui small button green" type="submit">Save</button>
                    <a class="ui small button" href="{{ route('non.surgical.followup.index', ['patient' => $patient]) }}">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
@endsection