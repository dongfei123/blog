@extends('AdminPublic.public')
@section('useradd')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/user/insert" method="post">
                    		
                            	
                           
                    		@if (count($errors) > 0)
                    		<div class="mws-form-message warning">
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							</div>
							@endif
                    		
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户名</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" id="username" type="text" name="username" value="{{old('username')}}">&nbsp;<span id="husername" style="display:none">用户名必须由2-20位中文或字母或下划线组成</span>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">密码</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" id="password" type="password" name="password">&nbsp;<span id="hpassword" style="display:none">密码必须由6-30位字母或下划线组成</span>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">确认密码</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" type="password" name="password_confirmation">
                    				</div>
                    			</div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">用户等级</label>
                                        <div class="mws-form-item">
                                            <select style="width:500px;height:36px" name="status">
                                                <option value="0">普通用户</option>
                                                <option value="1">vip用户</option>
                                                <option value="2">禁用</option>
                                                <option value="3">超级管理员</option>
                                            </select>
                                        </div>
                                    </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" type="email" name="email" value="{{old('email')}}">
                    				</div>
                    			</div>                   			
               		
                    		</div>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                         <script type="text/javascript">
                              window.onload = function(){
                                   $('#username').focus(function(){
                                        $('#husername').css("display","inline");

                                   });
                                   $('#username').blur(function(){
                                        $('#husername').css("display","none");

                                   });
                                   $('#password').focus(function(){
                                        $('#hpassword').css("display","inline");

                                   });
                                   $('#password').blur(function(){
                                        $('#hpassword').css("display","none");

                                   });
                                   
                              }
                         </script>
                    </div>    	
                </div>
@endsection
@section('title','用户添加')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')