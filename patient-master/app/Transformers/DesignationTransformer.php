<?php

namespace App\Transformers;

use App\Designation;
use League\Fractal\TransformerAbstract;

class DesignationTransformer extends TransformerAbstract
{
    public function transform(Designation $designation)
    {
        return [
            'id' => (int) $designation->id,
            'name' => $designation->name,
            'description' => $designation->description
        ];
    }

}