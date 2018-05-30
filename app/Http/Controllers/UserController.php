<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Config;  
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;//引进自定义验证登录表单请求类
use App\Http\Requests\AdminUserinfoRequest;//添加会员详情请求验证类
use Intervention\Image\ImageManager;//导入图像处理类
use App\Http\Requests\AdminUpdateinfoRequest;//修改会员详情请求验证类


class UserController extends Controller
{
  //用户添加
    public function getAdd(Request $request){
        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //加载用户添加模块
        return view('User.add',['pic'=>$pic,'user'=>$user]);

    }

    //处理用户添加的方法
    public function postInsert(AdminLoginRequest $request){
        //获取数据
        // $redata = $request->all();
        //删除确认密码数据
        // $redata = $request->except('password_confirmation');
        // dd($redata);
        //缓存用户名及email数据
        $request->flashOnly('username','email');
        //定义一个数组存储数据
        $data = [];
        $data['username'] = $request->input('username');
        //用Hash对密码进行加密
        $data['password'] = Hash::make($request->input('password'));
        // dd($data);
        $data['email'] = $request->input('email');
        $data['status'] = $request->input('status');
        //获取用户的秘钥
        $data['_token'] = $request->input('_token');
        // $ndata = array_merge($redata,$data);
         // dd($data);
        //把数据插入数据库
        $res = DB::table('users')->insert($data);
        if($res){
            return redirect('/admin/user/index')->with('success','添加用户成功');
        }else{
            return back()->with('fail','添加用户失败！');
        }


    }


    //显示用户列表模块
    public function getIndex(Request $request){

         $arr = [
              '普通用户',
              '<font color="red">vip用户</font>',
              '<font color="gray">禁用</font>',
              '<font color="green" size="3">超级管理员</font>'
        ] ;  

        $user = $request->session()->get('username');
        //根据session中的id获取会员图片
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        //查询数据表数据分配到列表页
        $list = DB::table('users')->where('username','like','%'.$request->input('keywords').'%')->paginate(3);
        // dd($arr);
        //加载用户列表模块
        return view('User.index',['list'=>$list,'user'=>$user,'pic'=>$pic,'arr'=>$arr]);

    }

    //删除用户
    public function getDelete($id){
        //获取用户的id开始删除
        $res = DB::table('users')->where('id','=',$id)->delete();
        if($res){
            return redirect('/admin/user/index')->with('success','删除成功');
        }else{
            return back()->with('fail','删除失败！');
        }

    }

    //编辑用户的方法
    public function getUpdate(Request $request,$id){

        //根据session中的id获取会员图片
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        //获取用id查询数据
        $info = DB::table('users')->where('id','=',$id)->first();
        // dd($info);
        return view('User.edit',['info'=>$info,'pic'=>$pic]);


    }

    //处理用户编辑的方法
    public function postDoupdate(Request $request){
        //获取修改用户的id
        $id = $request->input('id');
        //获取修改的数据
        $data = $request->except('id','_token');
        $res = DB::table('users')->where('id','=',$id)->update($data);
        //修改结果处理
        if($res){
            return redirect('/admin/user/index')->with('success','修改成功');
        }else{
            return back()->with('fail','修改失败！');
        }

    }

    //会员详情的处理方法
    public function getDetail(Request $request,$id){
        //获取会员的id
        // dd($id);
        //根据session中的id获取会员图片
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        //查看会员是否添加了详情信息
        $info = DB::table('userinfo')->where('uid','=',$id)->first();
        //获取登录的超级管理员
        $user = $request->session()->get('username'); 
        // var_dump($info);die;
        if(!$info){
            //如果会员没有详情就去添加详情
            return view('User.adduserinfo',['id'=>$id,'pic'=>$pic,'user'=>$user]);

        }else{
            //有会员详情就跳到会员详情修改页面
            //将会员详细信息分配到指定页面
            return view('User.updateuserinfo',['id'=>$id,'pic'=>$pic,'info'=>$info,'user'=>$user]);
        }

    }

    //处理添加会员详情的方法
    public function postAdddetail(AdminUserinfoRequest $request){
        //获取用户信息
        // $userinfo = $request->all();
        
        // dd($userinfo);
        //删除_token数据
        $userinfo = $request->except('_token','id');
        // dd($userinfo['pic']);
        //会员表的id即会员详情表的uid
        $userinfo['uid'] = $request->input('id');
         //图片上传
        if($request->hasFile('pic')){

            //获取上传的文件后缀
            $extension = $request->file('pic')->getClientOriginalExtension();
            //给文件取一个唯一的名字
            $s = time().mt_rand(1,9999);
          
            //把上传的图片移动到指定的位置
            $request->file('pic')->move(Config::get('app.user_upload'),$s.".".$extension);
            //sdd(Config::get('app.app_upload'));
            //实例化对象
            $image = new ImageManager();
            $image->make(Config::get('app.user_upload')."/".$s.".".$extension)->resize(100,100)->save(Config::get('app.user_upload').'/'."t_".$s.".".$extension);
            $userinfo['pic'] = trim(Config::get('app.user_upload').'/'."t_".$s.".".$extension,".");
            // dd($userinfo);
            //把数据放入数据库
            if(DB::table('userinfo')->insert($userinfo)){
                return redirect('/admin/user/index')->with('success','会员详情添加成功');
            }else{
                return back()->with('error','会员详情添加失败！');
            }
         }


    }

    //处理修改会员详情的方法
    public function postUpdatedetail(AdminUpdateinfoRequest $request){

        //获取数据的id
        $id = $request->input('id');
        //获取会员的修改数据
        $userinfo = $request->except('_token','id');
        // dd($userinfo);
        
        //从数据库获取会员头像
        $pic = ".".DB::table('userinfo')->where('id','=',$id)->first()->pic;
        // dd($pic);
        //判断是否修改会员头像
        //如果修改头像
        if($request->hasFile('pic')){

            //获取上传的文件后缀
            $extension = $request->file('pic')->getClientOriginalExtension();
            //给文件取一个唯一的名字
            $s = time().mt_rand(1,9999);
          
            //把上传的图片移动到指定的位置
            $request->file('pic')->move(Config::get('app.user_upload'),$s.".".$extension);
            
            //实例化对象
            $image = new ImageManager();
            $image->make(Config::get('app.user_upload')."/".$s.".".$extension)->resize(100,100)->save(Config::get('app.user_upload').'/'."t_".$s.".".$extension);
            $userinfo['pic'] = trim(Config::get('app.user_upload').'/'."t_".$s.".".$extension,".");
            // dd($userinfo);
            //进行数据修改

            if(DB::table('userinfo')->where('id','=',$id)->update($userinfo)){
                //先删除文件再修改数据

                if(unlink($pic)){

                    return redirect('/admin/user/index')->with('success','会员详情修改成功');
                }else{

                    return back()->with('error','会员详情修改失败！');
                }

            }else{

                return back()->with('error','会员详情修改失败！');
            }

            //不修改头像
         }else{
          
            // dd($id);
            // dd($userinfo);
            //修改会员详情表数据
            $res = DB::table('userinfo')->where('id','=',$id)->update($userinfo);
            //处理修改结果
            if($res){

                return redirect('/admin/user/index')->with('success','会员详情修改成功');
            }else{

                return back()->with('error','会员详情修改失败！');
            }

         }

    }




}
