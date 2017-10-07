<?php

namespace App\Transformers;

use App\Drug;
use League\Fractal\TransformerAbstract;

class DrugTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'dose'
    ];


    public function includeDose(Drug $drug)
    {
        $dose = $drug->dose()->get();
        return $this->collection($dose, new DoseTransformer());
    }


    public function transform(Drug $drug)
    {
        return [
            'id' => (int) $drug->id,
            'name' => $drug->name
        ];
    }

}