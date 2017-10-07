@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li class="active">Create</li>
    </ul>

    <section class="content">
        {!! Form::open(['url' => route('patient.store'), 'role' => 'form', 'class' => 'form-horizontal ui form']) !!}
        <div class="ui segments" style="background-color: #f5f5f5; !important;">
            <div class="ui segment clearfix">
                <h2 class="pull-left">New patient</h2>
                <div class="pull-right">
                    <a class="ui small button" href="{{ route('patient.index') }}">Back</a>
                </div>
            </div>
            <div class="ui green segment"  style="background-color: rgba(0, 0, 0, 0.22); !important;">
                @include('admin.patient.form')
            </div>
            <div class="ui segment">
                <button class="ui small button green" type="submit">Save</button>
                <a class="ui small button" href="{{ route('patient.index') }}">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </section>

@endsection