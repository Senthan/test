<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = 'staffs';
    public $filePathLogo = 'resources/staff/logo/';
    protected $fillable = ['first_name', 'last_name', 'short_name', 'email', 'designation_id', 'phone','telephone','profile_image','description'];

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }
}
