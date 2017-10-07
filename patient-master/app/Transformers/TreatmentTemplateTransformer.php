<?php

namespace App\Transformers;

use App\Role;
use App\TreatmentTemplate;
use League\Fractal\TransformerAbstract;

class TreatmentTemplateTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'surgeryType'
    ];

    public function includeSurgeryType(TreatmentTemplate $treatmentTemplate)
    {
        $surgeryType = $treatmentTemplate->surgeryType()->get();
        return $this->collection($surgeryType, new SurgeryTypeTransformer());
    }

    public function transform(TreatmentTemplate $treatmentTemplate)
    {
        return [
            'id' => (int) $treatmentTemplate->id,
            'en_template' => strip_tags($treatmentTemplate->en_template),
            'ta_template' => strip_tags($treatmentTemplate->ta_template),
            'si_template' => strip_tags($treatmentTemplate->si_template),
            'surgery_type_id' =>(int) $treatmentTemplate->surgery_type_id
        ];
    }

}