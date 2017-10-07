<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    @if($horizontal)
        <div class="col-sm-2"></div>
        <div class="col-md-10">
            <div class="inline field">
                <div class="ui toggle pink checkbox">
                    {{ form()->label($name, $label) }}
                    {{ form()->checkbox($name, $value, $checked, array_merge(['class' => 'hidden', 'tabindex' => 0], $attributes)) }}

                </div>
            </div>
        </div>
    @else
        <div class="col-sm-2"></div>
        <div class="col-md-10">
            <div class="inline field">
                <div class="ui toggle checkbox">
                    {{ form()->label($name, $label) }}
                    {{ form()->checkbox($name, $value, $checked, array_merge(['class' => 'hidden', 'tabindex' => 0], $attributes)) }}

                </div>
            </div>
        </div>
    @endif
</div>