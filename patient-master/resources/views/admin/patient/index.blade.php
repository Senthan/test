@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li><a href="{{ route('admin.home.index') }}">Home</a></li>
        <li class="active">Patient Management</li>
    </ul>
<div ng-controller="PatientController">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a ng-href="{{ route('patient.create') }}" class="button ui big positive labeled icon">
                <i class="icon add"></i>Create
            </a>
            <a ng-show="selected" ng-href="@{{ diagnosis_url  }}" class="button ui big positive labeled icon">
                <i class="icon add"></i>First clinic visit
            </a>
            <div ng-show="selected" class="button ui big labeled icon olive dropdown">
                <div class="text">Admission</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" ng-href="@{{ non_surgical_url  }}">Non Surgical</a>
                    <a class="item" ng-href="@{{ surgical_url  }}">Surgical</a>
                </div>
            </div>
            <a ng-show="selected" ng-href="@{{ refferal_url  }}" class="button ui big labeled icon pink">
                <i class="icon add"></i>Refferal
            </a>
            <div ng-show="selected" class="button ui big labeled icon violet dropdown">
                <div class="text">Follow up</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" ng-href="@{{ non_surgical_follow_up_url  }}">Non Surgical Follow up</a>
                    <a class="item" ng-href="@{{ surgical_follow_up_url  }}">Surgical Follow up</a>
                </div>
            </div>

            <a ng-show="selected" ng-href="@{{ show_url }}" class="button ui big labeled icon a-load orange">
                <i class="list layout icon"></i>Summary
            </a>
            <a ng-show="selected" ng-href="@{{ delete_url }}" class="button ui big negative labeled icon a-load ">
                <i class="icon trash"></i>Delete
            </a>

        </div>
        <div>
            <div ui-grid="gridOptions" ui-grid-expandable ui-grid-grouping ui-grid-exporter ui-grid-pagination ui-grid-selection ui-grid-edit ui-grid-resize-columns ui-grid-move-columns  class="grid"></div>
        </div>

    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.ui.dropdown')
                .dropdown();
        });

        app.controller('PatientController', ['$scope', '$http', '$log', function ($scope, $http, $log) {
            $scope.moduleUrl = "{{ route('patient.index') }}/"

            var columnDefs = [
                { displayName: 'OSC No', field: 'patient_uuid', enableCellEdit: false, minWidth: 100, width: 130, pinnedLeft:true},
                { displayName: 'Name', field: 'name', minWidth: 150, width: 150},
                { displayName: 'Age', field: 'age', minWidth: 60, width: 60},
                { displayName: 'Sex', field: 'sex', editableCellTemplate: 'ui-grid/dropdownEditor',
                    editDropdownOptionsArray: [{ id:'Male', ward: 'Male'}, {id:'Female', ward: 'Female'}, {id:'Other', ward: 'Other'}], editDropdownValueLabel: 'ward', minWidth: 80, width: 80},
                { displayName: 'Address', field: 'address', minWidth: 150, width: 150},
                { displayName: 'Presenting complain', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.presenting_complain}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'Motor examination', field: 'motor_examination', enableCellEdit: false, minWidth: 150, width: 150},
                { displayName: 'Sensory', field: 'sensory', enableCellEdit: false, minWidth: 150, width: 150},
                { displayName: 'Activities of daily living', field: 'activities_of_daily_living', enableCellEdit: false, minWidth: 150, width: 150},
                { displayName: 'Pain Scale', field: 'pain', enableCellEdit: false, minWidth: 150, width: 150},
                { displayName: 'Xary', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.x_ray}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'CT Scan', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.ct_scan}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'MRI', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.miri_scan}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'Surgery', field: 'surgical',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.surgical track by $index">@{{item.surgery}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'Surgical Management', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.surgical_management}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                 { displayName: 'Non Surgical Management', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.non_surgical_management}}</div>',minWidth: 190, width: 190, enableCellEdit: false},
                { displayName: 'Drugs given', field: 'diagnosis',
                    cellTemplate:'<div ng-repeat="(key, item) in row.entity.diagnosis track by $index">@{{item.drugs_given}}</div>',minWidth: 190, width: 190, enableCellEdit: false}
            ];

            gridOptions.enableRowSelection = true;
            gridOptions.expandableRowTemplate = 'expandableRowTemplate.html';
            gridOptions.expandableRowHeight = 150;
            gridOptions.columnDefs = columnDefs;
            gridOptions.enableGridMenu = true;
            gridOptions.enableColumnResizing = true;
            gridOptions.enableSelectAll = true;
            gridOptions.exporterMenuCsv = true;

            gridOptions.onRegisterApi = function (gridApi) {
                $scope.gridApi = gridApi;
                gridApi.selection.on.rowSelectionChanged($scope, function (rows) {
                    $scope.setSelection(gridApi);
                });

                var updateUrl ="{{ route('patient.update') }}";

                gridApi.edit.on.afterCellEdit($scope, function (rowEntity, colDef, newValue, oldValue) {
                    var data = {};
                    data.id = rowEntity.id;
                    data.field_name = colDef.name;
                    data.new_value = newValue;

                    $http.post(updateUrl, data).success(function (response) {

                    });
                });

                gridApi.selection.on.rowSelectionChangedBatch($scope, function (rows) {
                    $scope.setSelection(gridApi);
                });
            }

            $scope.gridOptions = gridOptions;
            $http.get($scope.moduleUrl + '?ajax=true').success(function (data) {
                for(i = 0; i < data.length; i++){
                    var followup = data[i].surgical_followup.length > 0 ? true : false;
                    var followupData = data[i].surgical_followup.concat(data[i].non_surgical_followup);
                        data[i].subGridOptions = {
                        columnDefs: [
                            { name: "Type", field:"type"},
                            { name: "Date", field:"date"},
                            { name: "Complain", field:"complain"},
                            { name: "Examination", field:"examination"},
                            { name: 'Motor examination', field: 'motor_examination'},
                            { name: 'Sensory', field: 'sensory'},
                            { name: 'Activities of daily living', field: 'activities_of_daily_living'},
                            { name: 'Pain Scale', field: 'pain'},
                            { name: 'Investigation', field: 'investigation'},
                            { name: 'Management', field: 'management'}
                        ],
                        data: followupData,
                        disableRowExpandable : followup,
                        enableColumnResizing : true
                    }
                }
                $scope.gridOptions.data =  data;
            });

            $scope.setSelection = function(gridApi) {
                $scope.mySelections = gridApi.selection.getSelectedRows();

                if($scope.mySelections.length == 1) {
                    $scope.selected = $scope.mySelections[0];
                    $scope.show_url = $scope.moduleUrl + $scope.selected.id + '';
                    $scope.edit_url = $scope.moduleUrl + $scope.selected.id + '/edit';
                    $scope.diagnosis_url = $scope.moduleUrl + $scope.selected.id + '/add-diagnosis';
                    $scope.non_surgical_url = $scope.moduleUrl + $scope.selected.id + '/non-surgical';
                    $scope.surgical_url = $scope.moduleUrl + $scope.selected.id + '/surgical';
                    $scope.refferal_url = $scope.moduleUrl + $scope.selected.id + '/refferal';
                    $scope.delete_url = $scope.moduleUrl + $scope.selected.id + '/delete';
                    $scope.non_surgical_follow_up_url = $scope.moduleUrl + $scope.selected.id + '/non-surgical-followup';
                    $scope.surgical_follow_up_url = $scope.moduleUrl + $scope.selected.id + '/surgical-followup';
                    if ($scope.selected.diagnosis && $scope.selected.diagnosis.length) {
                        $scope.exist_diagnosis_url = $scope.moduleUrl + $scope.selected.id + '/existing-diagnosis/'+ $scope.selected.diagnosis[0].id;
                    }
                }
                else {
                    $scope.selected = null;
                }
            };


        }]);

    </script>
@endsection