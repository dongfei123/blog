@extends('AdminPublic.public')
@section('shopadd')
<script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>商品的修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/shop/update" method="post" enctype="multipart/form-data">
                    		
                            	
                           
                    	   @if (count($errors) > 0)
                    		<div class="mws-form-message warning">
							    <div class="alert alert-danger">
							        <ul>
							             @foreach ($errors->all() as $error)
							                <li>{{$error}}</li>
							             @endforeach
							        </ul>
							    </div>
							</div>
					       @endif
                    		
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">商品名</label>
                    				<div class="mws-form-item">
                    					<input class="large" type="text" name="name" value="{{$data->name}}">
                    				</div>
                    			</div>
                    			
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">描述</label>
                    				<div class="mws-form-item">
                                        <p style="color:red;">数据严格按照此格式输入：商品品牌名称--店铺优惠（满三件7折等）--促销价--原价--月销量--累计销量--累计评价--口味（原味,[英文逗号分割]奶油）--包装（手袋单人份,[英文逗号分割]礼盒双人份）</p>
                    					<script id="editor" type="text/plain" name="descr"   style="width:820px;height:200px;">{!!$data->descr!!}</script>
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                                    	<label class="mws-form-label">商品图片</label>
                                    	<div class="mws-form-item">
                                        	<div class="fileinput-holder" style="position: relative;">
                                        		<img src="{{$data->pic}}" width="60px" title="商品图片"/>
                                        	</div>
                                        </div>
                                </div>
                    			<div class="mws-form-row">
                                    	<label class="mws-form-label">修改商品图片</label>
                                    	<div class="mws-form-item">
                                        	<div class="fileinput-holder" style="position: relative;"><input style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;" type="file" name="pic"></span></div>
                                        </div>
                                </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">类别</label>
                    				<div class="mws-form-item">
                    					<select class="large" name="cate_id">
                    						<option value="0">--请选择--</option>
                    					   @foreach($cate as $row)
	                    						<option value="{{$row->id}}"@if($data->cate_id == $row->id) selected
	                    							@endif>{{$row->name}}</option>
                    				        @endforeach
                    					</select>
                    				</div>
                    			</div> 
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">数量</label>
                    				<div class="mws-form-item">
                    					<input class="large" type="text"
                    					name="num" value="{{$data->num}}"/>
                    				</div>
                    			</div>                  			
               					<input type="hidden" name="id" value="{{$data->id}}">
                    		</div>
                    		<input type="hidden" name="pict" value="{{$data->pic}}">
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <script type="text/javascript">
               //实例化编辑器
               //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
               var ue = UE.getEditor('editor');
                </script>
@endsection
@section('title','商品的修改')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')
