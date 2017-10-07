<div class="group-space">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Surgical Pathology Report</h2>
        </div>
        <div class="panel-body">
            <div class="form-group required">
                <div class="col-md-12">
                    <div class="form-group {{ ($errors->has('pathology')) ? 'has-error' : '' }} required">
                        {!! Form::label('pathology', 'Conclusion', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-8">
                            {!! Form::textarea('pathology_conclusion', null, ['class' => 'form-control', 'placeholder' => 'Pathology Report']) !!}
                            <p class="help-block">{{ ($errors->has('pathology') ? $errors->first('pathology') : '') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group {{ ($errors->has('pathology_document')) ? 'has-error' : '' }} required">
                        {!! Form::label('pathology_document', 'Documents', ['class' => 'col-md-2 control-label']) !!}
                        {!! Form::file('pathology_document', null, ['class' => 'form-control', 'placeholder' => 'Pathology document']) !!}
                        <p class="help-block">{{ ($errors->has('pathology_document') ? $errors->first('pathology_document') : '') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

