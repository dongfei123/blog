<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{   

    //获取分类信息方法
    public function getcatesbypid($pid){
        $cates = DB::table('cates')->where('pid','=',$pid)->get();
        //遍历$cates
        foreach($cates as $key=>$value){
            //把子分类的信息存储在父级分类shop键中
            $value->shop = self::getcatesbypid($value->id);
        }

        return $cates; 
    }

    //前台首页模块
    public function index(Request $request){

        //获取商品信息
        $info = DB::table('shops')->get();
        // dd($info);
        //商城活动数据
        $active = DB::table('active')->get();
        //获取限时购的数据
        $sale = DB::table('shops')->where('status',1)->get();
        // dd($sale); 
        //获取友情链接数据
        $ldata = DB::table('flink')->get();
        // dd($ldata);
        //获取顶级分类信息
        $cates = self::getcatesbypid(0);
        // dd($cates);
        //加载前台首页模板
        return view('Home.index',['cates'=>$cates,'sale'=>$sale,'ldata'=>$ldata,'active'=>$active,'info'=>$info]);

    }


    //添加限时抢商品
    public function active(){

        //获取前台传来的数据商品的id
        $data = $_POST['a'];
        // echo $data
        $b = $_POST['b'];
        //修改数据库中商品的状态
        if($b == 1){

            $res = DB::update('update shops set status = ? where id = ?',[1,$data]);
        }else{

            $res = DB::update('update shops set status = ? where id = ?',[0,$data]);
        }
        //再判断处于限时抢的商品不能超过4件
        if($res){
            $total = DB::table('shops')->where('status','=',1)->count();
            if($total>4){
                $res = DB::update('update shops set status = ? where id = ?',[0,$data]);
                echo 1;
            }else{
                echo 0;
            }

        }else{

            echo 0;
        }
      

    }
}
