<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminShopRequest;//添加商品请求验证类
use Intervention\Image\ImageManager;//导入图像处理类
use App\Http\Requests\ActiveRequest;//添加活动请求验证类

class ShopController extends Controller
{
    //加载后台商品模块首页
    public function getIndex(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //echo '1111';
        //看是否有商城活动
        $active = DB::table('active')->get();
        foreach($active as $key=>$value){
            $act = $value->name;
        }

        if($act == 0){
            //修改活动商品的状态
            DB::update('update shops set status = ? where status = ?',[0,1]);
        } 
        // dd($active);
        //获取商品的数据
        // $shop = DB::table('shops')->paginate(3);
        // select *,shops.name as sname,cates.name as cname,shops.id as sid from cates,shops where cates.id=shops.cate_id;
        $shop = DB::table('shops')->join('cates','shops.cate_id','=','cates.id')->select(DB::raw('*,shops.name as sname,shops.id as sid,cates.name as cname,cates.id as cid'))->paginate(2);
        // dd($shop);
        //加载模板
        return view('Shop.index',['shop'=>$shop,'user'=>$user,'pic'=>$pic,'act'=>$act]);
    }

    //后台添加商品模块
    public function getAdd(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //获取商品类别信息
        $cate = CateController::getCates();
        //加载模板
        return view('Shop.add',['cate'=>$cate,'user'=>$user,'pic'=>$pic]);

    }

    //执行添加的方法
    public function postInsert(AdminShopRequest $request){
       // dd($request->all());
        $request->flashOnly('name');
        //获取参数信息
        $data = $request->except('_token');
        //图片上传
        if($request->hasFile('pic')){
            //获取上传的文件后缀
            $extension = $request->file('pic')->getClientOriginalExtension();
            //给文件取一个唯一的名字
            $s = time().mt_rand(1,9999);
          
            //把上传的图片移动到指定的位置
            $request->file('pic')->move(Config::get('app.shop_upload'),$s.".".$extension);
            //sdd(Config::get('app.app_upload'));
            //实例化对象
            $image = new ImageManager();
            $image->make(Config::get('app.shop_upload')."/".$s.".".$extension)->resize(100,100)->save(Config::get('app.shop_upload').'/'."t_".$s.".".$extension);
            $data['pic'] = trim(Config::get('app.shop_upload').'/'."t_".$s.".".$extension,".");
        
            //把数据放入数据库
            if(DB::table('shops')->insert($data)){
                return redirect('/admin/shop/index')->with('success','商品添加成功');
            }else{
                return back()->with('error','商品添加失败！');
            }
         }
    }

    //执行删除的方法
    public function getDelete($id){
        //根据id删除数据
        $res = DB::table('shops')->where('id','=',$id)->delete();
        if($res){
            return redirect('/admin/shop/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败！');
        }

    }

    //修改商品的方法
    public function getEdit(Request $request,$sid){
        
        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //根据sid查询商品的数据
        $data = DB::table('shops')->where('id','=',$sid)->first();
        // dd($data);
        //获取商品类别信息
        $cate = CateController::getCates();
        //加载编辑页面
        return view('shop.edit',['data'=>$data,'user'=>$user,'pic'=>$pic,'cate'=>$cate]);


    }

    //处理修改商品的方法
    public function postUpdate(AdminShopRequest $request){
    	//获取商品图片改为相对路径
    	$pic = '.'.$request->input('pict');
    	//获取商品的id
    	$id = $request->input('id');
    	//获取修改的数据
    	$data = $request->except('_token','pict','id');
    	// dd($data);
    	//判断是否修改图片
    	 if($request->hasFile('pic')){
            //获取上传的文件后缀
            $extension = $request->file('pic')->getClientOriginalExtension();
            //给文件取一个唯一的名字
            $s = time().mt_rand(1,9999);
          
            //把上传的图片移动到指定的位置
            $request->file('pic')->move(Config::get('app.shop_upload'),$s.".".$extension);
            //sdd(Config::get('app.app_upload'));
            //实例化对象
            $image = new ImageManager();
            $image->make(Config::get('app.shop_upload')."/".$s.".".$extension)->resize(100,100)->save(Config::get('app.shop_upload').'/'."t_".$s.".".$extension);
            $data['pic'] = trim(Config::get('app.shop_upload').'/'."t_".$s.".".$extension,".");
        
            //修改数据库中数据
            if(DB::table('shops')->where('id','=',$id)->update($data)){
            	//删除原来的图片
            	unlink($pic);
                return redirect('/admin/shop/index')->with('success','商品修改成功');
            }else{
                return back()->with('error','商品修改失败！');
            }

         }else{
         	//把数据放入数据库
            if(DB::table('shops')->where('id','=',$id)->update($data)){
            	
                return redirect('/admin/shop/index')->with('success','商品修改成功');
            }else{
                return back()->with('error','商品修改失败！');
            }

         }
    }


    //添加商城活动
    public function getActive(Request $request){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');

        return view('Active.add',['pic'=>$pic,'user'=>$user]);
 
    }

    //处理添加活动的方法
    public function postAddactive(ActiveRequest $request){

        //获取添加的数据
        $data = $request->except('_token');
        //格式化时间
        $data['time'] = time() + $data['time']*24*60*60;
        // dd($data);
        //若数据库有数据先删除再添加
        $result = DB::table('active')->where('name','>=',0)->delete();
        //开始添加商城活动
        $res = DB::table('active')->insert($data);
        if($res){

            return redirect('/admin/shop/index')->with('','添加商城活动成功');
        }else{
            return back()->with('error','添加商城活动失败！');
        }
    }



}



