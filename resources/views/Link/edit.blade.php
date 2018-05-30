@extends('AdminPublic.public')
@section('linkedit')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>友情链接编辑</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/link/update" method="post">
                    		
                            	
                           
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
                    		<?php
                                $gd = $ph = $sr = $ss = '';
                                switch($data->fid){
                                    case 0:
                                            $gd = 'selected';
                                            break;
                                    case 1:
                                            $ph = 'selected';
                                            break;
                                    case 2:
                                            $sr = 'selected';
                                            break;
                                    case 3:
                                            $ss = 'selected';

                                }
                            ?>
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                                        <label class="mws-form-label">友情链接归属</label>
                                        <div class="mws-form-item">
                                            <select class="large" name="fid" style="width:500px;height:36px">
                                            	<option value="">--请选择--</option>
                                            	<option value="0" {{$gd}}>点心/蛋糕</option>
                                                <option value="1" {{$ph}}>饼干/膨化</option>
                                                <option value="2" {{$sr}}>熟食/肉类</option>
                                                <option value="3" {{$ss}}>素食/卤味</option>
                                                
                                              

                                            </select>
                                        </div>
                                </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友情链接名称</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" id="password" type="text" name="name" value="{{$data->name}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">URL</label>
                    				<div class="mws-form-item">
                    					<input style="width:500px;height:36px" type="text" name="url" value="{{$data->url}}">
                    				</div>
                    			</div>
                                                    			
               		
                    		</div>
                            <input type="hidden" name="id" value="{{$data->id}}">
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input value="Submit" class="btn btn-danger" type="submit">
                    			<input value="Reset" class="btn " type="reset">
                    		</div>
                    	</form>
                       
                    </div>    	
                </div>
@endsection
@section('title','友情链接编辑')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')