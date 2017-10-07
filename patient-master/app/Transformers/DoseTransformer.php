<?php

namespace App\Transformers;

use App\Dose;
use League\Fractal\TransformerAbstract;

class DoseTransformer extends TransformerAbstract
{
    public function transform(Dose $dose)
    {
        return [
            'id' => (int) $dose->id,
            'dose' => $dose->dose
        ];
    }

}