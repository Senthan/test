<style>
    label {
        font-size: 15px !important;
    }
</style>

<div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }} required">
    {!! Form::label('date', 'Date', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}
        </div>
        <p class="help-block">{{ ($errors->has('date') ? $errors->first('date') : '') }}</p>
    </div>
</div>


<div class="field">
    <label>Complain</label>
    {!! Form::textarea('complain', null, ['rows' => '3']) !!}
    <p class="help-block">{!! ($errors->has('complain') ? $errors->first('complain') : '') !!}</p>
</div>

<div class="field">
    <label>Examination</label>
    {!! Form::textarea('examination', null, ['rows' => '3']) !!}
    <p class="help-block">{!! ($errors->has('examination') ? $errors->first('examination') : '') !!}</p>
</div>

<div class="field">
    <label>Investigation</label>
    {!! Form::textarea('investigation', null, ['rows' => '3']) !!}
    <p class="help-block">{!! ($errors->has('investigation') ? $errors->first('investigation') : '') !!}</p>
</div>


<div class="field">
    <label>Management</label>
    {!! Form::textarea('management', null, ['rows' => '3']) !!}
    <p class="help-block">{!! ($errors->has('management') ? $errors->first('management') : '') !!}</p>
</div>

@section('script')
    <script>
        $(function () {

            $('#date').datetimepicker({
                format: 'YYYY-MM-DD'
            });


            $('#date_of_admission').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        });
    </script>
@endsection