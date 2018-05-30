<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminShopRequest extends Request
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
            //
            'name'=>'required',
            'descr'=>'required',
            'pic'=>'image',
            'num'=>'required|numeric',
        ];
    }

    public function messages(){
        return[
            "name.required"=>'商品名字不能为空',
            "descr.required"=>'商品描述不能为空',
            
            "pic.image"=>'商品图片类型不合法',
            "num.required"=>'商品数量不能为空',
            "num.numeric"=>'商品数量必须为数字',

        ];

    }
}
