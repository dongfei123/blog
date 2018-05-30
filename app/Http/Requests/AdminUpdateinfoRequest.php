<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUpdateinfoRequest extends Request
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
        //自定义添加会员详情请求验证类
        return [

            'nickname' => [

                'required',
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{3,30}$/u'

            ],

            'name' => [

                'required',
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z]{2,16}$/u'
            ],


            'birth'=>'required',

            'pic'=>'image',

            'phone'=>[

                'required',
                'regex:/^1(3[0-9]|47|5[0-9]|7[017]|8[0-9])\d{8}$/Ss'
            ],

            'email'=>'required|email',


        ];
    }

    public function messages(){
        //返回不规则验证结果信息
        return [

            "nickname.required"=>'昵称不能为空！',
            "nickname.regex"=>'昵称不符合规则！',
            "name.required"=>'姓名不能为空！',
            "name.regex"=>'姓名不符合规则！',
            "birth.required"=>'生日不能为空！',
           
            "pic.image"=>'会员头像不符合规则！',
            "phone.required"=>'电话不能为空！',
            "phone.regex"=>'电话不符合规则！',
            "email.required"=>'电子邮箱不能为空！',
            "email.regex"=>'电子邮箱不符合规则！',

        ];
    }
}
