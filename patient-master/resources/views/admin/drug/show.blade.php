@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class=""><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class="{{ request()->is('drug*') ? 'active' : '' }}"><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('drug.index', 'Drug management ') !!}</li>
        <li class="active">Full Details</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            @include('admin.drug.back-btn', ['text' => 'Drugs'])
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{ $drug->name }}</td>
                </tr>
            </table>
        </div>
        <div class="panel-footer">
            @include('drug.back-btn', ['text' => 'Cancel'])
        </div>
    </div>
@endsection