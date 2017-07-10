
@extends('admin.layout.index')
@section('content')

   
<div class="col-lg-12">
<!-- 66666666 -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">添加友情链接</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">添加友联</h4>
      </div>
      <section class="panel">
                          <div class="panel-body">
                              <form action="/admin/links/add" method="post" class="form-inline" role="form">
                                  <div class="form-group">
                                      <label class="sr-only" for="exampleInputEmail2">站点名</label>
                                      <input type="text" class="form-control" name="lname" id="exampleInputEmail2" placeholder="站点名">
                                  </div>
                                      {{ csrf_field()}}
                                  <div class="form-group">
                                      <label class="sr-only" for="exampleInputPassword2">站点链接</label>
                                      <input type="text" class="form-control" name="lurl" id="exampleInputPassword2" placeholder="站点链接 不用添加http">
                                  </div>
                                 
                                  <button type="submit" class="btn btn-success">添加</button>
                              </form>

                          </div>
                      </section>

                  </div>    

    </div>
  </div>
</div>
<!-- 666666666 -->
    @if(count($errors) > 0)
      

<div class="alert alert-success" role="alert">

  @foreach ($errors->all() as $error)
          <span>{{ $error }}</span>
      @endforeach
</div>
    @endif 
 
    
     @if(session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
     @endif      



          <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              友情链接设置
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
                          
                            <thead>
                              <tr>
                                  <!-- <th/></th> -->
                                  <th>ID</th>
                                  <th class="hidden-phone">链接</th>
                                  <th class="hidden-phone">站点名</th>
                                  <th class="hidden-phone">操作</th>
                                  
                              </tr>
                            </thead>

                            <tbody>
                         
                        @foreach ($arr as $den)
 

                            <tr class="odd gradeX">
                              
                              <td>{{ $den['lid']}}</td>
                              <td class="hidden-phone">{{ $den['lurl']}}</a></td>
                              <td class="hidden-phone">{{ $den['lname']}}</td>
                              
                              <td class="hidden-phone">
                                <form action="/admin/links/del" method="post">
                                  {{ csrf_field()}}
                                  <input type="hidden" name="lid" value="{{ $den['lid']}}"> 
                                  <input type="submit" class="btn btn-dange" value="删除">
                                 <a href="/admin/links/alter?id={{ $den['lid']}}" class="btn btn-default">修改</a>
                                 
                      
                                </form>
                                 
                                <!-- - -->

                                 

                                     <!-- <form action="/admin/links/add" method="post" class="form-inline" role="form">
                                                                  <div class="form-group">
                                                                      <label class="sr-only" for="exampleInputEmail2">站点名</label>
                                                                      <input type="text" class="form-control" name="lname" id="exampleInputEmail2" value="{{ $den['lname']}}" >
                                                                  </div>
                                                                      {{ csrf_field()}}
                                                                  <div class="form-group">
                                                                      <label class="sr-only" for="exampleInputPassword2">站点链接</label>
                                                                      <input type="password" class="form-control" name="lurl" id="exampleInputPassword2" value="{{ $den['lurl']}}">
                                                                  </div>
                                                                  <button type="submit" class="btn btn-success">修改</button>
                                                              </form>
                                 -->

                                                                <!--  -->
                                                             
                                  </div>                      
                           
                          @endforeach
                          
                          </tbody>
                          </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          

    @endsection
