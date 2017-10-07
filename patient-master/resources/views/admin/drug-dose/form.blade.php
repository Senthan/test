<div ng-repeat="data in multipleDose.dose">
    <input type="hidden" name="dose[]" ng-value="data"/>
</div>

<div class="form-group {{ ($errors->has('drug')) ? 'has-error' : '' }}">
    {!! Form::label('drug', 'Drug', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('drug', $drugs, null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('drug') ? $errors->first('drug') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('dose')) ? 'has-error' : '' }}">
    {!! Form::label('symptom', 'Dose', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <ui-select multiple tagging tagging-label="('new' dose for drugs)" ng-model="multipleDose.dose" theme="bootstrap" sortable="true" ng-disabled="disabled" style="width: 100%;" title="Choose a dose">
            <ui-select-match placeholder="Select Dose...">@{{$item}}</ui-select-match>
            <ui-select-choices repeat="symptom in availableDose | filter:$select.search">
                @{{symptom}}
            </ui-select-choices>
        </ui-select>
        <hr>
        <p class="help-block">{{ ($errors->has('dose') ? $errors->first('dose') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        <p class="help-block">{{ ($errors->has('description') ? $errors->first('description') : '') }}</p>
    </div>
</div>