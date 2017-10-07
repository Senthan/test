<?php

namespace App\Transformers;

use App\Patient;
use League\Fractal\TransformerAbstract;

class PatientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'surgeryType', 'diagnosis'
    ];

    public function includeDiagnosis(Patient $patient)
    {
        $diagnosis = $patient->diagnosis()->get();
        return $this->collection($diagnosis, new DiagnosisTransformer());
    }

    public function includeSurgeryType(Patient $patient)
    {
        $surgeryType = $patient->surgeryType()->get();
        return $this->collection($surgeryType, new SurgeryTypeTransformer());
    }

    public function transform(Patient $patient)
    {
        return [
            'id' => (int) $patient->id,
            'name' => $patient->name,
            'age' => (int) $patient->age,
            'sex' => $patient->sex,
            'ward' => $patient->ward,
            'serial_no' => $patient->serial_no,
            'B_H_T' => $patient->B_H_T,
            'status' => $patient->status,
            'date' => $patient->date,
            'diagnosis' => $patient->diagnosis,
            'patient_uuid' => $patient->patient_uuid,
            'anaesthesis_name' => $patient->anaesthesis_name,
            'operation_theater' => $patient->operation_theater,
            'admission_type' => $patient->admission_type,
        ];
    }

}