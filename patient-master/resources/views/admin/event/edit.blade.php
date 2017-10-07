@extends('admin.layouts.master')
@section('title', 'Edit event')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('event.index', 'Calendar') !!}</li>
        <li class="active">Edit Event</li>
    </ul>
    {!! form()->model($event, ['url' => route('event.update', ['event' => $event->id]), 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ form()->bsCancel('Calendar', 'event.index') }}
        </div>
        <div class="panel-body">
            @include('admin.event._form')
        </div>
        <div class="panel-footer">
            {{ form()->bsSubmit('Update', 'info') }}
            {{ form()->bsCancel('Cancel', 'event.index') }}
        </div>
    </div>
    {!! form()->close() !!}
@endsection