@extends('employee.layout.index')

@section('contentNV')

<div class="card">
                <div class="card-body">
                  <h4 class="card-title">DANH SÁCH KHÁCH HÀNG</h4>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table table-bordered" id="dskh">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          <th >
                            UserName
                          </th>
                          <th >
                            Tên Khách Hàng/ Mã KH
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
                        @foreach($khachhang as $kh)
                          <tr>
                            <td class="font-weight-medium" >
                              {{ $kh -> Username}} 
                            </td>
                            
                            <td>
                              {{ $kh -> TenKH}}/ ({{ $kh -> MaKH}})
                            </td>
                            <td>
                             <li>PW: {{ $kh -> MatKhau}}</li>
                            
                             <li>Email: {{ $kh -> Email}}</li>
                            
                             <li>Tel: {{ $kh -> Tel}}</li>
                             
                             <li>Địa Chỉ: {{ $kh -> DiaChi}}</li>
                            
                             <li>Quốc Tịch: {{ $kh -> quocgia -> TenQG}}</li>
                            </td>
                            <td>
                              <a class="editbtn btn btn-dark btn-fw" style="color: white" 
                              data-id='{{ $kh -> MaKH}}' data-ten='{{ $kh -> TenKH}}' data-email='{{ $kh -> Email}}' data-tel='{{ $kh -> Tel}}' data-dc='{{ $kh -> DiaChi}}' data-user='{{ $kh -> Username}}'
                              data-maqg='{{ $kh -> MaQG}}'  data-tenqg='{{ $kh -> quocgia -> TenQG}}'>
                          <i class="mdi mdi-cloud-download"></i>Edit</a>
                            <a class="deletebtn btn btn-danger btn-fw" data-id='{{ $kh -> MaKH}}' data-ten='{{ $kh -> TenKH}}'  >
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Thông Tin Khách Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="POST" id="deleteform" enctype = "multipart/form-data">
                    
                   
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                    Bạn muốn xóa thông tin nhân viên 
                    <h3 id="TenKH"></h3>
                   
                                      
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
      </form>
                             
      </div>
      <
      
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Thông Tin Khách Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="editform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="exampleInputName1">Mã Khách Hàng</label>
                      <input type="text" class="form-control" id="makh"  name="MaKH"  readonly>
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputName1">UserName</label>
                      <input type="text" class="form-control" id="fuser"  name="user"  readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Họ Tên</label>
                      <input type="text" class="form-control" id="ften" placeholder="Họ Tên" name="Tenkh" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="femail" placeholder="Email" name="Emailkh" >
                    </div>
                                        
                    <div class="form-group">
                      <label for="exampleInputCity1">Số điện thoại</label>
                      <input type="text" class="form-control" id="ftel" placeholder="Số điện thoại" name='Telkh' >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Địa Chỉ</label>
                      <textarea class="form-control" id="fdc" rows="2" name='Diachikh'></textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Quốc Tịch</label>
                    <select class="form-control form-control-sm" id="fqg"  name="MaQGkh">
                      <option id="fmaqg"></option>
                      @foreach(App\quocgia::all() as $qg)
                      <option value="{{ $qg -> MaQG}}">{{ $qg -> TenQG}}</option>

                      @endforeach
                    </select>
                  </div>
                  
                    
                             
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Update</button>
        <button type="Reset" class="btn btn-light">Reset</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

@endsection
@section('script')

<script type="text/javascript">
  $(document).ready( function () {
    $('#dskh').DataTable();
    
});

  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#dskh').on('click', function(){
  $('.editbtn').on('click',function(){
    
    $('#fuser').val($(this).data("user"));
    $('#makh').val($(this).data("id"));
    $('#ften').val($(this).data("ten"));
    $('#femail').val($(this).data("email"));
    $('#ftel').val($(this).data("tel"));
    $('#fdc').val($(this).data("dc"));
    $('#fmaqg').val($(this).data("maqg"));
    var tenqg = $(this).data("tenqg");
    document.getElementById('fmaqg').innerHTML = tenqg ;
    
   
    $('#editform').attr('action','employee/qlKH/suaKH/'+ $(this).data("id"));
    $('#editModal').modal('show');
  });
  $('.deletebtn').on('click',function(){
    
    var ten = $(this).data("ten");
    document.getElementById('TenKH').innerHTML = ten ;

    // $('#TenNV').val($(this).data("ten"));
    $('#deleteform').attr('action','employee/qlKH/xoaKH/'+ $(this).data("id"));
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