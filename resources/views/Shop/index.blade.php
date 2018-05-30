@extends('AdminPublic.public')
@section('shopindex')
<html>
 <head></head>
 <body>
  <div class="mws-panel-header"> 
   <span><i class="icon-table"></i>商品列表页</span>
    
  </div> 
  <div class="mws-panel-body no-padding"> 
   <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
   	
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
     <thead> 
      <tr role="row">
        <?php 
            $arr = ['暂无','闪购','限时购','团购'];
        ?>
       <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-sort="ascending" aria-label=" Rendering engine: activate to sort column descending">{{$arr[$act]}}ID</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">商品名</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 208px;" aria-label="Browser: activate to sort column ascending">类别</th>

       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 195px;" aria-label="Platform(s): activate to sort column ascending">数量</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">描述</th>
       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 135px;" aria-label="Engine version: activate to sort column ascending">图片</th>



       <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 98px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
      </tr> 
     </thead> 
     <tbody role="alert" aria-live="polite" aria-relevant="all">
     	
      @foreach($shop as $row)
      <tr class="odd">
        
        <?php 

          if($row->status == 1){

              echo '<td><input type="checkbox" checked class="act" name="active" value="'.$row->sid.'"/>'.$row->sid.'</td>';

            }else{

              echo '<td><input type="checkbox" class="act" name="active" value="'.$row->sid.'"/>'.$row->sid.'</td>';
           }
           
        ?>

          <td>{{$row->name}}</td>
          <td>{{$row->cname}}</td>
       		<td>{{$row->num}}</td>

 
       		<td>{!!$row->descr!!}</td>
       		<td><img src="{{$row->pic}}" title="商品图片"></td>
       		


       		<td><a href="/admin/shop/delete/{{$row->sid}}" class="btn btn-success"><i class="icon-trash"></i></a><a href="/admin/shop/edit/{{$row->sid}}" class="btn btn-success"><i class="icon-wrench"></i></a></td>
      </tr>
     @endforeach
      
     </tbody>
    </table>
    
    <div class="dataTables_paginate paging_full_numbers" id="pages">
      {!!$shop->render()!!}
    </div>
   </div> 
  </div> 
 </body>
 <script type="text/javascript">
  window.onload = function(){
     $('.act').each(function(){
        $(this).click(function(){
            if(this.checked){
              var a = this.value;
              $.post('/home/active',{'_token':'{{csrf_token()}}','a':a,'b':1},function(data){
                  if(data == 1){
                      alert('添加限时够失败！');
                      
                  }else{

                    alert('添加限时购成功');
                  }

              });

            }else{

              var a = this.value;
              $.post('/home/active',{'_token':'{{csrf_token()}}','a':a,'b':0},function(data){
                  // alert(data);
                  alert('取消限时购成功');
              });

            }
        });

     });
    
  }
 </script>
</html>
                	
@endsection
@section('title','商品列表页')
@section('user')
{!!$user!!}
@stop
@section('pic',$pic?$pic:'/Admin/b/example/profile.jpg')