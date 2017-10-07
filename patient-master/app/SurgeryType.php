<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgeryType extends Model
{
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function treatmentTemplate()
    {
        return $this->hasMany(TreatmentTemplate::class);
    }

}
