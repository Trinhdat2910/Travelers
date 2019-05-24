@extends('admin.layout.index')

@section('content')

<div class="card">
                <div class="card-body">
                  @if(count($errors) > 0 )
                      <div class= "alert alert-danger" >
                        @foreach($errors -> all() as $err)
                          {{ $err }}<br>


                        @endforeach

                      </div>
                  @endif
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >DANH SÁCH NHÂN VIÊN HƯỚNG DẪN</h4>
                    <a><button class="btn btn-success btn-block" style="width: 200px; float: right;" data-toggle="modal" data-target="#exampleModal">Thêm Nhân Viên
                  <i class="mdi mdi-plus"></i>
                  </button></a>
                  </div>
                   
                 
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table  table-striped" id="dsnv">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          
                          <th>
                            Họ Tên/ Mã NV
                          </th>
                          <th>
                           Thông Tin Liên Hệ
                          </th>
                          
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $nv)
                          <tr>
                            
                            <td >
                              ({{ $nv -> TenNV}})/ <br> 
                              ({{ $nv -> MaNV}}) <br> 
                              <img src="upload/nhanvien/{{ $nv -> HinhAnh}}" style="border-radius: 5px; width: 70px; height: 70px;">
                            </td>
                            <td>
                             
                            
                             <li> Email: {{ $nv -> email}}</li>
                             
                             <li> Tel: {{ $nv -> Tel}}</li>
                             <li> Địa Chỉ {{ $nv -> DiaChi}}</li>
                             <li> Phạm Vi HD: {{ $nv -> khuvuc -> TenKV}}</li>

                            </td>
                            
                           

                            <td>
                              <a class=" editbtn btn btn-dark btn-fw"   style="color: white" data-id="{{$nv -> MaNV}}" data-email="{{ $nv -> email}}" data-ten="{{ $nv -> TenNV}}" data-tel="{{ $nv -> Tel}}" data-pv="{{ $nv -> MaKV}}" data-dc="{{ $nv -> DiaChi}} " {{-- data-macv="{{ $nv -> MaChucVu}} " --}} {{-- data-tencv="{{ $nv -> ChucVu-> TenChucVu}} " --}}>
                          <i class="mdi mdi-cloud-download"></i>Edit</a>
                            
                              <a  class="deletebtn btn btn-danger btn-fw" data-id="{{$nv -> MaNV}}" data-ten="{{ $nv -> TenNV}}">
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">

        <form class="forms-sample" action="admin/qlNV/themNV" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                      
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Họ Tên" name="TenNV" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Avatar</label>
                      <input type="file" class="form-control" id="HinhAnh" name='HinhAnh'>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name='Password' required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="exampleInputCity7" placeholder="Số điện thoại" name='Tel' required>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="2" name='Diachi' required></textarea>
                    </div>

                   
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Phạm Vi Hướng Dẫn</label>
                    
                    <select class="form-control form-control-sm" id="exampleFormControlSelect9" name="Phamvi" required>
                      @foreach(App\khuvuc::all() as $cv)
                      <option value="{{ $cv -> MaKV }}">{{ $cv -> TenKV }}</option>
                      @endforeach
                    </select>
                   
                  </div>
                    
                    
                  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button type="Reset" class="btn btn-light">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>


{{-- Edit --}}

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin Nhân Viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">

        <form class="forms-sample" action="admin/qlNV/suaNV" method="POST" id="editform" enctype = "multipart/form-data">
                    
                   
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{ method_field('PUT') }}
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Mã Nhân Viên</label>
                      <input type="text" class="form-control" id="id" name="MaNV" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="ten" placeholder="Họ Tên" name="Tennv">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="femail" placeholder="Email" name="Emailnv">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Avatar</label>
                      <input type="file" class="form-control" id="exampleInputCity1" placeholder="Chọn Ảnh" name='HinhAnh'>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="ftel" placeholder="Số điện thoại" name='Telnv'>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <textarea class="form-control" id="fdiachi" rows="2" name='Diachinv'></textarea>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputCity1">Phạm Vi Hướng Dân</label>
                      <select class="form-control form-control-sm"  id="fphamvi" name="Phamvinv">
                     
                      @foreach(App\khuvuc::all() as $cv)
                      <option value="{{ $cv -> MaKV }}">{{ $cv -> TenKV }}</option>
                      @endforeach
                    </select>
                    </div>
                    
                    
                  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Submit</button>
        <button type="Reset" class="btn btn-light">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
{{-- endEdit --}}

{{-- DELETE --}}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa thông tin Nhân Viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">

        <form class="forms-sample" method="POST" id="deleteform" enctype = "multipart/form-data">
                    
                   
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                    Bạn muốn xóa thông tin nhân viên 
                    <h3 id="TenNV"></h3>
                   
                                      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
      </form>
    </div>
  </div>
</div>
{{-- endDELETE --}}



@endsection

@section('script')


<script type="text/javascript">
  $(document).ready( function () {
    $('#dsnv').DataTable();
} );

  </script>
<script type="text/javascript">
  $(document).ready(function(){
     $('#dsnv').on('click', function(){
  $('.editbtn').on('click',function(){
    
    
    $('#id').val($(this).data("id"));
    $('#ten').val($(this).data("ten"));
    $('#femail').val($(this).data("email"));
    $('#ftel').val($(this).data("tel"));
    $('#fdiachi').val($(this).data("dc"));
    $('#fphamvi').val($(this).data("pv"));
    $('#editform').attr('action','admin/qlNV/suaNV/'+ $(this).data("id"));
    $('#editModal').modal('show');
  });
  $('.deletebtn').on('click',function(){
    
    var ten = $(this).data("ten");
    document.getElementById('TenNV').innerHTML = ten ;

    // $('#TenNV').val($(this).data("ten"));
    $('#deleteform').attr('action','admin/qlNV/xoaNV/'+ $(this).data("id"));
    $('#deleteModal').modal('show');
  });
   });


  // $('#editform').on('submit', function(e){
  //     e.preventDefault();
  //     var MaNV= $("#id").val();

  //     $.ajax({
  //        headers: {
  //         'X-CSRF-TOKEN': $('input[name="_token"]').val()
  //         },
  //       type: "PUT",
  //       url: "admin/qlNV/suaNV/"+MaNV,
  //       success: function(response){
  //         console.log(response);
  //         $('#editModal').modal('hide');
  //       }

  //     });
  // });
});
</script>


@endsection