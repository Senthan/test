<div class="form-group {{ ($errors->has('diagnosis')) ? 'has-error' : '' }} required">
    {!! Form::label('diagnosis', 'Diagnosis/Type of Surgery', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('diagnosis', $diagnosisTypeNames, null, ['class' => 'form-control', 'placeholder' => 'Diagnosis']) !!}
        <p class="help-block">{{ ($errors->has('diagnosis') ? $errors->first('diagnosis') : '') }}</p>
    </div>
</div>

<div class="form-group required">
    {!! Form::label('template', 'Template', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-8">
        <ul class="nav nav-tabs tab-content-tab">
            @foreach($languages as $key => $language)
                <li class="{!! $key == 0 ? 'active' : ''!!}"><a href="#template-{!! $key !!}" data-toggle="tab" class="{!! ($errors->has($language->code.'.template')) ? 'nav-tab-has-error' : '' !!}">{!! $language->language !!}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($languages as $key => $language)
                <div class="tab-pane {!! $key == 0 ? 'active in' : ''!!} {!! ($errors->has($language->code.'.template')) ? 'has-error' : '' !!}" id="template-{!! $key !!}">
                    {!! Form::textarea($language->code."_template", null, ['id' => "$language->code[template]", 'class' => 'form-control tab-content-form ckeditor', 'placeholder' => '']) !!}
                    <p class="help-block">{!! ($errors->has($language->code.'.template') ? $errors->first($language->code.'.template') : '') !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group {!! ($errors->has('image')) ? 'has-error' : '' !!}">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::file('image', null, ['id' => 'profile_image', 'class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block">{!! ($errors->has('image') ? $errors->first('image') : '') !!}</p>
    </div>
</div>

<div class="form-group {!! ($errors->has('side')) ? 'has-error' : '' !!}">
    {!! Form::label('side', 'Side', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('side', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('side') ? $errors->first('side') : '') !!}</p>
    </div>
</div>
<div class="form-group {!! ($errors->has('type_of_anaesthesia')) ? 'has-error' : '' !!}">
    {!! Form::label('type_of_anaesthesia', 'Type of Anaesthesia', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::select('type_of_anaesthesia', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('type_of_anaesthesia') ? $errors->first('type_of_anaesthesia') : '') !!}</p>
    </div>
</div>