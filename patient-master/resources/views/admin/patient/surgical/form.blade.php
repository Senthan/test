
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


<div class="form-group {{ ($errors->has('date_of_surgery')) ? 'has-error' : '' }} required">
    {!! Form::label('date_of_surgery', 'Date of Surgery', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date_of_surgery', null, ['class' => 'form-control', 'placeholder' => 'Date of Surgery']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date_of_surgery') ? $errors->first('date_of_surgery') : '') }}</p>
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

<div class="form-group {{ ($errors->has('surgery')) ? 'has-error' : '' }} required">
    {!! Form::label('surgery', 'Surgery', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('surgery', null, ['class' => 'form-control', 'placeholder' => 'Surgery', 'rows' => '2']) !!}
        <p class="help-block">{{ ($errors->has('surgery') ? $errors->first('surgery') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('operative_notes')) ? 'has-error' : '' }} required">
    {!! Form::label('operative_notes', 'Operative Notes', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('operative_notes', null, ['class' => 'form-control', 'placeholder' => 'Operative Notes']) !!}
        <p class="help-block">{{ ($errors->has('operative_notes') ? $errors->first('operative_notes') : '') }}</p>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 group-space">
        <div class="input-group">
                    <span class="input-group-addon">
                        <input name="traneximic" {!! isset($surgical) && $surgical->traneximic == 'on' ? 'checked' : '' !!} type="checkbox" aria-label="Checkbox for following text input">
                    </span>
            <input type="text" readonly value="Traneximic acid" class="form-control" aria-label="Text input with checkbox">
        </div>
    </div>

    <div class="col-sm-6 group-space">
        <div class="input-group">
                <span class="input-group-addon">
                    <input name="methlene" type="checkbox" {!! isset($surgical) && $surgical->methlene == 'on' ? 'checked' : '' !!} aria-label="Checkbox for following text input">
                </span>
            <input type="text" readonly value="Methlene blue" class="form-control" aria-label="Text input with checkbox">
        </div>
    </div>
</div>

<div class="form-group {{ ($errors->has('complication')) ? 'has-error' : '' }} required">
    {!! Form::label('complication', 'Complication', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('complication', null, ['class' => 'form-control', 'placeholder' => 'Complication', 'rows' => '3']) !!}
        <p class="help-block">{{ ($errors->has('complication') ? $errors->first('complication') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('discharge_plan')) ? 'has-error' : '' }} required">
    {!! Form::label('discharge_plan', 'Discharge plan', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('discharge_plan', null, ['class' => 'form-control', 'placeholder' => 'Discharge plan']) !!}
        <p class="help-block">{{ ($errors->has('discharge_plan') ? $errors->first('discharge_plan') : '') }}</p>
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

            $('#date_of_surgery').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>
@endsection