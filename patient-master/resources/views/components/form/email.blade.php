<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    @if($horizontal)
        {{ form()->label($name, $label, ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ form()->email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
            <p class="help-block">{{ ($errors->has($name) ? $errors->first($name) : '') }}</p>
        </div>
    @else
        {{ form()->label($name, $label, ['class' => 'control-label']) }}
        {{ form()->email($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
        <p class="help-block">{{ ($errors->has($name) ? $errors->first($name) : '') }}</p>
    @endif
</div>