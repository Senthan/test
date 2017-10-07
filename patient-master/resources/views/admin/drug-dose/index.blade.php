@extends('admin.layouts.master')
@section('content')
    <ul class="nav nav-tabs">
        <li class="{{ request()->is('dose*') ? 'active' : '' }}"><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class=""><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}">Home</a></li>
        <li class="active">drugs</li>
    </ul>
    <div class="panel panel-default" ng-controller="drugController">
        <div class="panel-heading">
            <a href="{{ route('dose.create') }}" class="button ui big positive labeled icon">
                <i class="icon add"></i>Create
            </a>
            <a ng-show="selected" ng-href="@{{ edit_url }}" class="button ui big labeled icon blue a-load">
                <i class="icon pencil"></i>Edit
            </a>
            {{--<a ng-show="selected" ng-href="@{{ delete_url }}" class="button ui big negative labeled icon a-load ">--}}
                {{--<i class="icon trash"></i>Delete--}}
            {{--</a>--}}
        </div>
        <div class="panel-body">

            @if (session('message'))
                <div class="alert alert-success alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                    {{ session('message') }}
                </div>
            @endif

            <div>
                <div ui-grid="gridOptions" ui-grid-pagination ui-grid-selection class="grid"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        app.controller('drugController', ['$scope', '$http', function ($scope, $http) {
            $scope.moduleUrl = "{{ route('dose.index') }}/";
            $scope.drugs = [];
            var columnDefs = [
                { displayName: 'Name', field: 'name'},
                { displayName: 'Dose', field: 'dose.data', cellTemplate:'<span ng-repeat="item in row.entity.dose.data">@{{item.dose}}, </span>'}
            ];
            gridOptions.columnDefs = columnDefs;
            gridOptions.onRegisterApi = function (gridApi) {
                $scope.gridApi = gridApi;
                gridApi.selection.on.rowSelectionChanged($scope,function(rows){
                    $scope.setSelection(gridApi);
                });
                gridApi.selection.on.rowSelectionChangedBatch($scope,function(rows){
                    $scope.setSelection(gridApi);
                });
            };
            $scope.gridOptions = gridOptions;
            $http.get($scope.moduleUrl + '?ajax=true').success(function (items) {
                $scope.drugs = items.data;
                $scope.gridOptions.data =  $scope.drugs;
            });
            $scope.setSelection = function(gridApi) {
                $scope.mySelections = gridApi.selection.getSelectedRows();
                if($scope.mySelections.length == 1) {
                    $scope.selected = $scope.mySelections[0];
                    $scope.show_url = $scope.moduleUrl + $scope.selected.id + '';
                    $scope.edit_url = $scope.moduleUrl + $scope.selected.id + '/edit';
                    $scope.delete_url = $scope.moduleUrl + $scope.selected.id + '/delete';
                } else {
                    $scope.selected = null;
                }
            };
        }]);
    </script>
@endsection