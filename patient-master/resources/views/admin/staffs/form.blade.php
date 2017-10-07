<div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
    {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('first_name') ? $errors->first('first_name') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
    {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('last_name') ? $errors->first('last_name') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('short_name')) ? 'has-error' : '' }}">
    {!! Form::label('short_name', 'Short Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('short_name', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('short_name') ? $errors->first('short_name') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
        <p class="help-block">{{ ($errors->has('email') ? $errors->first('email') : '') }}</p>
    </div>
</div>

<div class="form-group {!! ($errors->has('designation')) ? 'has-error' : '' !!}">
    {!! Form::label('designation', 'Designation', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('designation_id', $designations, null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('designation') ? $errors->first('designation') : '') !!}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('gender')) ? 'has-error' : '' }}">
    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('gender') ? $errors->first('gender') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('phone')) ? 'has-error' : '' }}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('phone') ? $errors->first('phone') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('telephone')) ? 'has-error' : '' }}">
    {!! Form::label('telephone', 'Telephone', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('telephone') ? $errors->first('telephone') : '') }}</p>
    </div>
</div>

<div class="form-group {!! ($errors->has('profile_image')) ? 'has-error' : '' !!}">
    {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('profile_image', null, ['id' => 'profile_image', 'class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block">{!! ($errors->has('profile_image') ? $errors->first('profile_image') : '') !!}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('description') ? $errors->first('description') : '') }}</p>
    </div>
</div>



