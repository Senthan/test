@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}">Home</a></li>
        <li class="active">staffs</li>
    </ul>
    <div class="panel panel-default" ng-controller="StaffController">
        <div class="panel-heading">
            <a href="{{ route('staff.create') }}" class="button ui big positive labeled icon">
                <i class="icon add"></i>Create
            </a>
            <a ng-show="selected" ng-href="@{{ edit_url }}" class="button ui big labeled icon blue a-load">
                <i class="icon pencil"></i>Edit
            </a>
            <a ng-show="selected" ng-href="@{{ delete_url }}" class="button ui big negative labeled icon a-load ">
                <i class="icon trash"></i>Delete
            </a>
            <a ng-show="selected" ng-href="@{{ show_url }}" class="button ui big labeled icon a-load orange">
                <i class="list layout icon"></i>Full Details
            </a>
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
                <div ui-grid="gridOptions" ui-grid-pagination ui-grid-selection ui-grid-resize-columns ui-grid-move-columns class="grid"></div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        app.controller('StaffController', ['$scope', '$http', function ($scope, $http) {
            $scope.moduleUrl = "{{ route('staff.index') }}/";
            $scope.staffs = [];
            var columnDefs = [
                { displayName: 'Short Name', field: 'short_name', minWidth: 150, width: 150},
                { displayName: 'First Name', field: 'first_name', minWidth: 150, width: 150},
                { displayName: 'Last Name', field: 'last_name', minWidth: 150, width: 150},
                { displayName: 'Email', field: 'email', minWidth: 150, width: 150},
                { displayName: 'Designation', field: 'designation.data.name', minWidth: 150, width: 150},
                { displayName: 'Active', field: 'is_active', minWidth: 150, width: 150}
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
                $scope.staffs = items.data;
                $scope.gridOptions.data =  $scope.staffs;
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