<div class="col-sm-6">
    <div class="form-group {{ ($errors->has('proposed_date')) ? 'has-error' : '' }} required">
        {!! Form::label('proposed_date', 'Date of Proposed Procedure', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                {!! Form::text('proposed_date', null, ['class' => 'form-control', 'placeholder' => 'Admission Date']) !!}
            </div>
            <p class="help-block">{{ ($errors->has('proposed_date') ? $errors->first('proposed_date') : '') }}</p>
        </div>
    </div>

    <div class="form-group {{ ($errors->has('Diagnosis')) ? 'has-error' : '' }} required">
        <fieldset>
            <legend>Diagnosis</legend>
            {!! Form::text('height', null, ['class' => 'col-sm-2', 'placeholder' => 'Height']) !!}
            {!! Form::text('weight', null, ['class' => 'col-sm-2', 'placeholder' => 'Weight']) !!}
            {!! Form::text('date', null, ['class' => 'col-sm-4', 'placeholder' => 'Date']) !!}
            {!! Form::text('temp', null, ['class' => 'col-sm-2', 'placeholder' => 'Temp']) !!}
            {!! Form::text('pulse', null, ['class' => 'col-sm-2', 'placeholder' => 'Pulse']) !!}
            {!! Form::text('resp', null, ['class' => 'col-sm-2', 'placeholder' => 'Resp']) !!}
            {!! Form::text('spo2', null, ['class' => 'col-sm-2', 'placeholder' => 'SpO2']) !!}
            {!! Form::text('bp', null, ['class' => 'col-sm-2', 'placeholder' => 'Bp']) !!}
        </fieldset>
    </div>

    <div class="form-group">
        <fieldset>
            <legend>Surgical/Anaesthetic history</legend>
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="No Personal or family history of anaesthetic complications" class="form-control" aria-label="Text input with checkbox">
                </div>
        </fieldset>
    </div>

    <div class="form-group">
        <fieldset>
            <legend>Ailergies/NKDA</legend>
            <p>Teeth</p>
            <div class="col-sm-4 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Appear Normal" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Looser" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Missing" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="input-group group-space">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Dentures" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4  group-space">
                <div class="input-group"> <span class="input-group-addon">Full:</span>
                    <select id="full" class="selectpicker form-control" data-live-search="true" title="Please select">
                        <option>Upper</option>
                        <option>Lower</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group"> <span class="input-group-addon">Partial:</span>
                    <select id="partial" class="selectpicker form-control" data-live-search="true" title="Please select">
                        <option>Upper</option>
                        <option>Lower</option>
                    </select>
                </div>
            </div>
        </fieldset>
    </div>

    <div class="form-group">
        <fieldset>
            <legend>Respiratory</legend>
            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Asthma" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="WNL" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-12 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="COPD" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-12 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Recent URTI" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-12 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Sleep Apnea" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Smoker" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group my-group">
                    <input type="text" class="form-control smoker-text" aria-label="Text input with checkbox">
                    <input type="text" value="Packs/day x" readonly class="form-control smoker" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-4 group-space">
                <div class="input-group my-group">
                    <input type="text" class="form-control smoker-text" aria-label="Text input with checkbox">
                    <input type="text" value="yrs" readonly class="form-control smoker" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-3 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Ex - Smoker" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-3 group-space">
                <div class="input-group my-group">
                    <input type="text" class="form-control smoker-text" aria-label="Text input with checkbox">
                    <input type="text" value="Packs/day x" readonly class="form-control smoker" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-3 group-space">
                <div class="input-group my-group">
                    <input type="text" class="form-control smoker-text" aria-label="Text input with checkbox">
                    <input type="text" value="yrs" readonly class="form-control smoker" aria-label="Text input with checkbox">
                </div>
            </div>
            <div class="col-sm-3 group-space">
                <div class="input-group my-group">
                    <input type="text" value="Quit" readonly class="form-control smoker" aria-label="Text input with checkbox">
                    <input type="text" class="form-control smoker-text" aria-label="Text input with checkbox">
                </div>
            </div>
        </fieldset>
    </div>

    <div class="form-group">
        <fieldset>
            <legend>Cardiovascular</legend>
            <div class="col-sm-3 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Angina" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Hypercholesterolemia/Hyperlipidemia" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-3 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="WNL" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="ASHD/CAD" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="MI" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="ASPVD" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Pacemaker" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="CHF" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Valvular Disease" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>


            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Dysrhythmia" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="HTN" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

        </fieldset>
    </div>


    <div class="form-group">
        <fieldset>
            <legend>HEPATO/Gastrointestinal</legend>
            <div class="col-sm-4 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Hiatal Hernia / Reflux" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-4 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Nausea / Vomiting" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-4 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="WNL" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                        <span class="input-group-addon">
                            <input type="checkbox" aria-label="Checkbox for following text input">
                        </span>
                    <input type="text" readonly value="Hiatal Hernia / Reflux" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Ulcers" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>

            <div class="col-sm-6 group-space">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                    </span>
                    <input type="text" readonly value="Liver Diease" class="form-control" aria-label="Text input with checkbox">
                </div>
            </div>
        </fieldset>
    </div>

</div>


<div class="col-sm-6">
    <div class="form-group {{ ($errors->has('medication')) ? 'has-error' : '' }} required">
        {!! Form::label('medication', 'Current Medications', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('medication', null, ['class' => 'form-control', 'placeholder' => 'Medication']) !!}
            <p class="help-block">{{ ($errors->has('diagnosis') ? $errors->first('medication') : '') }}</p>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <fieldset>
                <legend>Anaesthesia Plan</legend>

                <div class="{!! ($errors->has('consultant')) ? 'has-error' : '' !!} required">
                    {!! Form::label('consultant', 'Consultant', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('consultant', $consultants, null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('consultant') ? $errors->first('consultant') : '') !!}</p>
                    </div>
                </div>

                <div class="{{ ($errors->has('clinic_day')) ? 'has-error' : '' }} required">
                    {!! Form::label('clinic_day', 'Clinic Day', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {!! Form::text('clinic_day', null, ['class' => 'form-control', 'placeholder' => 'Clinic Day']) !!}
                        </div>
                        <p class="help-block">{{ ($errors->has('clinic_day') ? $errors->first('clinic_day') : '') }}</p>
                    </div>
                </div>

                <div class="{{ ($errors->has('consultant_review')) ? 'has-error' : '' }} required">
                    <div class="col-sm-4">
                        {!! Form::label('consultant_review', 'Consultant Review', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::textarea('consultant_review', null, ['class' => 'form-control', 'placeholder' => 'Consultant Review']) !!}
                        <p class="help-block">{{ ($errors->has('diagnosis') ? $errors->first('medication') : '') }}</p>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <fieldset>
                <legend>Preop Instructions</legend>

                <div class="{!! ($errors->has('anaesthetist')) ? 'has-error' : '' !!} required">
                    {!! Form::label('anaesthetist', 'Anaesthetist', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::select('anaesthetist', $anaesthetist, null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('anaesthetist') ? $errors->first('anaesthetist') : '') !!}</p>
                    </div>
                </div>

                <div class="{{ ($errors->has('clinic_day')) ? 'has-error' : '' }} required">
                    {!! Form::label('clinic_day', 'Clinic Day', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {!! Form::text('clinic_day', null, ['class' => 'form-control', 'placeholder' => 'Clinic Day']) !!}
                        </div>
                        <p class="help-block">{{ ($errors->has('clinic_day') ? $errors->first('clinic_day') : '') }}</p>
                    </div>
                </div>

                <div class="{{ ($errors->has('anaesthetist_review')) ? 'has-error' : '' }} required">
                    <div class="col-sm-4">
                        {!! Form::label('anaesthetist_review', 'Anaesthetist Review', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-sm-8">
                        {!! Form::textarea('anaesthetist_review', null, ['class' => 'form-control', 'placeholder' => 'Consultant Review']) !!}
                        <p class="help-block">{{ ($errors->has('anaesthetist_review') ? $errors->first('anaesthetist_review') : '') }}</p>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>


</div>
