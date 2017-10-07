@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('treatment.template.index', 'Treatment templates ') !!}</li>
        <li class="active">Full Details</li>
    </ul>
    {!! Form::open(['url' => route('treatment.template.image.upload', ['treatment-template' => $treatmentTemplate->id]), 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Upload image</h4></span>
            <span class="pull-right">
               @include('admin.treatment-template.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">

            <div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
                {!! Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    <input type="file" name="image" class="form-control" id="image"/>
                    <p class="help-block">{{ ($errors->has('image') ? $errors->first('image') : '') }}</p>
                </div>
            </div>

        </div>
        <div class="panel-footer text-right">
            @include('admin.treatment-template.submit-btn', ['text' => 'Upload', 'class' => 'green'])
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