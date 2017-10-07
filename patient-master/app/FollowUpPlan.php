<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUpPlan extends Model
{
    protected $fillable = [
        'dose_id', 'drug_id', 'route', 'frequency','duration'
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }

    public function dose()
    {
        return $this->belongsTo(Dose::class);
    }
}
