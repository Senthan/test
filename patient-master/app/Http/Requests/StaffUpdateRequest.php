<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StaffUpdateRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'designation_id' => 'required',
            'short_name' => 'required',
            'email' => 'required|unique:staffs,email,' . $this->staff->id
        ];
    }
}
