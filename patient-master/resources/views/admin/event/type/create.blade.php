@extends('admin.layouts.master')
@section('title', 'Create event type')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('event.index', 'Calendar') !!}</li>
        <li class="active">Create Event Type</li>
    </ul>
    {!! form()->open(['url' => route('event.type.store'), 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ form()->bsCancel('Calendar', 'event.index') }}
        </div>
        <div class="panel-body">
            @include('admin.event.type._form')
        </div>
        <div class="panel-footer">
            {{ form()->bsSubmit('Create') }}
            {{ form()->bsCancel('Cancel', 'event.index') }}
        </div>
    </div>
    {!! form()->close() !!}
@endsection