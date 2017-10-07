<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        form()->component('bsText', 'components.form.text', ['name', 'label' => null, 'value' => null, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsTextarea', 'components.form.textarea', ['name', 'label' => null, 'value' => null, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsEmail', 'components.form.email', ['name', 'label' => null, 'value' => null, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsCheckbox', 'components.form.checkbox', ['name', 'label' => null, 'value' => null, 'checked' => false, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsFile', 'components.form.file', ['name', 'label' => null, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsSelect', 'components.form.select', ['name', 'label' => null, 'data' => [], 'value' => null, 'attributes' => [], 'horizontal' => true]);
        form()->component('bsSubmit', 'components.form.submit', ['text', 'class' => 'success']);
        form()->component('bsCancel', 'components.form.cancel', ['text', 'name' => 'home.index', 'params' => []]);

        form()->component('suCombo', 'components.form.su.combo', ['name', 'label' => null, 'default' => 'Search...', 'multiple' => '', 'horizontal' => true]);
        form()->component('suCheckbox', 'components.form.su.checkbox', ['name', 'label' => null, 'value' => null, 'checked' => false, 'attributes' => [], 'horizontal' => true]);
    }
    public function register()
    {

    }
}
