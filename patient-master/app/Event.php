<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['event_type_id', 'what', 'all_day', 'start', 'end', 'repeat', 'repeat_every', 'repeat_end', 'where', 'visibility'];
    protected $dates = ['start', 'end', 'repeat_end'];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function staff()
    {
        return $this->belongsToMany(Staff::class)->withPivot(['is_owner']);
    }
    public function patient()
    {
        return $this->belongsToMany(Patient::class)->withPivot(['is_owner']);
    }

    public function isOwner(Staff $staff)
    {
        $owner = $this->staff()->wherePivot('is_owner', 'Yes')->first();
        if($owner) {
            return $staff->id == $owner->id;
        }
        return false;
    }}
