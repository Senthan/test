@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('treatment.template.index', 'Treatment-templates') !!}</li>
        <li class="active">Create</li>
    </ul>
    {!! Form::open(['url' => route('treatment.template.index'), 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Create treatment template</h4></span>
            <span class="pull-right">
                @include('admin.treatment-template.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.treatment-template.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.treatment-template.submit-btn', ['text' => 'Create', 'class' => 'green'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        $(document).ready(function()
        {
            $('[type="file"]').ezdz();
        });
    </script>
@endsection