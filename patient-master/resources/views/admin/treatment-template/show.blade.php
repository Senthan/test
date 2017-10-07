@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('treatment.template.index', 'Treatment templates ') !!}</li>
        <li class="active">Full Details</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Full Details</h4></span>
            <span class="pull-right">
                @include('admin.treatment-template.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <table class="table table-bordered">
                    <tr>
                        <th class="col-sm-2">Name</th>
                        <td>{{ $treatmentTemplate->surgeryType->name }}</td>
                    </tr>
                    <tr class="template">
                        <th>Template</th>
                        <td>
                        <?php
                             $temp = $treatmentTemplate->en_template;
                        ?>
                        @if($temp)
                            {!! $temp !!}
                        @endif</td>
                    </tr>
                </table>
            </table>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>
                            <span class="pull-left"><h4>Template image</h4></span>
                            <span class="pull-right">
                                @if(empty($treatmentTemplate->image))
                                    <a href="{!! route('treatment.template.image.add', [$treatmentTemplate->id]) !!}" class="button ui big green labeled icon pull-right"><i class="upload icon"></i>Upload</a>
                                @else
                                    <a href="{!! route('treatment.template.image.delete', [$treatmentTemplate->id]) !!}" class="button ui big red labeled icon pull-right"><i class="trash icon"></i>Delete</a>
                                @endif
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            @if(!empty($treatmentTemplate->image))
                                <img src="{{ asset($treatmentTemplate->filePathLogo.$treatmentTemplate->image) }}" class="img-responsive">
                            @else
                                <p class="text-warning">There is no banner image.</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection