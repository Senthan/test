<?php

namespace App\Transformers;

use App\Staff;
use League\Fractal\TransformerAbstract;

class StaffTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'designation'
    ];

    public function includeDesignation(Staff $staff)
    {
        $designation = $staff->designation;
        return $this->item($designation, new DesignationTransformer());
    }
    public function transform(Staff $staff)
    {
        return [
            'id' => (int) $staff->id,
            'short_name' => $staff->short_name,
            'last_name' => $staff->last_name,
            'first_name' => $staff->first_name,
            'is_active' => $staff->is_active,
            'email' => $staff->email,
        ];
    }
}