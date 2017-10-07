<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    protected $fillable = ['dose'];

    public function drugs()
    {
        return $this->belongsToMany(Drug::class, 'drug_doses')->withPivot('dose_id');
    }
}
