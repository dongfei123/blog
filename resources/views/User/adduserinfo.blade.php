@extends('AdminPublic.public')
@section('shopadd')
<script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.all.min.js"> </script>
    
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>添加会员详情</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/user/adddetail" method="post" enctype="multipart/form-data">
                    		
                            	
                           
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
                    				<label class="mws-form-label">会员昵称</label>
                    				<div class="mws-form-item">
                    					<input class="large" id="nickname" style="width:500px" type="text" name="nickname" value="{{old('nickname')}}"><span id="nick" style="display:none;">&nbsp;&nbsp;昵称必须为3-30位中文或英文数字及下划线组成</span>
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">姓名</label>
                    				<div class="mws-form-item">
                    					<input class="large" id="name" style="width:500px" type="text" name="name" value="{{old('name')}}"><span id="rname" style="display:none;">&nbsp;&nbsp;姓名必须为2-16位中文或英文组成</span>
                    				</div>
                    			</div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">性别</label>
                    				<div class="mws-form-item">
                                    	<ul class="mws-form-list">
                                        	<label><input type="radio" name="sex" class="required" value="1"> 男</label>
                                        	&nbsp;&nbsp;
                                        	<label><input type="radio" name="sex" value="0"> 女</label>
                                        	&nbsp;&nbsp;
                                        	<label><input type="radio" name="sex" value="2"> 保密</label>
                                        </ul>
                                       
                    				</div>
                    			</div>

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">生日</label>
                    				<div class="mws-form-item" id="age">
                    					<input id="birth" class="large" style="width:500px" type="text" name="birth" placeholder="请按2018-1-1格式填写">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                                    	<label class="mws-form-label">会员头像</label>
                                    	<div class="mws-form-item">
                                        	<div class="fileinput-holder" style="position: relative; margin-top:30px; width:300px;"><input style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;" type="file" name="pic">
                                        		
                                        	</div>
                                        	<img style="width:50px;position:relative;left:-155px;top:-30px;" src="\Admin\b\example\default.jpg"/>
                                        </div>
                                </div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">电话</label>
                    				<div class="mws-form-item">
                    					<input class="large" style="width:500px" type="text"
                    					name="phone"/>
                    				</div>
                    			</div> 

                    			<div class="mws-form-row">
                    				<label class="mws-form-label">电子邮箱</label>
                    				<div class="mws-form-item">
                    					<input class="large" style="width:500px" type="text"
                    					name="email"/>
                    				</div>
                    			</div>                			
               		
                    		</div>
                    		<input type="hidden" name="id" value="{{$id}}"/>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div> 
                     <script type="text/javascript">
	 					window.onload = function(){
	 						$('#nickname').focus(function(){
	 							$('#nick')[0].style.display = 'inline';

	 						});

	 						$('#nickname').blur(function(){
	 							$('#nick')[0].style.display = 'none';

	 						});

	 						$('#name').focus(function(){
	 							$('#rname')[0].style.display = 'inline';

	 						});

	 						$('#name').blur(function(){
	 							$('#rname')[0].style.display = 'none';

	 						});

	 						$('#birth').blur(function(){
	 							if($('#birth').val() != ''){
	 								var birth = $('#birth').val();
	 								$.post('/admin/birth',{'_token':'{{csrf_token()}}','birth':birth},function(data){
	 										if(data == 1){

	 											var success = '<span id="span" style="color:green;">生日输入成功</span>';
	 											
	 											$('span').remove('#span');

	 											$('#age').append(success);


	 										}else{

	 											var fail = '<span id="span" style="color:red;">生日输入失败！</span>';
	 											$('span').remove('#span');
	 											
	 											$('#age').append(fail);

	 										}

	 								});
	 							}else{

	 								$('span').remove('#span');
	 							}
	 						});

	 					}

   					 </script> 	
                </div>

           
             
@endsection
@section('title','添加会员详情')
@section('user')
{{$user}}
@stop
@section('pic')
{{$pic?$pic:'/Admin/b/example/profile.jpg'}}
@stop