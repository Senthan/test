@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="{{ request()->is('dose*') ? 'active' : '' }}"><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class=""><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('dose.index', 'drug-dose') !!}</li>
        <li class="active">Create</li>
    </ul>
    {!! Form::open(['url' => route('dose.index'), 'role' => 'form', 'class' => 'form-horizontal']) !!}

    <div class="panel panel-default" ng-controller="DoseController">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>Create drug</h4></span>
            <span class="pull-right">
                @include('admin.drug-dose.back-btn', ['text' => 'Back'])
            </span>
        </div>
        <div class="panel-body">
            @include('admin.drug-dose.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.drug-dose.submit-btn', ['text' => 'Create', 'class' => 'green'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        app.controller('DoseController', ['$scope', '$http', '$filter', '$timeout', function($scope, $http, $filter, $timeout) {
            $scope.tags = [
                { text: 'just' },
                { text: 'some' },
                { text: 'cool' },
                { text: 'tags' }
            ];
            $scope.loadTags = function(query) {
                return $http.get('/tags?query=' + query);
            };


            var availableDose = '{!! $dose !!}';
            var parsedDose = JSON.parse(availableDose);
            $scope.availableDose = _.values(parsedDose);

            var selectedDose = [];
            $scope.multipleDose = {};
            $scope.multipleDose.dose =_.values(selectedDose);


        }]);
    </script>

@endsection