<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddDiagnosisStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'admission_date' => 'required',
//            'discharge_date' => 'required',
//            'surgery_type_id' => 'required',
//            'consultant' => 'required',
//            'history' => 'required',
//            'follow_up' => 'required',
//            'clinic_day' => 'required',
        ];
    }
}
