<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventUpdateRequest extends Request
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
        if($this->input('start')) {
            $start = carbon()->createFromFormat('Y-m-d H:i:s', $this->input('start'), config('app.timezone'))->tz('UTC');
            $this->merge(['start' => $start]);
        }
        if($this->input('end')) {
            $end = carbon()->createFromFormat('Y-m-d H:i:s', $this->input('end'), config('app.timezone'))->tz('UTC');
            $this->merge(['end' => $end]);
        }
        return [
            'event_type_id' => 'required|exists:event_types,id',
        ];
    }
}
