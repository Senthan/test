<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurgicalFollowup extends Model
{

    public function examinationFollowup()
    {
        return $this->hasOne(Examination::class);
    }

    public function examinationFollowups()
    {
        return $this->hasMany(Examination::class);
    }
}
