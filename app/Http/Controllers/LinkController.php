<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;//友情链接请求验证类



class LinkController extends Controller
{
    public function getAdd(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //加载用户添加模块
        return view('Link.add',['pic'=>$pic,'user'=>$user]);
        
    }


    //处理添加友情的方法
    public function postInsert(LinkRequest $request){
        //获取表单提交的数据
        $data = $request->except('_token');
        // dd($data);
        //把数据插入数据库
        $res = DB::table('flink')->insert($data);
        if($res){

            return redirect('/admin/link/index')->with('success','友情链接添加成功');
        }else{

            return back()->with('fail','友情链接添加失败！');
        }

    }


    //友情链接列表模块
    public function getIndex(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //获取友情链接的数据
        $data = DB::table('flink')->paginate(5);
        // dd($data);
        //加载列表模板
        return view('Link.index',['data'=>$data,'pic'=>$pic,'user'=>$user]);

    }

    //编辑友情链接的方法
    public function getEdit(Request $request,$id){

        // //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //获取要修改的数据
        $data = DB::table('flink')->where('id','=',$id)->first();
        // var_dump($data);
        //加载编辑模板
        return view('Link.edit',['data'=>$data,'user'=>$user,'pic'=>$pic]);
    }

    //处理编辑友情链接的方法
    public function postUpdate(LinkRequest $request){

        //获取修改的id
        $id = $request->input('id'); 
        //获取修改后的数据
        $data = $request->except('_token','id');
        // dd($data);
        if(DB::table('flink')->where('id','=',$id)->update($data)){

            return redirect('/admin/link/index')->with('successs','友情链接修改成功');
        }else{

            return back()->with('fail','友情链接修改失败！'); 
        }

    }

    //删除友情链接的方法
    public function getDelete($id){

        //根据传过来的id删除数据
        if(DB::table('flink')->where('id','=',$id)->delete()){

            return redirect('/admin/link/index')->with('success','删除成功');
        }else{

            return back()->with('fail','删除失败！');
        }
    }
}
