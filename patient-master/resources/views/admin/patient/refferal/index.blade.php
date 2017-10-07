@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li class="active">Refferal Management</li>
    </ul>
    <section class="content" ng-controller="FollowUpController">
        <div class="ui segments">
            <div class="ui segment">
                <a href="{{ route('refferal.create', ['patient' => $patient]) }}" class="ui small green labeled icon button"><i class="plus icon"></i> Create</a>
                <a data-ng-show="selected" ng-href="@{{ edit_url }}" class="ui small primary labeled icon button"><i class="write icon"></i> Edit</a>
                <a data-ng-show="selected" ng-href="@{{ delete_url }}" class="ui small red labeled icon button"><i class="minus icon"></i> Delete</a>
                <a class="ui small button pull-right" href="{{ route('patient.index') }}">Back</a>
            </div>
            <div class="ui black segment">
                <table class="ui compact celled definition table">
                    <thead class="full-width">
                    <tr>
                        <th>Refferal</th>
                        <th>Reffered to</th>
                        <th>Report Admission</th>
                    </tr>
                    </thead>
                    <tbody ng-cloak>
                    <tr ng-repeat="followup in nonSurgicalFollowup track by $index" ng-click="setSelected();" ng-class="{'bg-info lt': followup.id === selected.id}">
                        <td>@{{ followup.refferal }}</td>
                        <td>@{{ followup.reffered_to }}</td>
                        <td>@{{ followup.report }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        app.controller('FollowUpController', ['$scope', '$http', function ($scope, $http) {
            $scope.moduleUrl = "{{ route('refferal.index', ['patient' => $patient]) }}";

            $scope.setSelected = function() {
                if($scope.selected && $scope.selected.id == this.followup.id) {
                    $scope.selected = null;
                } else {
                    $scope.selected = this.followup;
                    $scope.edit_url = $scope.moduleUrl + '/' + $scope.selected.id + '/edit';
                    $scope.delete_url = $scope.moduleUrl + '/' + $scope.selected.id + '/delete';
                    $scope.show_url = $scope.moduleUrl + '/' + $scope.selected.id;
                }
            };

            $http.get($scope.moduleUrl + '?ajax=true').then(function (response) {
                $scope.nonSurgicalFollowup = response.data;
            });

        }]);
    </script>
@endsection

