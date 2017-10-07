
<div class="form-group {{ ($errors->has('date_of_admission')) ? 'has-error' : '' }} required">
    {!! Form::label('date_of_admission', 'Date of Admission', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date_of_admission', null, ['class' => 'form-control', 'placeholder' => 'Date of Admission']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date_of_admission') ? $errors->first('date_of_admission') : '') }}</p>
    </div>
</div>


<div class="form-group {{ ($errors->has('date_of_discharge')) ? 'has-error' : '' }} required">
    {!! Form::label('date_of_discharge', 'Date of Discharge', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date_of_discharge', null, ['class' => 'form-control', 'placeholder' => 'Date of Discharge']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date_of_discharge') ? $errors->first('date_of_discharge') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('indication_admission')) ? 'has-error' : '' }} required">
    {!! Form::label('indication_admission', 'Indication for Admission / Complain', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('indication_admission', null, ['class' => 'form-control', 'placeholder' => 'Indication for Admission / Complain']) !!}
        <p class="help-block">{{ ($errors->has('indication_admission') ? $errors->first('indication_admission') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('investigation')) ? 'has-error' : '' }} required">
    {!! Form::label('investigation', 'Investigation', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('investigation', null, ['class' => 'form-control', 'placeholder' => 'Investigation']) !!}
        <p class="help-block">{{ ($errors->has('investigation') ? $errors->first('investigation') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('management')) ? 'has-error' : '' }} required">
    {!! Form::label('management', 'Management', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('management', null, ['class' => 'form-control', 'placeholder' => 'Management']) !!}
        <p class="help-block">{{ ($errors->has('management') ? $errors->first('management') : '') }}</p>
    </div>
</div>
@section('script')
    <script>
        $(function () {

            $('#date_of_admission').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#date_of_discharge').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>
@endsection