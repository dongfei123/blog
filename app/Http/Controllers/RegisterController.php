<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
   //邮件测试的方法
    public function send(){
        Mail::raw('这是测试',function($message){
            $message->subject('注册测试');//邮件主题
            $message->to('2532199416@qq.com');//接收方

        });
    }
}
