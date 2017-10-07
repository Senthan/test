
<div class="form-group {{ ($errors->has('refferal')) ? 'has-error' : '' }} required">
    {!! Form::label('refferal', 'Refferal / Special Investigation', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('refferal', null, ['class' => 'form-control', 'placeholder' => 'Refferal / Special Investigation']) !!}
        <p class="help-block">{{ ($errors->has('refferal') ? $errors->first('refferal') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('reffered_to')) ? 'has-error' : '' }} required">
    {!! Form::label('reffered_to', 'Reffered to / Done by', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('reffered_to', null, ['class' => 'form-control', 'placeholder' => 'Reffered to / Done by']) !!}
        <p class="help-block">{{ ($errors->has('reffered_to') ? $errors->first('reffered_to') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('report')) ? 'has-error' : '' }} required">
    {!! Form::label('report', 'report / Opinion', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('report', null, ['class' => 'form-control', 'placeholder' => 'Report / Opinion']) !!}
        <p class="help-block">{{ ($errors->has('report') ? $errors->first('report') : '') }}</p>
    </div>
</div>