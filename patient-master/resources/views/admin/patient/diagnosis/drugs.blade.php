<div ng-repeat="(key, patientNote) in patientNotes">
    <input type="hidden" name="patient_note_drug_id[]" ng-value="patientNote.drug.id">
    <input type="hidden" name="patient_note_dose_id[]" ng-value="patientNote.dose.id">
    <input type="hidden" name="patient_note_route_id[]" ng-value="patientNote.route">
    <input type="hidden" name="patient_note_frequency_id[]" ng-value="patientNote.frequency">
    <input type="hidden" name="patient_note_duration_id[]" ng-value="patientNote.duration">
</div>

<div class="panel panel-default table-reponsive-manual">
    <div class="panel-heading clearfix">
        <h2>Follow up plan & Health education</h2>
        <div class="pull-right btn-patient-notes">
            <a class="btn btn-success btn-sm" ng-disabled="addPatientNoteStatus" ng-click="addPatientNote(); addPatientNoteStatus=true;"><i class="fa fa-plus"></i> Add</a>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Drug</th>
                <th>Dose</th>
                <th>Route</th>
                <th>Frequency</th>
                <th>Duration</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="patientNote in patientNotes">
                <td>@{{ patientNote.drug.name }}</td>
                <td>@{{ patientNote.dose.dose }}</td>
                <td>@{{ patientNote.route }}</td>
                <td>@{{ patientNote.frequency }}</td>
                <td>@{{ patientNote.duration }}</td>
                <td class="text-center text-nowrap">
                    <span class="btn btn-danger btn-sm" ng-click="removePatientNote(patientNote);" ng-disabled="addPatientNoteStatus"><i class="fa fa-close"></i></span>
                    {{--<span class="btn btn-info btn-sm" ng-click="addEditPatientNote(patientNote);" ng-disabled="addPatientNoteStatus"><i class="fa fa-pencil"></i></span>--}}
                </td>
            </tr>
            </tbody>
        </table>

        <div ng-show="addPatientNoteStatus" class="wrapper-md bg-gd fa-border">
            <div class="form-group required">
                <div class="col-md-2 {{ ($errors->has('drug')) ? 'has-error' : '' }}">
                    {!! Form::select('drug', $drugs, null, ['ng-model' => 'drug','class' => 'form-control', 'placeholder' => 'Select drug', 'ng-change' => 'drugChange();']) !!}
                    <p class="help-block">{{ ($errors->has('drug') ? $errors->first('drug') : '') }}</p>
                </div>
                <div class="col-md-2 {{ ($errors->has('dose')) ? 'has-error' : '' }}">
                    <select name="dose_id" ng-model="dose" class = "form-control" ng-change="doseChange();">
                        <option value=""> Select dose </option>
                        <option ng-selected="@{{ d.id == selectedDoseId }}" ng-repeat="d in doses" value="@{{ d }}">@{{ d.dose }}</option>
                    </select>
                    <p class="help-block">{{ ($errors->has('dose') ? $errors->first('dose') : '') }}</p>
                </div>

                <div class="col-md-2 {{ ($errors->has('route')) ? 'has-error' : '' }}">
                    {!! Form::select('route', ['Oral Tablets' => 'Oral Tablets', 'Syrup' => 'Syrup', 'IM injection' => 'IM injection', 'IB injection' => 'IB injection', 'SC injection' => 'SC injection', 'Supposipory injection' => 'Supposipory injection', 'IV Infusion' => 'IV Infusion'], null, ['ng-model' => 'route','class' => 'form-control', 'placeholder' => 'Select route']) !!}
                    <p class="help-block">{{ ($errors->has('route') ? $errors->first('route') : '') }}</p>
                </div>
                <div class="col-md-2 {{ ($errors->has('frequency')) ? 'has-error' : '' }}">
                    {!! Form::select('frequency', ['Daily' => 'Daily', '12 Hourly/bd' => '12 Hourly/bd', '8 Hourly/tds' => '8 Hourly/tds', '6 Hourly/qds' => '6 Hourly/qds', 'sos' => 'sos'], null, ['ng-model' => 'frequency','class' => 'form-control', 'placeholder' => 'Select frequency']) !!}
                    <p class="help-block">{{ ($errors->has('frequency') ? $errors->first('frequency') : '') }}</p>
                </div>
                <div class="col-md-2 {{ ($errors->has('duration')) ? 'has-error' : '' }}">
                    {!! Form::select('duration', ['1 Day' => '1 Day', '2 Day' => '2 Day', '3 Day' => '3 Day', '5 Day' => '5 Day', '1 Week' => '1 Week', '1 Month' => '1 Month'], null, ['ng-model' => 'duration','class' => 'form-control', 'placeholder' => 'Select duration']) !!}
                    <p class="help-block">{{ ($errors->has('duration') ? $errors->first('duration') : '') }}</p>
                </div>
            </div>
            <div class="btn-group">
                <a class="btn btn-default" ng-click="cancelPatientNote();">Cancel</a>
                <a ng-show="!editStatus" ng-disabled="!drug || !dose || !frequency || !duration" class="btn btn-primary" ng-click="savePatientNote(); addPatientNoteStatus=false;">Save</a>
                <a ng-disabled="!drug || !dose || !frequency || !duration" ng-show="editStatus" class="btn btn-info" ng-click="updatePatientNote(); addPatientNoteStatus=false;">Update</a>
            </div>
            <p class="text-danger" ng-show="!drug || !dose || !frequency || !duration" >Please select the drug, dose, frequency, duration</p>
        </div>
    </div>
</div>