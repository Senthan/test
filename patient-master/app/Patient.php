<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['patient_uuid', 'serial_no', 'name', 'age', 'sex', 'ward', 'B_H_T', 'description', 'status', 'operation_theater', 'admission_type', 'date', 'address', 'phone'];

    public function surgeryType()
    {
        return $this->belongsToMany(SurgeryType::class)->withPivot('diagnosis_id');
    }

    public function diagnosis()
    {
        return $this->belongsToMany(Diagnosis::class, 'patient_surgery_type', 'patient_id', 'diagnosis_id');
    }

    public function patient_diagnosis()
    {
        return $this->belongsToMany(Diagnosis::class, 'patient_surgery_type', 'patient_id', 'diagnosis_id');
    }

    public function examination()
    {
        return $this->hasOne(Examination::class);
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }

    public function surgical()
    {
        return $this->hasMany(Surgical::class);
    }

    public function surgicalFollowup()
    {
        return $this->hasMany(SurgicalFollowup::class);
    }

    public function nonSurgical()
    {
        return $this->hasMany(NonSurgical::class);
    }

    public function nonSurgicalFollowup()
    {
        return $this->hasMany(NonSurgicalFollowup::class);
    }

    public function refferal()
    {
        return $this->hasMany(Refferal::class);
    }

    public function setPatientUuidAttribute($value)
    {
        $this->attributes['patient_uuid'] = str_contains($value, 'OC') ? $value : 'OC' . str_finish($value, 'S');
    }
}
