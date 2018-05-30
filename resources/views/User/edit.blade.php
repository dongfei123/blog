@extends('AdminPublic.public')
@section('useredit')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/user/doupdate" method="post">
                    		
                            	
                           
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
                    					<input style="width:500px;height:36px" type="text" name="username" value="{{$info->username}}">
                    				</div>
                    			</div>
                    			
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" type="text" name="email" value="{{$info->email}}">
                    				</div>
                    			</div> 

                                <?php 
                                    //获取用户等级信息
                                    $sta = $info->status;
                                    //定义变量
                                    $pt = $vp = $jy = $cj = '';
                                    if($sta == 0){
                                        $pt = 'selected';
                                    }elseif($sta == 1){
                                        $vp = 'selected';
                                    }elseif($sta == 2){
                                        $jy = 'selected';
                                    }elseif($sta == 3){
                                        $cj = 'selected';
                                    }
                                    

                                    
                                ?>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">用户等级</label>
                                    <div class="mws-form-item">
                                            <select style="width:500px;height:36px" name="status">
                                                <option value="0" {{$pt}}>普通用户</option>
                                                <option value="1" {{$vp}} >vip用户</option>
                                                <option value="2" {{$jy}} >禁用</option>
                                                <option value="3" {{$cj}} >超级管理员</option>
                                            </select>
                                        </div>
                                </div>   
                                         
                                                   			
               		
                    		</div>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input type="hidden" name="id" value="{{$info->id}}">
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection
@section('title','用户修改')
@section('pic')
{{$pic?$pic:'/Admin/b/example/profile.jpg'}}
@stop
@section('user',$info->username)