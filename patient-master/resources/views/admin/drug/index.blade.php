@extends('admin.layouts.master')
@section('content')

    <ul class="nav nav-tabs">
        <li class=""><a href="{{ route('dose.index') }}">Drag with Dose</a></li>
        <li class="{{ request()->is('drug*') ? 'active' : '' }}"><a href="{{ route('drug.index') }}">Drugs</a></li>
    </ul>
    @if (Session::has('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> {{ Session::get('message') }}
        </div>
    @endif
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li class="active">Drug management</li>
    </ul>
    <div class="panel panel-default"  ng-controller="DrugController">
        <div class="panel-heading">
            <a href="{{ route('drug.create') }}" class="btn btn-sm btn-success"><i class="icon-plus"></i>Create</a>
            <a ng-show="selected" ng-href="@{{ edit_url }}" class="btn btn-sm btn-info btn-addon"><i class="icon-pencil"></i>Edit</a>
            <a ng-show="selected" ng-href="@{{ delete_url }}" class="btn btn-sm btn-danger btn-addon"><i class="icon-trash"></i>Delete</a>
            <a ng-show="selected" ng-href="@{{ show_url }}" class="btn btn-sm btn-default btn-addon"><i class="icon-bar-chart"></i>Full Details</a>
        </div>
        <div class="panel-body">
            <div>
                <div ui-grid="gridOptions" ui-grid-pagination ui-grid-selection class="grid"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    app.controller('DrugController', ['$scope', '$http', function ($scope, $http) {
        $scope.moduleUrl = "{{ route('drug.index') }}/";
        $scope.categorys = [];
        var columnDefs = [
                { displayName: 'Drug Name', field: 'name'}
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
            $scope.gridOptions.data =  items.data;
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