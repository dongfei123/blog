@extends('AdminPublic.public')
@section('cateindex')
<html>
 <head></head>
 <body>
  <div class="mws-panel-header"> 
   <span><i class="icon-table"></i>分类列表页</span> 
  </div> 
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	<form action="/admin/cate/index" method="get">
    <div class="dataTables_filter" id="DataTables_Table_1_filter">
     <label>Search: <input aria-controls="DataTables_Table_1" type="text" name="keywords"  value=""/></label><input type="submit" value="搜索">
    </div>
    </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">分类名称</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">pid</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">path</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     	@foreach($cate as $row)

      <tr class="odd"> 
       		<td>{{$row->id}}</td>
       		<td>{{$row->name}}</td>
       		<td>{{$row->pid}}</td>
       		<td>{{$row->path}}</td>
       		<td><a href="/admin/cate/delete/{{$row->id}}" class="btn btn-success"><i class="icon-trash"></i></a><a href="/admin/cate/edit/{{$row->id}}" class="btn btn-success"><i class="icon-wrench"></i></a></td>
      </tr>
      @endforeach
     </tbody>
    </table>
    
    <div class="dataTables_paginate paging_full_numbers" id="pages">
    {!!$cate->render()!!}
    </div>
   </div> 
  </div> 
 </body>
</html>
                	
@endsection
@section('title','分类列表页')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')