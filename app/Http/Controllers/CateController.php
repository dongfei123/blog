<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCateRequest;

class CateController extends Controller
{
     //调整类别顺序
    public static function getCates(){
         //原始的方法 DB::raw
        $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach($list as $key=>$value){
            //把字符串转换为数组
            $arr=explode(',',$value->path);
            // var_dump($arr);
            //获取数组的长度
            $len=count($arr);
            // var_dump($len);
            //获取逗号的个数
            $dlen=$len-1;
            // str_repeat 重复字符串
            $list[$key]->name=str_repeat('--|',$dlen).$value->name;
        }

        return $list;
    }
    public function getAdd(Request $request){
        // echo "这是添加";
        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //获取类别信息
        // $list=DB::table('cates')->get();
        $list=self::getCates();
        //dd($list);
        //加载添加模板
        return view('Cate.add',['list'=>$list,'user'=>$user,'pic'=>$pic]);
    }

    //执行添加
    public function postInsert(AdminCateRequest $request){
        //获取参数信息
        // dd($request->all());
        $data = [];
        //添加的分类名称
        $data = $request->input('name');
        //删除秘钥数据
        $data = $request->except('_token');
        //获取pid
        $pid = $request->input('pid');
        //如果添加的是顶级分类
        if($pid == 0){
            //拼接path
            $data['path'] = '0';
            // dd($data);
        }else{
            //如果添加的不是顶级分类
            // dd($data);
            //获取父类的信息
            $info = DB::table('cates')->where('id','=',$pid)->first();
            // dd($info);
            //拼接path
            $data['path'] = $info->path.','.$pid;
        }

        // dd($data);
        //执行数据库的插入操作
        $res=DB::table('cates')->insert($data);
        if($res){
            // echo "111";
            return redirect('/admin/cate/index')->with('success','添加成功');

        }else{
            // echo "0000";
            return back()->with('error','添加失败');
        }
    }
    public $request;
    //定义构造方法
    public function __construct(Request $request){
        //初始化成员属性
        $this->request=$request;
    }
    //调整类别顺序
    public function getCate(){
         //原始的方法 DB::raw
        $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$this->request->input('keywords').'%')->orderBy('paths')->paginate(5);
        //遍历
        foreach($list as $key=>$value){
            //把字符串转换为数组
            $arr=explode(',',$value->path);
            // var_dump($arr);
            //获取数组的长度
            $len=count($arr);
            // var_dump($len);
            //获取逗号的个数
            $dlen=$len-1;
            // str_repeat 重复字符串
            $list[$key]->name=str_repeat('--|',$dlen).$value->name;
        }
        // var_dump($list);die;
        return $list;
    }
    public function getIndex(Request $request){
        // echo "这是列表";
        //获取所有的类别信息
        // $cate=DB::table('cates')->get();
        // $cate=DB::select('select *,concat(path,",",id) as paths from cates order by paths');
        // $cate = DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
       //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');

        $cate=self::getCate();
        // dd($cate);
        //加载模板页面
        return view('Cate.index',['cate'=>$cate,'user'=>$user,'pic'=>$pic,'request'=>$this->request->all()]);
    }

    //执行删除
    public function getDelete($id){
        // dd($id);
        //判断当前类别有没有子类 如果有 先去删除子类 如果没有 直接删除当前类别
        $res=DB::table('cates')->where('pid','=',$id)->count();
        if($res>0){
            //有子类
            return back()->with('error','请删除子类信息');

        }

        //没有子类信息
        if(DB::table('cates')->where('id','=',$id)->delete()){
            return redirect('/admin/cate/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    public function getEdit(Request $request,$id){

        //把会员头像传过去
        $pic = DB::table('userinfo')->where('uid','=',$request->session()->get('id'))->first()->pic;
        $user = $request->session()->get('username');
        //获取需要修改的数据
        $info=DB::table('cates')->where('id','=',$id)->first();
        //加载模板
        return view('Cate.edit',['info'=>$info,'user'=>$user,'pic'=>$pic,'cates'=>self::getCates()]);
    }

    //执行修改
    public function postUpdate(Request $request){
         //获取参数信息
         // dd($request->all());
        $data=array();
        $data=$request->except('_token');
        //获取pid
        $pid=$request->input('pid');
        //如果修改的是顶级分类
        if($pid==0){
            //拼接path
            $data['path']='0';
            // dd($data);
        }elseif($pid === $request->input('id')){
            //判断path是否为0如果为0应转为字符串0
            $data['path'] = $request->input('path')?$request->input('path'):'0';
            $info = DB::table('cates')->where('id','=',$request->input('id'))->first();
            $data['pid'] = strval($info->pid);
            // dd($data);
        }else{
            //如果修改的不是顶级分类
            // dd($data);
            //获取父类的信息
            $info=DB::table('cates')->where('id','=',$pid)->first();
            // dd($info);
            //拼接path
            $data['path']=$info->path.','.$info->id;
        }

        // dd($data);
        //执行数据库的修改操作
        $res=DB::table('cates')->where('id','=',$request->input('id'))->update($data);
        if($res){
            // echo "111";
            return redirect('/admin/cate/index')->with('success','修改成功');
        }else{
            // echo "0000";
            return back()->with('error','修改失败');
        }
    }
}


