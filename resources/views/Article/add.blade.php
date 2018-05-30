@extends('AdminPublic.public')
@section('articleadd')
<script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/Admin/b/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>文章添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/article/insert" method="post" enctype="multipart/form-data">
                    		
                            	
                           
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
                    				<label class="mws-form-label">标题</label>
                    				<div class="mws-form-item">
                    					<input class="large" type="text" name="title" value="">
                    				</div>
                    			</div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">内容</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" class="large" name="content"></textarea>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">描述</label>
                    				<div class="mws-form-item">
                    					<script id="editor" type="text/plain" name="descr"   style="width:800px;height:500px;"></script>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                                    	<label class="mws-form-label">图片</label>
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
                    						<option value="{{$row->id}}">{{$row->name}}</option>
                    						@endforeach
                    					</select>
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
                <script type="text/javascript">
               //实例化编辑器
               //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
               var ue = UE.getEditor('editor');
                </script>
@endsection
@section('title','文章添加')
