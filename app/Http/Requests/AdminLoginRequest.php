<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminLoginRequest extends Request
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
            //登录时用户名的验证规则
            'username' => [
                'required',
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,20}$/u'
            ],
            'password' => [
                    'required',
                    'regex:/^[A-Za-z0-9_]{6,30}$/',
                    'confirmed'
            ],
            'email'=>'required|email',
        ];
    }

    //规则验证失败信息
    public function messages(){
        return [
            "username.required"=>'用户名不能为空！',
            "username.regex"=>'用户名不符规范!',
            "password.required"=>'密码不能为空!',
            "password.regex"=>'密码不规范!',
            "password.confirmed"=>'密码不一致!',
            "email.required"=>'我们要知道你的e-mail地址，请认真填写！',
            "email.email"=>'邮箱格式不规范！',


        ];
    }
}
