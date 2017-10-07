@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="{{ request()->is('dose*') ? 'active' : '' }}"><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class=""><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('dose.index', 'drug-dose') !!}</li>
        <li class="active">Delete</li>
    </ul>
    {!! Form::model($drug, ['url' => route('dose.destroy', ['dose' => $drug->id]), 'method' => 'DELETE']) !!}
    {!! Form::hidden('id', null) !!}
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Delete drug with dose</h4></span>
        </div>
        <div class="panel-body">
            @if($errors->has('id'))
                <p class="alert alert-info">{{ $errors->first('id') }}</p>
            @else
                <p>Do you really want to delete this <strong>"{{ $drug->name }}"</strong> drug with dose?</p>
            @endif
        </div>
        <div class="panel-footer">
            @unless($errors->has('id'))
                @include('admin.drug-dose.submit-btn', ['text' => 'Delete', 'class' => 'red'])
            @endunless
            @include('admin.drug-dose.back-btn', ['text' => 'Cancel'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection