<div class="group-space">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Radiological Investigations</h2>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3>CXR</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">CXR</span>
                                    {!! Form::select('cxr[]', ['Normal' => 'Normal', 'Right Lung Shadow' => 'Right Lung Shadow', 'Left Lung Shadow' => 'Left Lung Shadow', 'Cardio Megaly' => 'Cardio Megaly', 'Right Pneumo thorax' => 'Right Pneumo thorax', 'Left Pneumo thorax' => 'Left Pneumo thorax', 'Right Effusion' => 'Right Effusion', 'Left Effusion' => 'Left Effusion', 'Right Reib fracture' => 'Right Reib fracture', 'Left Reib fracture' => 'Left Reib fracture'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>


                            <div class="">
                                {!! Form::text('cxr_comment', null, ['class' => 'form-control', 'placeholder' => 'Comment']) !!}
                                <p class="help-block">{{ ($errors->has('comment') ? $errors->first('comment') : '') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3>Ultra Sound Scan</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">Pus Cell</span>
                                    {!! Form::select('ultra_pus[]', ['Clear' => 'Clear', 'Ronchi' => 'Ronchi', 'Creps' => 'Creps'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>

                            {!! Form::label('ultra_document', 'Documents', ['class' => 'control-label']) !!}
                            {!! Form::file('ultra_document', null, ['class' => 'form-control', 'placeholder' => 'Ultra document']) !!}
                            <p class="help-block">{{ ($errors->has('ultra_document') ? $errors->first('ultra_document') : '') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3>CT Scan</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">Brain</span>
                                    {!! Form::select('ct_scan_brain[]', ['Normal' => 'Normal', 'Right EDH' => 'Right EDH', 'Left EDH' => 'Left EDH', 'Right SDH' => 'Right SDH', 'Left SDH' => 'Left SDH', 'Right SAH' => 'Right SAH', 'Left SAH' => 'Left SAH', 'Right ICH' => 'Right ICH', 'Left ICH' => 'Left ICH', 'Diffuse Axonal Injury Present' => 'Diffuse Axonal Injury Present', 'Cerebral Edema Present' => 'Cerebral Edema Present'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>
                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">Cervical Spaine</span>
                                    {!! Form::select('ct_scan_cervical[]', ['Normal' => 'Normal'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>

                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">Thorax</span>
                                    {!! Form::select('ct_scan_thorax[]', ['Normal' => 'Normal'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>
                            <div class=" group-space">
                                <div class="input-group"> <span class="input-group-addon">Abdomen and Pelvis</span>
                                    {!! Form::select('ct_scan_abdomen[]', ['Normal' => 'Normal'], null, ['class' => 'form-control selectpicker', 'placeholder' => '', 'multiple']) !!}
                                </div>
                            </div>
                            {!! Form::label('ct_scan_document', 'Documents', ['class' => 'control-label']) !!}
                            {!! Form::file('ct_scan_document', null, ['class' => 'form-control', 'placeholder' => 'ct scan document']) !!}
                            <p class="help-block">{{ ($errors->has('ct_scan_document') ? $errors->first('ct_scan_document') : '') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>