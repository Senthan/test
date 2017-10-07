@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('treatment.template.index', 'Treatment templates ') !!}</li>
        <li class="active">Full Details</li>
    </ul>

    {!! Form::model($treatmentTemplate, ['url' => route('treatment.template.image.destroy', $treatmentTemplate->id), 'method' => 'DELETE']) !!}

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Delete image</h4></span>
        </div>

        <div class="panel-body">
            <p>Do you really want to remove the image of <strong>"{!! $treatmentTemplate->surgeryType->name !!}"</strong> ?</p>
        </div>

        <div class="panel-footer">
            @include('admin.treatment-template.submit-btn', ['text' => 'Remove', 'class' => 'red'])
            @include('admin.treatment-template.back-btn', ['text' => 'Cancel', 'parameter' => $treatmentTemplate->id])
        </div>
    </div>

    {!! Form::close() !!}

@endsection