<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    

    //加载后台登录界面
    public function login(Request $request){
      
        return view('Admin.login');

    }
    //执行登录
    public function dologin(Request $request){
        // dd($request->all());
        //缓存username字段
        $request->flashOnly('username');
        $info = DB::table('users')->where('username','=',$request->input('username'))->first();
        // dd($info);
        //获取数据库中的密码信息
        @$password = $info->password;
        // if(empty($password)){
        //     return back()->with('fail','用户不存在，注册后登录!');
        // }
        // //哈希值得检测
        if(Hash::check($request->input('password'),$password)){
            //跳转到后台首页
            //把登录信息存储在session中
            session(['id'=>$info->id,'username'=>$info->username]);
            // dd(111);
            return redirect('/admin/index')->with('success','登录成功');

        }else{

            return back()->with('fail','登录失败！');
        }

    }

    //后台首页
    public function index(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        //获取session中的用户信息
        $user = $request->session()->get('username');
        // dd($user);
        return view('Admin.index',['user'=>$user,'pic'=>$pic]);
    }

    //后台退出
    public function logout(Request $request){
        //销毁session信息
        $request->session()->pull('id','username');
        //跳转到登录界面
        return redirect('/admin/login');
    }
   
    //后台登录时记住用户名
    public function remember(){

        $username = $_POST['username'];
        //从数据库中检索看用户是否存在
        $res = DB::table('users')->where('username','=',$username)->first();
        if($res){

        //如果有ajax请求记住用户
        //把用户存储在属性中
        
            echo $username;
        
        }else{
           
            echo $username;
        }

    }
    //验证用户的生日
    public function birth(){

        //接受客户传来的参数
        $birth = $_POST['birth'];
        //将出生日信息分割成数组
        $info = explode('-',$birth);
        if(count($info) == 3){
             if(1930<$info[0] && $info[0]<2018){
                if(0<$info[1] && $info[1]<13){
                    if(0<$info[2] && $info[2]<32){
                        echo 1;
                    }else{
                        echo 0;
                    }
                }else{
                    echo 0;
                }
             }else{
                echo 0;
             }
        }else{
            echo 0;
        }

    }

    //ajax批量删除友情链接的方法
    public function dlink(){
        //获取ajax传过来的参数
        $arr = $_POST['arr'];
        //循环删除数据
        for($i=0;$i<count($arr);$i++){
            $res = DB::table('flink')->where('id','=',$arr[$i])->delete();
        }

        if($res){
            echo 1;
        }else{
            echo 0;
        }

    }


 


}
