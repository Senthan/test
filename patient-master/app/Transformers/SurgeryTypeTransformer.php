<?php

namespace App\Transformers;

use App\SurgeryType;
use League\Fractal\TransformerAbstract;

class SurgeryTypeTransformer extends TransformerAbstract
{
    public function transform(SurgeryType $surgeryType)
    {
        $diagnosisId = ($surgeryType && $surgeryType->pivot) ? $surgeryType->pivot->diagnosis_id : 0;
        return [
            'id' => (int) $surgeryType->id,
            'name' => $surgeryType->name,
            'diagnosis_id' => (int) $diagnosisId
        ];
    }

}