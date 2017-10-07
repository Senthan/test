
<div class="form-group {{ ($errors->has('patient_uuid')) ? 'has-error' : '' }}">
    {!! Form::label('patient_uuid', 'OSC No', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        <div class="ui right labeled input">
            <div class="ui label">OC</div>
            {!! Form::text('patient_uuid', null, ['placeholder' => 'Unique No','style' => 'font-size: 15px;']) !!}
            <div class="ui label">S</div>
        </div>

        <p class="help-block">{{ ($errors->has('patient_uuid') ? $errors->first('patient_uuid') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name' ,'style' => 'font-size: 15px;']) !!}
        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('age')) ? 'has-error' : '' }}">
    {!! Form::label('age', 'Age', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Age','style' => 'font-size: 15px;']) !!}
        <p class="help-block">{{ ($errors->has('age') ? $errors->first('age') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
    {!! Form::label('phone', 'Telephone No', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone','style' => 'font-size: 15px;']) !!}
        <p class="help-block">{{ ($errors->has('phone') ? $errors->first('phone') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('address')) ? 'has-error' : '' }}">
    {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label','style' => 'font-size: 18px;']) !!}
    <div class="col-sm-4">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address','style' => 'font-size: 15px;']) !!}
        <p class="help-block">{{ ($errors->has('address') ? $errors->first('address') : '') }}</p>
    </div>
</div>