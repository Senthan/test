@extends('admin.layouts.master')
@section('content')

    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home') !!}</li>
        <li>{!! link_to_route('patient.index', 'Patient Management') !!}</li>
        <li>{!! $patient->patient_uuid !!}</li>
        <li>{!! link_to_route('surgical.followup.index', 'Surgical Followup Management', ['patient' => $patient->id]) !!}</li>
        <li class="active">Create</li>
    </ul>

    <section class="content">
        {!! Form::open(['url' => route('surgical.followup.store', ['patient' => $patient]), 'role' => 'form', 'class' => 'form-horizontal ui form']) !!}
            <div class="ui segments">
                <div class="ui segment clearfix">
                    <h2 class="pull-left">Create {!! $patient->patient_uuid !!} Surgical Followup</h2>
                    <div class="pull-right">
                        <a class="ui small button" href="{{ route('surgical.followup.index', ['patient' => $patient->id]) }}">Back</a>
                    </div>
                </div>
                <div class="ui green segment">

                    <div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }} required">
                        {!! Form::label('date', 'Date', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
                            </div>
                            <p class="help-block">{{ ($errors->has('date') ? $errors->first('date') : '') }}</p>
                        </div>
                    </div>

                </div>
                <div class="ui segment">
                    <button class="ui small button green" type="submit">Next</button>
                    <a class="ui small button" href="{{ route('surgical.followup.index', ['patient' => $patient]) }}">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </section>
@endsection

@section('script')
    <script>
        $(function () {

            $('#date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });

        $(".celled.table.pain-scale tr").on("click", "td", function (event) {
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());

            var examination = {};
            if($(this).hasClass('active')) {
                $(this).removeClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'pain_scale_followup';
                examination.value = 0;
            } else {
                $(this).addClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'pain_scale_followup';
                examination.value = 1;
            }
            updateExamination(examination, url);
        });

        $(".celled.table.sensory-impairment tr").on("click", "td", function (event) {
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());

            var examination = {};
            if ( $( this ).is( ":first-child" ) ) {

            } else if($(this).hasClass('active')) {
                $(this).removeClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'sensory_impairment_followup';
                examination.value = 0;
            } else {
                $(this).addClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'sensory_impairment_followup';
                examination.value = 1;
            }
            updateExamination(examination, url);
        });

        $(".celled.table.root-examination tr").on("click", "td", function (event) {
            var col = $(this).parent().children().index($(this));
            var row = $(this).parent().parent().children().index($(this).parent());

            var examination = {};
            if ( $( this ).is( ":first-child" ) ) {

            } else if($(this).hasClass('active')) {
                $(this).removeClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'root_examination_followup';
                examination.value = 0;
            } else {
                $(this).addClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'root_examination_followup';
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
                examination.row = row;
                examination.col = col;
                examination.type = 'reflexes_examination_followup';
                examination.value = 0;
            } else {
                $(this).addClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'reflexes_examination_followup';
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
                examination.row = row;
                examination.col = col;
                examination.type = 'activities_examination_followup';
                examination.value = 0;
            } else {
                $(this).addClass('active');
                examination.row = row;
                examination.col = col;
                examination.type = 'activities_examination_followup';
                examination.value = 1;
            }
            updateExamination(examination, url);
        });

        $( "#bath_0" ).keydown(function() {
            var examination = {};
            examination.row = 10;
            examination.col = 1;
            examination.type = 'activities_examination_followup';
            examination.value = $( "#bath_0" ).val();
            updateExamination(examination, url);
        });

    </script>
@endsection