<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActiveRequest extends Request
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
            
            'time'=>'required|numeric',
        ];
    }

    public function messages(){
        return [

            "time.required"=>'活动时间不能为空！',
            "time.numeric"=>'活动时间必须添加纯数字',
        ];
    }
}
