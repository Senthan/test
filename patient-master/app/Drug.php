<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = ['name'];

    public function dose()
    {
        return $this->belongsToMany(Dose::class, 'drug_doses')->withPivot('drug_id');
    }
}
