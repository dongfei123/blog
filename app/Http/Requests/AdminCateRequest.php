<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCateRequest extends Request
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
            //自定义规则
            'name'=>'required',
        ];
    }
    //自定规则信息
    public function messages(){
        return [
            "name.required"=>'类别名不能为空',
        ];

    }
}
