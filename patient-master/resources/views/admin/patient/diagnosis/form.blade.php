

<div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }} required">
    {!! Form::label('date', 'Date', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date') ? $errors->first('date') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('refferred_from')) ? 'has-error' : '' }} required">
    {!! Form::label('refferred_from', 'Referred from', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('refferred_from', null, ['class' => 'form-control', 'placeholder' => 'Referred From']) !!}
        <p class="help-block">{{ ($errors->has('refferred_from') ? $errors->first('refferred_from') : '') }}</p>
    </div>
</div>

<div class="form-group {!! ($errors->has('consultant')) ? 'has-error' : '' !!} required">
    {!! Form::label('consultant', 'Consultant', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('staff_id', $consultants, null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('consultant') ? $errors->first('consultant') : '') !!}</p>
    </div>
</div>

<div class="form-group {!! ($errors->has('co_mobidities')) ? 'has-error' : '' !!} required">
    {!! Form::label('co_mobidities', 'CO - Morbidities', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('co_mobidities', ['Diabetes mellitus' => 'Diabetes mellitus', 'Hypertension' => 'Hypertension', 'Dyslipidemia' => 'Dyslipidemia', 'Bronchial asthma' => 'Bronchial asthma', 'Myocardial infarction' => 'Myocardial infarction', 'TIA' => 'TIA', 'stroke' => 'stroke',
        'Hypothyroidism' => 'Hypothyroidism', 'Hyperthyroidism' => 'Hyperthyroidism', 'Malignancy' => 'Malignancy', 'Renal diseases' => 'Renal diseases', 'Liver diseases' => 'Liver diseases', 'Cardiac diseases' => 'Cardiac diseases', 'Others' => 'Others'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('co_mobidities') ? $errors->first('co_mobidities') : '') !!}</p>
    </div>
</div>

{{--<div class="form-group {{ ($errors->has('co_mobidities')) ? 'has-error' : '' }} required">--}}
    {{--{!! Form::label('co_mobidities', 'CO - Morbidities', ['class' => 'col-md-2 control-label']) !!}--}}
    {{--<div class="col-md-10">--}}
        {{--{!! Form::textarea('co_mobidities', null, ['class' => 'form-control', 'placeholder' => 'CO - Morbidities']) !!}--}}
        {{--<p class="help-block">{{ ($errors->has('co_mobidities') ? $errors->first('co_mobidities') : '') }}</p>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group {{ ($errors->has('drugs_on')) ? 'has-error' : '' }} required">
    {!! Form::label('drugs_on', 'Drugs On', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('drugs_on', null, ['class' => 'form-control', 'placeholder' => 'Drugs On']) !!}
        <p class="help-block">{{ ($errors->has('drugs_on') ? $errors->first('drugs_on') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('height')) ? 'has-error' : '' }} required">
    {!! Form::label('height', 'Height (cm)', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'Height (cm)']) !!}
        <p class="help-block">{{ ($errors->has('height') ? $errors->first('height') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('drugs_on')) ? 'has-error' : '' }} required">
    {!! Form::label('weight', 'Weight (kg)', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight (kg)']) !!}
        <p class="help-block">{{ ($errors->has('weight') ? $errors->first('weight') : '') }}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('bmi')) ? 'has-error' : '' }} required">
    {!! Form::label('bmi', 'BMI (kgm^-2)', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('bmi', null, ['class' => 'form-control', 'placeholder' => 'BMI(kgm-2)']) !!}
        <p class="help-block">{{ ($errors->has('bmi') ? $errors->first('bmi') : '') }}</p>
    </div>
</div>

{{--<div class="form-group {{ ($errors->has('presenting_complain')) ? 'has-error' : '' }} required">--}}
    {{--{!! Form::label('presenting_complain', 'Presenting Complain', ['class' => 'col-md-2 control-label']) !!}--}}
    {{--<div class="col-md-10">--}}
        {{--{!! Form::textarea('presenting_complain', null, ['class' => 'form-control', 'placeholder' => 'Presenting Complain']) !!}--}}
        {{--<p class="help-block">{{ ($errors->has('presenting_complain') ? $errors->first('presenting_complain') : '') }}</p>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group {!! ($errors->has('presenting_complain')) ? 'has-error' : '' !!} required">
    {!! Form::label('presenting_complain', 'Consultant', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('presenting_complain', ['Neck pain' => 'Neck pain', 'Lower back pain' => 'Lower back pain', 'Upper back pain' => 'Upper back pain', 'Upper limb numbness' => 'Upper limb numbness', 'Upper limb weakness' => 'Upper limb weakness', 'Lower limb numbness' => 'Lower limb numbness', 'Lower limb weakness' => 'Lower limb weakness', 'Abnormal posture' => 'Abnormal posture', 'Others' => 'Others'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('presenting_complain') ? $errors->first('presenting_complain') : '') !!}</p>
    </div>
</div>


<div class="form-group {{ ($errors->has('past_surgical_history')) ? 'has-error' : '' }} required">
    {!! Form::label('past_surgical_history', 'Past Surgical History', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('past_surgical_history', null, ['class' => 'form-control', 'placeholder' => 'Past Surgical History', 'rows' => '3']) !!}
        <p class="help-block">{{ ($errors->has('past_surgical_history') ? $errors->first('past_surgical_history') : '') }}</p>
    </div>
</div>


{{--<div class="form-group {{ ($errors->has('allergic_history')) ? 'has-error' : '' }} required">--}}
    {{--{!! Form::label('allergic_history', 'Allergic History', ['class' => 'col-md-2 control-label']) !!}--}}
    {{--<div class="col-md-10">--}}
        {{--{!! Form::textarea('allergic_history', null, ['class' => 'form-control', 'placeholder' => 'Allergic History', 'rows' => '3']) !!}--}}
        {{--<p class="help-block">{{ ($errors->has('allergic_history') ? $errors->first('allergic_history') : '') }}</p>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group {!! ($errors->has('allergic_history')) ? 'has-error' : '' !!} required">
    {!! Form::label('allergic_history', 'Allergic History', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('allergic_history', ['Not known' => 'Not known', 'Food allergy' => 'Food allergy', 'Drug allergy' => 'Drug allergy', 'Plaster allergy' => 'Plaster allergy'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('allergic_history') ? $errors->first('allergic_history') : '') !!}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>Motor Examination</h3>
            </div>
            <div class="panel-body">
                <div class="ui green segment">
                    <div class="form-group {!! ($errors->has('abnormal_reflexes')) ? 'has-error' : '' !!} required">
                        {!! Form::label('abnormal_reflexes', 'Abnormal reflexest', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('abnormal_reflexes', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                            <p class="help-block">{!! ($errors->has('abnormal_reflexes') ? $errors->first('abnormal_reflexes') : '') !!}</p>
                        </div>
                    </div>

                    <table class="ui celled table root-examination">
                        <thead>
                        <tr>
                            <th class="header">Root</th>
                            <th class="header"> Examination </th>
                            <th colspan="2" class="header"> Grade 0 </th>
                            <th colspan="2" class="header"> Grade 1 </th>
                            <th colspan="2" class="header"> Grade 2 </th>
                            <th colspan="2" class="header"> Grade 3 </th>
                            <th colspan="2" class="header"> Grade 4 </th>
                            <th colspan="2" class="header"> Grade 5 </th>
                        </tr>
                        <tr>
                            <th class="header">  </th>
                            <th class="header">  </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="item1">
                            <td>C5</td>
                            <td>Elbow extensors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>C6</td>
                            <td>Wrist extensors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>C8</td>
                            <td>Finger flexors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>T1</td>
                            <td>Small Finger Abductors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L2</td>
                            <td>Hip flexors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L3</td>
                            <td>Knee extensors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L4</td>
                            <td>Ankle dorsiflexors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>

                        <tr class="item1">
                            <td>L5</td>
                            <td>Long toe extensors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>


                        <tr class="item1">
                            <td>S1</td>
                            <td>Ankle plantar flexors</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 2)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 3)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 4)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 5)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 6)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 7)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 8)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 9)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 10)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 11)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 12)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 13)->where('value', 1)->where('type', 'root_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        </tbody>
                    </table>


                    <table class="ui celled table reflexes-examination">
                        <thead>
                        <tr><th colspan="1"></th>
                            <th colspan="1"></th>
                            <th colspan="10">Grading</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="ui ribbon label">Reflexes</div>
                            </td>
                            <td></td>
                            <td colspan="2">Grade 0</td>
                            <td colspan="2">Grade 1</td>
                            <td colspan="2">Grade 2</td>
                            <td colspan="2">Grade 3</td>
                            <td colspan="2">Grade 4</td>
                        </tr>
                        <tr>
                            <th class="header">  </th>
                            <th class="header">  </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                            <th class="header"> R </th>
                            <th class="header"> L </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Biceps C5</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Brachioradialis C6</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Triceps C7</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Fingers C8</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Hoffman sign</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Knee L4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Ankle S1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 2)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 3)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 4)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 5)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 6)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 7)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 8)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 9)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 10)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 11)->where('value', 1)->where('type', 'reflexes_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>
</div>



<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>Sensory Impairment</h3>
            </div>
            <div class="panel-body">
                <div class="ui blue segment">

                    <div class="form-group {!! ($errors->has('sensory_impairment')) ? 'has-error' : '' !!} required">
                        {!! Form::label('sensory_impairment', 'Sensory impairment', ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::select('sensory_impairment', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                            <p class="help-block">{!! ($errors->has('sensory_impairment') ? $errors->first('sensory_impairment') : '') !!}</p>
                        </div>
                    </div>

                    <table class="ui celled table sensory-impairment">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Cervical</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C2</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C3</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C5</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C6</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C7</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">C8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Thoracic</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T2</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T3</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T5</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 6)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T6</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 7)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T7</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 8)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T8</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 9)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T9</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 10)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T10</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 11)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T11</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 12)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">T12</td>
                        </tr>
                        <tr>
                            <td>Lumbar</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L2</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L3</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">L5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sacral</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S2</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S3</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 5)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">S5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Caccxygeal</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 1)->where('value', 1)->where('type', 'sensory_impairment')->first() ? 'active' : '' !!}">Cx</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>Pain Scale</h3>
            </div>
            <div class="panel-body">
                <div class="ui blue segment">
                    <table class="ui celled table pain-scale">
                        <thead>
                        <tr>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 0)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">0</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 1)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">1</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">2</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">3</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">4</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 5)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">5</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 6)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">6</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 7)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">7</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 8)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">8</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 9)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">9</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 10)->where('value', 1)->where('type', 'pain_scale')->first() ? 'active' : '' !!}">10</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>Activities of Daily Living</h3>
            </div>
            <div class="panel-body">
                <div class="ui blue segment">
                    <table class="ui definition table activities-examination">
                        <thead>
                        <tr>
                            <th>Activities</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Bowels</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Incontinent / need enema</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Occasional</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Continent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 0)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Bladder</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Incontinent / catheterised</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Occasional</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Continent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 1)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Grooming</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Needs help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 2)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Toilet use</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Dependant</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Need some help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 3)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Feeding</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Unable</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Need help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 4)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Transfer</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Unable / no sitting Balance</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Major help, can sit</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Minor help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 5)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                        </tr>
                        <tr>
                            <td>Mobility</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Immobile</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Wheel chair independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">walks with help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 6)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                        </tr>
                        <tr>
                            <td>Dressing</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Dependent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Needs help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 7)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Stairs</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Unable</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Needs help</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 8)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Bathing</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 9)->where('col', 1)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Dependent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 9)->where('col', 2)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}">Independent</td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 9)->where('col', 3)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                            <td class="{!! App\Examination::where('patient_id', $patient->id)->whereNull('surgical_followup_id')->where('row', 9)->where('col', 4)->where('value', 1)->where('type', 'activities_examination')->first() ? 'active' : '' !!}"></td>
                        </tr>
                        <tr>
                            <td>Barthel Index</td>
                            <td colspan="4">
                                {!! Form::text('bath_0', null, ['class' => 'form-control', 'placeholder' => '', 'style' => 'width: 100%;', 'id' => 'bath_0', "onkeyup" => "keyupFunction()"]) !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>IMAGING</h3>
            </div>
            <div class="panel-body">

                <div class="form-group {{ ($errors->has('x_ray')) ? 'has-error' : '' }} required">
                    {!! Form::label('x_ray', 'X-RAY', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('x_ray', null, ['class' => 'form-control', 'placeholder' => 'X-RAY', 'rows' => '3']) !!}
                        <p class="help-block">{{ ($errors->has('x_ray') ? $errors->first('x_ray') : '') }}</p>
                    </div>
                </div>


                <div class="form-group {{ ($errors->has('ct_scan')) ? 'has-error' : '' }} required">
                    {!! Form::label('ct_scan', 'CT SCAN', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('ct_scan', null, ['class' => 'form-control', 'placeholder' => 'CT SCAN', 'rows' => '3']) !!}
                        <p class="help-block">{{ ($errors->has('ct_scan') ? $errors->first('ct_scan') : '') }}</p>
                    </div>
                </div>


                <div class="form-group {{ ($errors->has('miri_scan')) ? 'has-error' : '' }} required">
                    {!! Form::label('miri_scan', 'MRI SCAN', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('miri_scan', null, ['class' => 'form-control', 'placeholder' => 'MRI SCAN', 'rows' => '3']) !!}
                        <p class="help-block">{{ ($errors->has('miri_scan') ? $errors->first('miri_scan') : '') }}</p>
                    </div>
                </div>

                <div class="form-group {{ ($errors->has('other_imaging')) ? 'has-error' : '' }} required">
                    {!! Form::label('other_imaging', 'OTHER IMAGING', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('other_imaging', null, ['class' => 'form-control', 'placeholder' => 'OTHER IMAGING', 'rows' => '3']) !!}
                        <p class="help-block">{{ ($errors->has('other_imaging') ? $errors->first('other_imaging') : '') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="form-group {{ ($errors->has('diagnosis')) ? 'has-error' : '' }} required">--}}
    {{--{!! Form::label('diagnosis', 'Diagnosis', ['class' => 'col-md-2 control-label']) !!}--}}
    {{--<div class="col-md-10">--}}
        {{--{!! Form::textarea('diagnosis', null, ['class' => 'form-control', 'placeholder' => 'Diagnosis', 'rows' => '1']) !!}--}}
        {{--<p class="help-block">{{ ($errors->has('diagnosis') ? $errors->first('diagnosis') : '') }}</p>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="form-group {!! ($errors->has('diagnosis')) ? 'has-error' : '' !!} required">
    {!! Form::label('diagnosis', 'Diagnosis', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('diagnosis', ['Trauma' => 'Trauma', 'Degenerative disease' => 'Degenerative disease', 'Tumor' => 'Tumor', 'Congenital disease' => 'Congenital disease', 'Others' => 'Others'], null, ['class' => 'form-control']) !!}
        <p class="help-block">{!! ($errors->has('diagnosis') ? $errors->first('diagnosis') : '') !!}</p>
    </div>
</div>

<div class="form-group {{ ($errors->has('history')) ? 'has-error' : '' }} required">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3>Management</h3>
            </div>
            <div class="panel-body">

                <div class="form-group {!! ($errors->has('surgery')) ? 'has-error' : '' !!} required">
                    {!! Form::label('surgery', 'surgery', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('surgery', ['ACDF' => 'ACDF', 'Lateral mass screw' => 'Lateral mass screw', 'TPS' => 'TPS', 'Laminoplasty' => 'Laminoplasty', 'Occipitocervical fusion' => 'Occipitocervical fusion', 'TLIF' => 'TLIF', 'Dissectomy' => 'Dissectomy', 'Decompression' => 'Decompression', 'Others' => 'Others'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('surgery') ? $errors->first('surgery') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {!! ($errors->has('type_of_surgery')) ? 'has-error' : '' !!} required">
                    {!! Form::label('type_of_surgery', 'Type of Surgery', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('type_of_surgery', ['Open' => 'Open', 'Minimal invasive' => 'Minimal invasive'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('type_of_surgery') ? $errors->first('type_of_surgery') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {!! ($errors->has('level_of_surgery')) ? 'has-error' : '' !!} required">
                    {!! Form::label('level_of_surgery', 'Level of Surgery', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('level_of_surgery', ['C1' => 'C1', 'C2' => 'C2', 'C3' => 'C3', 'C4' => 'C4', 'C5' => 'C5', 'C6' => 'C6', 'C7' => 'C7', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3', 'T4' => 'T4', 'T5' => 'T5', 'T6' => 'T6', 'T7' => 'T7', 'T8' => 'T8', 'T9' => 'T9', 'T10' => 'T10', 'T11' =>  'T11', 'T12' => 'T12', 'L1' => 'L1', 'L2' => 'L2', 'L3' => 'L3', 'L4' => 'L4', 'L5' => 'L5', 'S1' => 'S1'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('level_of_surgery') ? $errors->first('level_of_surgery') : '') !!}</p>
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

                <div class="form-group {{ ($errors->has('surgical_management')) ? 'has-error' : '' }} required">
                    {!! Form::label('surgical_management', 'Others', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('surgical_management', null, ['class' => 'form-control', 'placeholder' => 'Surgical Management', 'rows' => '3']) !!}
                        <p class="help-block">{{ ($errors->has('surgical_management') ? $errors->first('surgical_management') : '') }}</p>
                    </div>
                </div>


                <div class="form-group {!! ($errors->has('physiotherapy')) ? 'has-error' : '' !!} required">
                    {!! Form::label('physiotherapy', 'Physiotherapy', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('physiotherapy', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('physiotherapy') ? $errors->first('physiotherapy') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {!! ($errors->has('analgesics')) ? 'has-error' : '' !!} required">
                    {!! Form::label('analgesics', 'Analgesics', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('analgesics', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('analgesics') ? $errors->first('analgesics') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {!! ($errors->has('orthosis')) ? 'has-error' : '' !!} required">
                    {!! Form::label('orthosis', 'Orthosis', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('orthosis', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('orthosis') ? $errors->first('orthosis') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {!! ($errors->has('epidural_injection')) ? 'has-error' : '' !!} required">
                    {!! Form::label('epidural_injection', 'Epidural injection', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('epidural_injection', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) !!}
                        <p class="help-block">{!! ($errors->has('epidural_injection') ? $errors->first('epidural_injection') : '') !!}</p>
                    </div>
                </div>

                <div class="form-group {{ ($errors->has('non_surgical_management')) ? 'has-error' : '' }} required">
                    {!! Form::label('non_surgical_management', 'Others', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('non_surgical_management', null, ['class' => 'form-control', 'placeholder' => 'Others']) !!}
                        <p class="help-block">{{ ($errors->has('non_surgical_management') ? $errors->first('non_surgical_management') : '') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="form-group {{ ($errors->has('drugs_given')) ? 'has-error' : '' }} required">
    {!! Form::label('drugs_given', 'Drugs given', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('drugs_given', null, ['class' => 'form-control', 'placeholder' => 'Drugs given', 'rows' => '3']) !!}
        <p class="help-block">{{ ($errors->has('drugs_given') ? $errors->first('drugs_given') : '') }}</p>
    </div>
</div>


<style>

    #canvas {
        border: 10px solid transparent;
    }
    .rectangle {
        border: 1px solid #FF0000;
        position: absolute;
    }
</style>