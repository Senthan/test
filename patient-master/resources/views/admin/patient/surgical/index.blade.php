@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li class="active">Surgical Management</li>
    </ul>
    <section class="content" ng-controller="SurgicalController">
        <div class="ui segments">
            <div class="ui segment">
                <a href="{{ route('surgical.create', ['patient' => $patient]) }}" class="ui small green labeled icon button"><i class="plus icon"></i> Create</a>
                <a data-ng-show="selected" ng-href="@{{ edit_url }}" class="ui small primary labeled icon button"><i class="write icon"></i> Edit</a>
                <a data-ng-show="selected" ng-href="@{{ delete_url }}" class="ui small red labeled icon button"><i class="minus icon"></i> Delete</a>
                <a class="ui small button pull-right" href="{{ route('patient.index') }}">Back</a>
            </div>
            <div class="ui black segment">
                <table class="ui compact celled definition table">
                    <thead class="full-width">
                        <tr>
                            <th>date_of_admission</th>
                            <th>date_of_discharge</th>
                            <th>date_of_surgery</th>
                            <th>discharge_plan</th>
                            <th>complication</th>
                            <th>operative_notes</th>
                        </tr>
                    </thead>
                    <tbody ng-cloak>
                        <tr ng-repeat="surgical in surgicals track by $index" ng-click="setSelected();" ng-class="{'bg-info lt': surgical.id === selected.id}">
                            <td>@{{ surgical.date_of_admission }}</td>
                            <td>@{{ surgical.date_of_discharge }}</td>
                            <td>@{{ surgical.date_of_surgery }}</td>
                            <td>@{{ surgical.discharge_plan }}</td>
                            <td>@{{ surgical.complication }}</td>
                            <td>@{{ surgical.operative_notes }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        app.controller('SurgicalController', ['$scope', '$http', function ($scope, $http) {
            $scope.moduleUrl = "{{ route('surgical.index', ['patient' => $patient]) }}";

            $scope.setSelected = function() {
                if($scope.selected && $scope.selected.id == this.surgical.id) {
                    $scope.selected = null;
                } else {
                    $scope.selected = this.surgical;
                    $scope.edit_url = $scope.moduleUrl + '/' + $scope.selected.id + '/edit';
                    $scope.delete_url = $scope.moduleUrl + '/' + $scope.selected.id + '/delete';
                    $scope.show_url = $scope.moduleUrl + '/' + $scope.selected.id;
                }
            };

            $http.get($scope.moduleUrl + '?ajax=true').then(function (response) {
                $scope.surgicals = response.data;
            });

        }]);
    </script>
@endsection

