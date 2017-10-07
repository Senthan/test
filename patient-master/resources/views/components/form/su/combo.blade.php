<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    @if($horizontal)
        {{ form()->label($name, $label, ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            <div class="ui fluid search selection dropdown {{ $multiple or '' }}" id="ui_combo_{{ trim($name, ' []') }}">
                {{ form()->hidden($name) }}
                <i class="dropdown icon"></i>
                <div class="default text">{{ $default }}</div>
            </div>
            <p class="help-block">{{ ($errors->has($name) ? $errors->first($name) : '') }}</p>
        </div>
    @else
        {{ form()->label($name, $label, ['class' => 'control-label']) }}
        <div class="ui fluid search selection dropdown" id="ui_combo_{{ trim($name, ' []') }}">
            {{ form()->hidden($name) }}
            <i class="dropdown icon"></i>
            <div class="default text">{{ $default }}</div>
        </div>
        <p class="help-block">{{ ($errors->has($name) ? $errors->first($name) : '') }}</p>
    @endif
</div>