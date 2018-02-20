@extends('admin.layouts.master')
@section('title', 'Delete a eventType')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('event.index', 'EventType Management') !!}</li>
        <li class="active">Delete</li>
    </ul>
    {!! form()->model($eventType, ['url' => route('event.type.destroy', ['eventType' => $eventType->id]), 'method' => 'DELETE']) !!}
    {!! form()->hidden('id', null) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ form()->bsCancel('events', 'event.index') }}
        </div>
        <div class="panel-body">
            @if($errors->has('id'))
                <p class="alert alert-info">{{ $errors->first('id') }}</p>
            @else
                <p>Do you really want to delete this ({{ $eventType->name }}) eventType?</p>
            @endif
        </div>
        <div class="panel-footer">
            @unless($errors->has('id'))
                {{ form()->bsSubmit('Delete', 'danger') }}
            @endunless
            {{ form()->bsCancel('Cancel', 'event.index') }}
        </div>
    </div>
    {!! form()->close() !!}
@endsection