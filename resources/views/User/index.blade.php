@extends('AdminPublic.public')
@section('userindex')
<html>
 <head></head>
 <body>
  <div class="mws-panel-header"> 
   <span><i class="icon-table"></i>用户列表页</span> 
  </div> 
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	<form action="/admin/user/index" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>Search: <input aria-controls="DataTables_Table_1" type="text" name="keywords"  value=""/></label><input type="submit" value="搜索">
    </div>
    </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Browser: activate to sort column ascending">用户名</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-label="Platform(s): activate to sort column ascending">邮箱</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">status</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     
     	@foreach($list as $row)

      <tr class="odd" align="center"> 
       		<td>{{$row->id}}</td>
       		<td>{{$row->username}}</td>
       		<td>{{$row->email}}</td>
       		<td>{!!$arr[$row->status]!!}</td>
       		<td><a href="/admin/user/delete/{{$row->id}}" title="删除" class="btn btn-success"><i class="icon-trash"></i></a><a href="/admin/user/update/{{$row->id}}" title="修改" class="btn btn-success"><i class="icon-wrench"></i></a><a href="/admin/user/detail/{{$row->id}}" title="详情" class="btn btn-success"><i class="icon-user"></i></a></td>
      </tr>
      @endforeach
     </tbody>
    </table>
    
    <div class="dataTables_paginate paging_full_numbers" id="pages">
      {!!$list->render()!!}
    </div>
   </div> 
  </div> 
 </body>
</html>
                	
@endsection
@section('title','用户列表页')
@section('pic')
{{$pic?$pic:'/Admin/b/example/profile.jpg'}}
@stop
@section('user',$user)