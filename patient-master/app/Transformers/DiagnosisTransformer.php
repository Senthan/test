<?php

namespace App\Transformers;

use App\Diagnosis;
use App\Drug;
use League\Fractal\TransformerAbstract;

class DiagnosisTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'staff'
    ];


    public function includeStaff(Diagnosis $diagnosis)
    {
        $staff = $diagnosis->staff()->get();
        return $this->collection($staff, new StaffTransformer());
    }


    public function transform(Diagnosis $diagnosis)
    {
        return [
            'id' => (int) $diagnosis->id
        ];
    }

}