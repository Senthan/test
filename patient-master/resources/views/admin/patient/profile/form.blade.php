<div class="form-group {!! ($errors->has('profile_image')) ? 'has-error' : '' !!}">
    {!! Form::label('profile_image', 'Profile Image', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('profile_image', null, ['id' => 'profile_image', 'class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block">{!! ($errors->has('profile_image') ? $errors->first('profile_image') : '') !!}</p>
    </div>
</div>


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

<div class="form-group {{ ($errors->has('gender')) ? 'has-error' : '' }}">
    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('gender') ? $errors->first('gender') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('age')) ? 'has-error' : '' }}">
    {!! Form::label('age', 'Age', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('age', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('age') ? $errors->first('age') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('country')) ? 'has-error' : '' }}">
    {!! Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('country', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('country') ? $errors->first('country') : '') }}</p>
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

<div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
    {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('email') ? $errors->first('email') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('nic_no')) ? 'has-error' : '' }}">
    {!! Form::label('nic_no', 'NIC Number', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('nic_no', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('nic_no') ? $errors->first('nic_no') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('passport_no')) ? 'has-error' : '' }}">
    {!! Form::label('passport_no', 'Passport Number', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('passport_no', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('passport_no') ? $errors->first('passport_no') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('date_of_birth')) ? 'has-error' : '' }}">
    {!! Form::label('date_of_birth', 'date_of_birth', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('date_of_birth') ? $errors->first('date_of_birth') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('description') ? $errors->first('description') : '') }}</p>
    </div>
</div>