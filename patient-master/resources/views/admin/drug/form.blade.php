<div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</p>
    </div>
</div>