@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('staff.index', 'staff') !!}</li>
        <li class="active">Create</li>
    </ul>
    {!! Form::open(['url' => route('staff.index'), 'role' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Create staff</h4></span>
            <span class="pull-right">
                @include('admin.staffs.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.staffs.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.staffs.submit-btn', ['text' => 'Create', 'class' => 'green'])
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