<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{

    public function followUp()
    {
        return $this->hasMany(FollowUpPlan::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function patient()
    {
        return $this->belongsToMany(Patient::class, 'patient_surgery_type');
    }

    public function getClinicDayAttribute($value) {
        return Carbon::parse($value)->format('l h:i:s A');
    }
}
