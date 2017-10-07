@extends('admin.layouts.master')
@section('title', 'Edit a office')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('event.index', 'Calendar') !!}</li>
        <li class="active">Update Event Type</li>
    </ul>
    {!! form()->model($eventType, ['url' => route('event.type.update', ['eventType' => $eventType->id]), 'method' => 'PATCH']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ form()->bsCancel('Calendar', 'event.index') }}
        </div>
        <div class="panel-body">
            @include('admin.event.type._form')
        </div>
        <div class="panel-footer">
            {{ form()->bsSubmit('Update', 'info') }}
            {{ form()->bsCancel('Cancel', 'event.index') }}
        </div>
    </div>
    {!! form()->close() !!}
@endsection