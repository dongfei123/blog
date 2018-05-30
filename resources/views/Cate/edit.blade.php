@extends('AdminPublic.public')
@section('cateedit')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>类别修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/cate/update" method="post">
                    		
                            	
                           
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
                    				<label class="mws-form-label">类别名</label>
                    				<div class="mws-form-item">
                    					<input class="large" type="text" name="name" value="{{$info->name}}">
                    				</div>
                    			</div>
                    			
                    			
                    			<div class="mws-form-row">
                                        <label class="mws-form-label">父类</label>
                                        <div class="mws-form-item">
                                             <select class="large" name="pid">
                                                  <option value="0">--请选择--</option>
                                                  @foreach($cates as $row)
                                                  <option value="{{$row->id}}" @if($info->pid == $row->id) selected @endif>{{$row->name}}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                   </div>               			
               		
                    		</div>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input type="hidden" name="id" value="{{$info->id}}">
                                   <input type="hidden" name="path" value="{{$info->path}}">
                                  
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
@endsection
@section('title','类别修改')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')