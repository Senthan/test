@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li class="active">Diagnosis</li>
    </ul>

    {!! Form::model($diagnosis, ['url' => route('patient.exist.diagnosis', ['patient' => $patient->id, 'diagnosis' => $diagnosis->id]),  'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default" ng-controller="diagnosisController">
        <div class="panel-heading clearfix">
            <span class="pull-left"><h4>First clinic visit</h4></span>
            <span class="pull-right">
                <a class="ui small button" href="{{ route('patient.index') }}">Back</a>
            </span>
        </div>
        <div class="panel-body">
            @include('admin.patient.diagnosis.form')
        </div>
        <div class="panel-footer text-right">
            @include('admin.patient.submit-btn', ['text' => 'Save', 'class' => 'green'])
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('script')
    <script>

        var  url = "{{ route('patient.update.examination', ['patient' => $patient->id]) }}";

        function keyupFunction() {
            var bath0 = document.getElementById("bath_0");
            var examination = {};
            examination.row = 10;
            examination.col = 1;
            examination.type = 'activities_examination';
            examination.value = document.getElementById("bath_0").value;
            updateExamination(examination, url);
        }

        function updateExamination(examination, url) {
            $.ajax({

                type: "POST",
                url: url,
                data: {data :examination,  _token: "{{ csrf_token() }}", type: 'create'},
            });
        }

        app.controller('diagnosisController', ['$scope', '$http', function ($scope, $http) {
            $(function () {

                $('#date').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                var clickElement = 0;

                $(".celled.table.pain-scale tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'pain_scale';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'pain_scale';
                        examination.value = 1;
                    }
                    updateExamination(examination, url);
                });


                $(".celled.table.left-sensory-impairment tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if ( $( this ).is( ":first-child" ) ) {

                    } else if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'left_sensory_impairment';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'left_sensory_impairment';
                        examination.value = 1;
                    }
                    examination.diagnosis = 'diagnosis';
                    updateExamination(examination, url);
                });


                $(".celled.table.right-sensory-impairment tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if ( $( this ).is( ":first-child" ) ) {

                    } else if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'right_sensory_impairment';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'right_sensory_impairment';
                        examination.value = 1;
                    }
                    examination.diagnosis = 'diagnosis';
                    updateExamination(examination, url);
                });


                $(".celled.table.root-examination tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if ( $( this ).is( ":first-child" ) ) {

                    } else if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'root_examination';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'root_examination';
                        examination.value = 1;
                    }
                    updateExamination(examination, url);
                });


                $(".celled.table.reflexes-examination tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if ( $( this ).is( ":first-child" ) || $( this ).is( ":nth-child(2)" ) ) {

                    } else if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'reflexes_examination';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'reflexes_examination';
                        examination.value = 1;
                    }
                    updateExamination(examination, url);
                });



                $(".table.activities-examination tr").on("click", "td", function (event) {
                    var col = $(this).parent().children().index($(this));
                    var row = $(this).parent().parent().children().index($(this).parent());

                    var examination = {};
                    if ( $( this ).is( ":first-child" ) || (row == 10)) {

                    } else if($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        clickElement = clickElement - 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'activities_examination';
                        examination.value = 0;
                    } else {
                        $(this).addClass('active');
                        clickElement = clickElement + 1;
                        examination.row = row;
                        examination.col = col;
                        examination.type = 'activities_examination';
                        examination.value = 1;
                    }
                    updateExamination(examination, url);
                });

            });
            var doses = {!! $doses !!};
            $scope.diagnosisTypeNames = {!! $diagnosisTypeNames !!};
            var diagnosisTypes = {!! $diagnosisTypes !!};


            $('.grid-9').addClass('col-md-12');
            $('.grid-3').addClass('hidden');

            if($scope.treatmentTemplateImageUrl && $scope.treatmentTemplateImageUrl != '') {
                $scope.treatmentTemplateImageUrl = "{!! route('admin.home.index') !!}" + '/resources/templates/'+$scope.treatmentTemplateImageUrl;
                var grid = $('.grid-9').removeClass('col-md-12');
                grid.addClass('col-md-9');
                $('.grid-3').removeClass('hidden');
                $('.grid-3').addClass('col-md-3');
            }


            $scope.diagnosisChange = function() {
                if($scope.diagnosis) {
                    var diagnosisType = _.where(diagnosisTypes, {id: parseInt($scope.diagnosis)});
                    var templates = _.pluck(diagnosisType, 'treatment_template');
                    $scope.treatmentTemplateImage = (templates && templates[0][0]) ? templates[0][0].image : null;
                    if($scope.treatmentTemplateImage) {
                        $scope.treatmentTemplateImageUrl = "{!! route('admin.home.index') !!}" + '/resources/templates/'+ $scope.treatmentTemplateImage;
                        var grid = $('.grid-9').removeClass('col-md-12');
                        grid.addClass('col-md-9');
                        $('.grid-3').removeClass('hidden');
                        $('.grid-3').addClass('col-md-3');
                    } else {
                        $('.grid-9').removeClass('col-md-9');
                        $('.grid-9').addClass('col-md-12');
                        $('.grid-3').addClass('hidden');
                    }
                    $scope.entreatmentTemplate = (templates && templates[0][0]) ? templates[0][0].en_template : null;
                    $scope.tatreatmentTemplate = (templates && templates[0][0]) ? templates[0][0].ta_template : null;
                    $scope.sitreatmentTemplate = (templates && templates[0][0]) ? templates[0][0].si_template : null;                    $scope.side = (diagnosisType[0] && diagnosisType[0].side == "Active") ? true : false;
                    $scope.type_of_Anaesthesia = (diagnosisType[0] && diagnosisType[0].type_of_Anaesthesia == "Active") ? true : false;
                }
            };

            $scope.addPatientNoteStatus = false;
            $scope.editStatus = false;
            $scope.patientNotes = [];

            $scope.clearPatientNote = function() {
                $scope.drug = null;
                $scope.dose = null;
                $scope.frequency = null;
                $scope.route = null;
                $scope.duration = null;
            };

            $scope.addPatientNote = function() {
                $scope.addPatientNoteStatus = true;
            };

            $scope.savePatientNote = function() {
                if($scope.drugObject && $scope.doseObject && $scope.frequency && $scope.duration && $scope.route) {
                    $scope.patientNotes.push({drug: $scope.drugObject, dose: $scope.doseObject, frequency: $scope.frequency, duration: $scope.duration, route: $scope.route});
                }
                $scope.clearPatientNote();
            };

            $scope.removePatientNote = function(patientNote) {
                $scope.addPatientNoteStatus = false;
                $scope.patientNotes.splice($scope.patientNotes.indexOf(patientNote),1)
            };

            $scope.addEditPatientNote = function(patientNote) {
                console.log(patientNote);
                $scope.editStatus = true;
                $scope.editData = patientNote;
                $scope.addPatientNoteStatus = true;
                $scope.drug = patientNote.drug.id;
                $scope.dose = patientNote.dose.id;
                $scope.route = patientNote.route;
                $scope.frequency = patientNote.frequency;
                $scope.duration = patientNote.duration;
                $scope.selectedDoseId = patientNote.dose.id;
            };

            $scope.updatePatientNote = function() {
                $scope.editStatus = false;
                var data = $scope.editData;
                $scope.addPatientNoteStatus = false;
                var newObj = {drug: $scope.drug, dose: $scope.dose, frequency: $scope.frequency, duration: $scope.duration};
                $scope.patientNotes.splice($scope.patientNotes.indexOf(data), 1, newObj);
                $scope.clearPatientNote();
            };

            $scope.cancelPatientNote = function() {
                $scope.addPatientNoteStatus = false;
            };

            $scope.drugChange = function() {
                if($scope.drug) {
                    $scope.doses = _.pluck( _.where(doses, {id: parseInt($scope.drug)}), 'dose')[0];
                    $scope.drugObject = _.where(doses, {id: parseInt($scope.drug)})[0];
                }
            };

            $scope.doseChange = function() {
                if($scope.dose) {
                    $scope.doseObject = _.unique(_.where($scope.doses, {id: parseInt(JSON.parse($scope.dose).id)}))[0];
                }
            };

            {{--$scope.selectedDiagnosisId = '{!! $diagnosis->surgery_type_id !!}';--}}
            {{--$scope.cvs_pr = '{!! $examination->cvs_pr !!}';--}}
            {{--$scope.review = '{!! $diagnosis->review !!}';--}}
            {{--var followup = [{!! $followUp !!}][0];--}}
            {{--for(var i=0; i < followup.length; i++) {--}}
                {{--if(followup[i].drug && followup[i].dose && followup[i].frequency && followup[i].duration && followup[i].route) {--}}
                    {{--$scope.patientNotes.push({drug: followup[i].drug, dose: followup[i].dose, frequency: followup[i].frequency, duration: followup[i].duration, route: followup[i].route});--}}
                {{--}--}}
            {{--}--}}
        }]);
        $(function () {

            $('#date_of_surgery').datetimepicker({
                format: 'YYYY-MM-DD'
            });


            $('.ui.dropdown')
                .dropdown({});
        });
    </script>
@endsection