@extends('AdminPublic.public')
@section('linkindex')
<html>
 <head></head>
 <body>
  <div class="mws-panel-header"> 
   <span><i class="icon-table"></i>友情链接列表页</span>
  
  </div> 
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">

       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">友情链接归属</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">友情链接名称</th>

       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">URL</th>
       



       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     	
      @foreach($data as $row)
      <tr class="odd" align="center"> 
         <td align="left"><input type="checkbox" name="id" id="id" value="{{$row->id}}" />&nbsp;&nbsp;{{$row->id}}</td>
       		
       		<td>{{$row->fid}}</td>
          <td>{{$row->name}}</td>
       		<td>{{$row->url}}</td>

       		<td><a href="/admin/link/delete/{{$row->id}}" class="btn btn-success"><i class="icon-trash"></i></a><a href="/admin/link/edit/{{$row->id}}" class="btn btn-success"><i class="icon-wrench"></i></a></td>
      </tr>
     @endforeach
      
     </tbody>
    </table>

    <div class="dataTables_paginate paging_full_numbers" id="pages">
      <button class="col-md-12" id="all" style="position:relative;right:840px;">全选</button>
      <button class="col-md-12" id="invert" style="position:relative;right:830px;">反选</button>
      <button class="col-md-12" id="no" style="position:relative;right:820px;">全不选</button>
      <button class="col-md-12" id="delete" style="position:relative;right:810px;">删除</button>
      {!!$data->render()!!}
    </div>
   </div> 
  </div> 
 </body>
 <script type="text/javascript">

       window.onload = function(){
       

          $('#all').click(function(){
              $(':checkbox').each(function(){
                  this.checked = true;
              });
          });

          $('#invert').click(function(){
              $(':checkbox').each(function(){
                  this.checked = this.checked ? false : true;
              });
          });

          $('#no').click(function(){
              $(':checkbox').each(function(){
                  this.checked = false;
              });
          });

          $('#delete').click(function(){
              //定义一个数组存储需要删除的数据的id
              var arr = []; 
              $(':checkbox').each(function(){
                if(this.checked){
                  arr.push(this.value);
                  $(this).parent().parent().attr("id","del");

                }
              });

              //发送ajax请求删除数据
              $.post('/admin/dlink',{'_token':'{{csrf_token()}}','arr':arr},function(data){
                  if(data == 1){
                      alert('删除成功');
                      $('.odd').remove('#del');
                    
                  }else{
                      alert('删除失败！');
                      
                  }

              });
          });

      }




    </script>
 
</html>


                	
@endsection
@section('title','友情链接列表页')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')