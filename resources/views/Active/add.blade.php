@extends('AdminPublic.public')
@section('shopadd')
<script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.all.min.js"> </script>
    
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加商城活动</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/shop/addactive" method="post">
                    		
                            	
                           
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
                    				<label class="mws-form-label">商城活动</label>
                    				<div class="mws-form-item">
                                    	<ul class="mws-form-list">
                                            <label><input type="radio" name="name" class="required" value="0"> 暂无</label>
                                        	<label><input type="radio" name="name" class="required" value="1"> 闪购</label>
                                        	&nbsp;&nbsp;
                                        	<label><input type="radio" name="name" value="2"> 限时购</label>
                                        	&nbsp;&nbsp;
                                        	<label><input type="radio" name="name" value="3"> 团购</label>
                                        </ul>
                                       
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">活动倒计时时间</label>
                    				<div class="mws-form-item" id="age">
                    					<input id="birth" class="large" style="width:500px" type="text" name="time" placeholder="请输入未来活动天数">
                    				</div>
                    			</div>
                    			
                    		</div>
                    		
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div> 
                    
                </div>

           
             
@endsection
@section('title','添加商城活动')
@section('user')
{{$user}}
@stop
@section('pic')
{{$pic?$pic:'/Admin/b/example/profile.jpg'}}
@stop