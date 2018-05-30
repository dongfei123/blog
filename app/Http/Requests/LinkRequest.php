<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkRequest extends Request
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
            
            'fid'=>'required',
            'name'=>'required',
            'url'=>'required|url',
        ];
    }

    public function messages(){

        return [

            "fid.required"=>'友情链接归属不能为空！',
            "name.required"=>'友情链接名称不能为空！',
            "url.required"=>'URL不能为空！',
            "url.url"=>'URL不合规则！',
        ];
    }
}
