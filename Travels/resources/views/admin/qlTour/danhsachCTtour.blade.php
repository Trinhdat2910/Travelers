@extends('admin.layout.index')

@section('content')

<div class="card">
                <div class="card-body">
                	<h3 >Tour: {{ $tour -> TenTour}}/({{ $tour -> MaTour}}) </h3>
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Danh sách địa điểm tour</h4>
                  	<a class="themddbtn btn btn-success btn-block" style="width: 200px; float: right; color: white" data-id = "{{ $tour -> MaTour}} " data-tentour = "{{ $tour -> TenTour}} " >Thêm Địa Điểm Tour
                	<i class="mdi mdi-plus"></i>
              		</a>
                  </div>
                  
                  <div class="table-responsive">
                    @if(session('thongbao1'))
                      <div class= "alert alert-success" >
                        {{session('thongbao1')}}

                      </div>
                    @endif
                    <table class="table table-bordered" id="diadiem">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          
                          <th>
                            Tên Địa điểm/
                            <br>(Mã Địa Điểm)
                          </th>
                          <th>
                            Hình Ảnh
                          </th>
                          <th>
                            Tỉnh
                          </th>
                          
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($diadiemtour as $dd)
                          <tr>
                            <td>
                              {{ $dd -> diadiemdulich -> TenDD}}/({{ $dd -> diadiemdulich -> MaDD}})
                            </td>
                            <td>
                              <img src="upload/diadiem/{{ $dd-> diadiemdulich -> HinhAnh}}" style="border-radius: 5px; width: 70px; height: 70px;">
                            </td>
                            <td>
                              {{ $dd -> diadiemdulich-> tinh -> TenTinh}}
                            </td>
                            
                            <td>
                                                          
                              <a class="deleteddbtn btn btn-danger btn-fw" data-id='{{ $dd -> id }}' data-ten='{{ $dd -> diadiemdulich -> TenDD}}'>
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
<div class="card">
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Danh sách các tour {{ $tour-> TenTour}}</h4>
                  	<a class="themCTTourbtn btn btn-success btn-block" style="width: 150px; float: right; color: white" data-id = "{{ $tour -> MaTour}} " data-tentour = "{{ $tour -> TenTour}} " data-songay="{{ $tour -> SoNgay}}">Thêm Tour
                  <i class="mdi mdi-plus"></i>
                  </a>
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao3'))
                      <div class= "alert alert-success" >
                        {{session('thongbao3')}}

                      </div>
                    @endif
                    <table class="table table-bordered" id="dsct" >
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr >
                          <th  >
                            Mã Tour
                          </th>
                          <th>
                           Ngày Khởi Hành
                          </th>
                          <th>
                            Ngày Kết Thúc
                          </th>
                          
                          <th>
                            NV Hướng Dẫn
                          </th>
                          <th>
                            Số lượng/<br>
                            Số Chỗ Đã Đặt/<br>
                            Còn Trống
                          </th>
                                                    
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(App\chitiettour::where('MaTour',$tour->MaTour)->get() as $ct)
                          <tr>
                            <td  >
                            	{{ $ct-> MaCTTour }}
                              
                            </td>
                            <td>
                            	{{ $ct-> NgayKhoiHanh }}
                              
                            </td>
                            <td>
                              {{ $ct-> NgayKetThuc }}
                             
                            </td>
                            <td>
                            	{{ $ct-> user-> TenNV }}
                            </td>
                            <td>
                              <li>Số lượng: {{ $ct-> SL }}</li>
                              <li>Số chỗ đã đặt: {{ $ct-> SoChoDaDat }}</li>
                              <li>Còn Trống: {{ $ct-> SL - $ct-> SoChoDaDat }}</li>
                            </td>
                            
                            
                            <td>
                              <a href="admin/qlTour/chitiettour/{{$ct -> MaCTTour}}" ><button type="button" class="btn btn-primary btn-fw" >Detail</button></a>
                              <br>
                              <a class="editCTTourbtn btn btn-dark btn-fw" data-id='{{ $ct -> MaCTTour }}' data-tentour='{{$tour -> TenTour }}' data-ngaykh='{{$ct -> NgayKhoiHanh }}' data-ngaykt='{{$ct -> NgayKetThuc }}' data-manv='{{$ct -> MaNV }}' data-sl='{{$ct -> SL }}' style="color: white" >
                          <i class="mdi mdi-alert-outline"></i>Edit</a>
                            <br>
                              <a class="delcttourbtn btn btn-danger btn-fw" data-id='{{ $ct -> MaCTTour }}' >
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

<div class="modal fade" id="addDDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Địa Điểm Cho Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="addDDform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                                        
                    <h3 id="matour1"></h3>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Chọn Tỉnh/TP</label>
                    <select class="form-control form-control-sm" id="MaTinh"  name="MaTinh" required>
                      
                    </select>
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Chọn Địa Điểm</label>
                    <select class="form-control form-control-sm" id="MaDD"  name="MaDD" required="">
                      
                    </select>
                  </div>
                  
                    
                             
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">ADD</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="deleteDDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Địa Điểm Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="deleteDDform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                         Bạn Muốn xóa địa điểm               
                    <h3 id="tenDD"></h3>
                  
                  
                  
                    
                             
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">DELETE</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="delCTTourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="deleteCTTourform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                         Bạn Muốn xóa Tour Này              
                    
                  
                  
                  
                    
                             
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">DELETE</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="addCTTourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="addCTTourform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}                                   
                    <h3 id="matour2"></h3>

                    <div class="form-group">
                      <label for="exampleInputName1">Ngày Khởi Hành</label>
                      <input type="date" class="form-control" id="NgayKhoiHanh"  name="NgayKhoiHanh">
                    </div>
                    
                    
                  <div class="form-group">
                      <label for="exampleInputName1">Ngày Kết Thúc</label>
                      <input type="date" class="form-control" id="NgayKetThuc"  name="NgayKetThuc" readonly>
                    </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhân Viên Hướng Dẫn</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="NhanVienHD">
                      @foreach(App\user::where('level',1)->get() as $nv)
                      <option value="{{ $nv -> MaNV }}">{{ $nv -> TenNV }} / {{ $nv -> khuvuc -> TenKV}}</option>
                      @endforeach
                    </select>
                  </div>
                                        
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Lượng Khách</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="SL">
                    </div>   
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">ADD</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="editCTTourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="editCTTourform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{ method_field('PUT') }}                                   
                    <h3 id="matour3"></h3>

                    <div class="form-group">
                      <label for="exampleInputName1">Ngày Khởi Hành</label>
                      <input type="date" class="form-control" id="NgayKhoiHanh1"  name="NgayKhoiHanh">
                    </div>
                    
                    
                  <div class="form-group">
                      <label for="exampleInputName1">Ngày Kết Thúc</label>
                      <input type="date" class="form-control" id="NgayKetThuc1"  name="NgayKetThuc">
                    </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhân Viên Hướng Dẫn</label>
                    <select class="form-control form-control-sm" id="NhanVienHD1" name="NhanVienHD">
                      @foreach(App\user::where('level',1)->get() as $nv)
                      <option value="{{ $nv -> MaNV }}">{{ $nv -> TenNV }}/{{ $nv -> khuvuc -> TenKV }}</option>
                      @endforeach
                    </select>
                  </div>
                                        
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Lượng</label>
                      <input type="text" class="form-control" id="SL" name="SL">
                    </div>   
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Update</button>
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
    $('#diadiem').DataTable();
    $('#dsct').DataTable();
} );

  </script>


  <script type="text/javascript">
  $(document).ready(function(){
    $('#diadiem').on('click', function(){
  $('.themddbtn').on('click',function(){
      
    // $('#ften').val($(this).data("ten"));
    // $('#fmatinh').val($(this).data("tinh"));
    var tentour = $(this).data("tentour");
    document.getElementById('matour1').innerHTML = tentour ;
    $('#MaQG').on('change',function(){
              
              var qg = $('#MaQG').val();

        $.get('admin/ajax/tinh/'+ qg  , function(data){
          $('#MaTinh').html(data);
        
          
        });
      });
    $('#MaTinh').on('click',function(){
              
              var tinh = $('#MaTinh').val();

        $.get('admin/ajax/diadiemdl/'+ tinh  , function(data){
          $('#MaDD').html(data);
        
          
        });
      });
    
    
    $('#addDDform').attr('action','admin/qlTour/themDDDL/'+ $(this).data("id"));
   
    $('#addDDModal').modal('show');

  });
  $('.deleteddbtn').on('click',function(){
    
    var ten = $(this).data("ten");
    document.getElementById('tenDD').innerHTML = ten ;

    // $('#TenNV').val($(this).data("ten"));
    $('#deleteDDform').attr('action','admin/qlTour/xoaDDDL/'+ $(this).data("id"));
    $('#deleteDDModal').modal('show');
  });
  

});
     $('#dsct').on('click', function(){
      $('.delcttourbtn').on('click',function(){

    $('#deleteCTTourform').attr('action','admin/qlTour/xoaCTTour/'+ $(this).data("id"));
    $('#delCTTourModal').modal('show');
  });

      $('.themCTTourbtn').on('click',function(){
      var t=$(this).data("id");
    var sn=$(this).data("songay");
            var s =sn-1;
    // $('#ften').val($(this).data("ten"));
    // $('#fmatinh').val($(this).data("tinh"));
    var tentour = $(this).data("tentour");
    document.getElementById('matour2').innerHTML = tentour ;
    $('#addCTTourform').attr('action','admin/qlTour/themCTTour/'+ $(this).data("id"));
    $('#addCTTourModal').modal('show');
    $('#NgayKhoiHanh').change( function(){
      var ngaykh = $('#NgayKhoiHanh').val();
      var datekh= new Date(ngaykh);
      var today = new Date();
      var now=Number(today);
      var numngaykh= Number(datekh);
       
        if((numngaykh- now)<0){
          alert('Ngày Khởi Hành phải lớn hơn ngày hiện tại');
          $('#NgayKhoiHanh').val("");

        }
        else{
          var day= numngaykh +(1000*60*60*24*s);
            var date1= new Date(day);
           
            if (date1.getMonth() >= 10) { // Nếu tháng >= tháng 10
 
             if (date1.getDate() >= 10) { // Nếu ngày >= ngày 10
           
            var date  = date1.getFullYear()+ '-' +(date1.getMonth()+1) + '-' + date1.getDate(); 
             }
             else{ // Nếu ngày < ngày 10 thì sẽ là 09, 08, 07,...
           
            var date  = date1.getFullYear()+ '-' +(date1.getMonth()+1) + '-0' + date1.getDate();
             }
          }
          else{ // Nếu tháng < tháng 10
           
                if (date1.getDate() >= 10) { // Nếu ngày >= ngày 10
           
                 var date   = date1.getFullYear()+ '-0' +(date1.getMonth()+1) + '-' + date1.getDate();  
                }
                else{ // Nếu ngày < ngày 10 thì sẽ là 09, 08, 07,...
           
                var date  = date1.getFullYear()+ '-0' +(date1.getMonth()+1) + '-0' + date1.getDate();
                }
          }
            $('#NgayKetThuc').val(date);
            // document.getElementById('#NgayKetThuc').value=date;
            
          
            
        }
      
    });
    $('#NgayKetThuc').change( function(){
            var ngaykt = $('#NgayKetThuc').val();
            var ngaykh = $('#NgayKhoiHanh').val();
              if(ngaykh =="" ){
                alert('Vui Lòng Chọn Ngày Khởi Hành' );
                $('#NgayKetThuc').val("");
              }
              else{
                $('#NgayKhoiHanh').change( function(){
                  var ngaykh = $('#NgayKhoiHanh').val();
                  if (ngaykh > ngaykt) {
                    alert('Ngày Khởi Hành phải nhỏ hơn ngày kết thúc' );
                    $('#NgayKhoiHanh').val("");
                  }

                });
              }
          });

  });

      $('.editCTTourbtn').on('click',function(){
      
    $('#NgayKhoiHanh1').val($(this).data("ngaykh"));
    $('#NgayKetThuc1').val($(this).data("ngaykt"));
    $('#NhanVienHD1').val($(this).data("manv"));
    $('#SL').val($(this).data("sl"));
    var tentour = $(this).data("tentour");
    document.getElementById('matour3').innerHTML = tentour ;
    $('#editCTTourform').attr('action','admin/qlTour/suaCTTour/'+ $(this).data("id"));
    $('#editCTTourModal').modal('show');
  });
     });

 
});
</script>
@endsection