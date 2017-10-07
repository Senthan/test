<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentTemplate extends Model
{
    public $filePathLogo = 'resources/templates/';
    public function surgeryType()
    {
        return $this->belongsTo(SurgeryType::class);
    }
}
