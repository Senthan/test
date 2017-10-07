<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Hashids\Hashids;

class PatientUUIDStoreRequest extends Request
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
        $rule = [];
        //$rule['type'] = 'required';
        if($this->request->get('type') != "" && $this->request->get('type') == 'nic_no_have_not') {
            $days = '';
            $monthDays = [0, 31, 60, 91, 121, 152, 182, 213, 244, 274, 305, 335];
            $checkDigit = $this->request->get('check_digit');
            $date  = Carbon::createFromFormat('Y-m-d',$this->request->get('date_of_birth'));
            $result = preg_replace("/[^a-zA-Z]/", "", $this->request->get('address'));
            $hashids = new Hashids($result);
            $registerNo = $hashids->encode(1, 2, 3);
            $registerNo = md5($registerNo) % 9999;
            $registerNo = str_pad($registerNo, 3, "0", STR_PAD_LEFT);
            if($date && $date->month) {
                $day = $monthDays[$date->month - 1] + $date->day;
                $day = str_pad($day, 3, "0", STR_PAD_LEFT);
                $days = ($this->request->get('gender') && $this->request->get('gender') == 'Female') ? $day + 500 : $day;
            }
            $nicNo = $date->year.$days.$registerNo.$checkDigit.'X';
            $rule['address'] = 'required|unique:patients,patient_uuid,'.$nicNo;
            $rule['gender'] = 'required';
            $rule['check_digit'] = 'required';
            $rule['date_of_birth'] = 'required';
        }
        if($this->request->get('type') != "" && $this->request->get('type') == 'nic_no') {
            $nicNo = $this->request->get('nic_no');
            $rule['nic_no'] = 'required|unique:patients,patient_uuid,NULL,id'.$nicNo;
        }
        return $rule;
    }
}
