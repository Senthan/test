@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('treatment.template.index', 'Treatment-templates ') !!}</li>
        <li class="active">Delete</li>
    </ul>
    {!! Form::model($treatmentTemplate, ['url' => route('treatment.template.destroy', ['treatment-template' => $treatmentTemplate->id]), 'method' => 'DELETE']) !!}
    {!! Form::hidden('id', null) !!}
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Delete treatment template</h4></span>
        </div>
        <div class="panel-body">
            @if($errors->has('id'))
                <p class="alert alert-info">{{ $errors->first('id') }}</p>
            @else
                <p>Do you really want to delete this <strong>"{{ $treatmentTemplate->name }}"</strong> treatment template?</p>
            @endif
        </div>
        <div class="panel-footer">
            @unless($errors->has('id'))
                @include('admin.treatment-template.submit-btn', ['text' => 'Delete', 'class' => 'red'])
            @endunless
            @include('admin.treatment-template.back-btn', ['text' => 'Cancel'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection