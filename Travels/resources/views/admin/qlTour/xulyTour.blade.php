@extends('admin.layout.index')

@section('content')
<div class="card">
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >DANH SÁCH TOUR </h4>
                    
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    
                  </div>
                  @foreach(App\tour::all() as $t)
                  <li style="list-style-type: decimal; height: 40px;" class="table table-bordered"><a data-toggle="collapse" href="#ui-basic{{$t -> MaTour}}" aria-expanded="false" aria-controls="ui-basic" id="qltour" style="color: #666699; font-weight: bold; line-height: 40px; ">{{ $t -> TenTour}} / ({{ $t -> MaTour}})<a> 
                  	<a class="themCTTourbtn btn btn-success btn-block" style="width: 150px; float: right; color: white" data-id = "{{ $t -> MaTour}} " data-tentour = "{{ $t -> TenTour}} " data-songay="{{ $t -> SoNgay}}">Thêm Tour
                  <i class="mdi mdi-plus"></i>
                  </a>
                  </li>
                  	
                  		<div class="collapse" id="ui-basic{{$t -> MaTour}}">
                  			{{-- <ul><a > Mã Tour </a></ul>
                  			@foreach(App\chitiettour::where('MaTour', $t -> MaTour)->get() as $ctt)

              				<ul class="nav flex-column sub-menu">
              				
                			<li class="nav-item">
                  			<a class="nav-link" href="admin/qlTour/danhsachTour" style="float: left;">  {{ $ctt -> MaCTTour}}</a>
                  			<a href="admin/qlTour/chitiettour/{{$ct -> MaCTTour}} style="float:right; "  ><button type="button" class="btn btn-primary btn-fw" >Detail</button></a>
                			</li>
                			
                		</ul>
                		@endforeach --}}

                		<table class="table table-bordered" id ="dsct" >
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr >
                          <th  >
                            Mã Tour
                          </th>
                          <th>
                           Ngày đi/<br>
                           Ngày về
                          </th>
                          
                          
                          <th>
                            NV Hướng Dẫn
                          </th>
                          <th>
                            Số lượng/<br>
                            Số Chỗ Đã Đặt/<br>
                            Còn Trống
                          </th>
                          <th>
                            Tình Trạng
                          </th>
                                                    
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(App\chitiettour::where('MaTour',$t-> MaTour)->get() as $ct)
                          <tr>
                            <td  >
                            	{{ $ct-> MaTour }}-{{ $ct-> MaCTTour }}
                              
                            </td>
                            <td>
                            	{{ $ct-> NgayKhoiHanh }}/<br>
                              {{ $ct-> NgayKetThuc }}
                              
                            </td>
                            
                            <td>
                            	{{ $ct-> user -> TenNV }}
                            </td>
                            <td>
                              <li>Số lượng: {{ $ct-> SL }}</li>
                              <li>Số chỗ đã đặt: {{ $ct-> SoChoDaDat }}</li>
                              <li>Còn Trống: {{ $ct-> SL - $ct-> SoChoDaDat }}</li>
                            </td>
                            <td>
                               @if( $ct -> TinhTrang == 0)
                              <a class="showtt btn btn-rounded btn-outline-primary" data-id="{{ $ct -> MaTour }}" data-ten="{{ $ct -> tour -> TenTour }}" data-ct="{{ $ct -> MaCTTour }}">Mở</a>
                              @else
                              <a class="hidett btn btn-rounded btn-outline-warning" data-id="{{ $ct -> MaTour }}" data-ten="{{ $ct -> tour-> TenTour }}" data-ct="{{ $ct -> MaCTTour }}">Đóng</a>
                              @endif
                             
                            </td>
                            
                            <td>
                              <a href="admin/qlHD/ListHDTour/{{$ct -> MaCTTour}}" class="btn btn-info btn-fw" style="width: 150px;" >List Hợp Đồng</a>
                              <br>
                              <a href="admin/qlTour/chitiettour/{{$ct -> MaCTTour}}" ><button type="button" class="btn btn-primary btn-fw" style="width: 150px;">Detail</button></a>
                              <br>
                              <a class="editCTTourbtn btn btn-dark btn-fw" data-id='{{ $ct -> MaCTTour }}' data-tentour='{{$t -> TenTour }}' data-ngaykh='{{$ct -> NgayKhoiHanh }}' data-ngaykt='{{$ct -> NgayKetThuc }}' data-manv='{{$ct -> MaNV }}' data-sl='{{$ct -> SL }}' data-songay="{{ $t -> SoNgay}}" style="color: white;width: 150px;">
                          <i class="mdi mdi-alert-outline"></i>Edit</a>
                            <br>
                              <a class="delcttourbtn btn btn-danger btn-fw" data-id='{{ $ct -> MaCTTour }}' style="width: 150px;">
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
            
            @endforeach
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
                      <input type="date" class="form-control" id="NgayKhoiHanh"  name="NgayKhoiHanh" required>
                    </div>
                    
                    
                  <div class="form-group">
                      <label for="exampleInputName1">Ngày Kết Thúc</label>
                      <input type="date" class="form-control" id="NgayKetThuc"  name="NgayKetThuc" required readonly="">
                    </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhân Viên Hướng Dẫn</label>
                    <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="NhanVienHD">
                      @foreach(App\user::where('level',1)->get() as $nv)
                      <option value="{{ $nv -> MaNV }}">{{ $nv -> TenNV }} / {{$nv -> khuvuc -> TenKV}}</option>
                      @endforeach
                    </select>
                  </div>
                                        
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Lượng</label>
                      <input type="text" class="form-control" id="exampleInputCity1" name="SL" required>
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
                      <input type="date" class="form-control" id="NgayKetThuc1"  name="NgayKetThuc" required readonly>
                    </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Nhân Viên Hướng Dẫn</label>
                    <select class="form-control form-control-sm" id="NhanVienHD1" name="NhanVienHD" required>
                      @foreach(App\user::where('level',1)->get() as $nv)
                      <option value="{{ $nv -> MaNV }}">{{ $nv -> TenNV }} / {{$nv -> khuvuc -> TenKV}}</option>
                      @endforeach
                    </select>
                  </div>
                                        
                    <div class="form-group">
                      <label for="exampleInputCity1">Số Lượng</label>
                      <input type="text" class="form-control" id="SL" name="SL" required>
                    </div>   
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div></div>
  <div class="modal fade" id="showttModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mở Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="showttform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                    <p id="dauMa1" style="float: left; font-size: 20px;"></p><p style="float: left; font-size: 20px;">-</p><p id="macttour1" style="float: left; font-size: 20px;"></p>         
                    <h3 id="tentour3"  style="margin-left: 100px;"></h3>

                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Mở</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="hidettModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đóng Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="hidettform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    {{--  {{ method_field('PUT') }} --}}
                     <p id="dauMa2" style="float: left; font-size: 20px;"></p><p style="float: left; font-size: 20px;">-</p><p id="macttour2" style="float: left; font-size: 20px;"></p>         
                    <h3 id="tentour4"  style="margin-left: 100px;"></h3>
                       
      </div>
     <div class="modal-footer">
        <button type="submit"  class="btn btn-success mr-2">Đóng</button>
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
        $('.themCTTourbtn').on('click', function(){
    var tentour = $(this).data("tentour");
    document.getElementById('matour2').innerHTML = tentour ;
    var t=$(this).data("id");
    var sn=$(this).data("songay");
            var s =sn-1;

    $('#addCTTourform').attr('action','admin/qlTour/themCTTour/'+ t);
    $('#addCTTourModal').modal('show');
    $('#NgayKhoiHanh').change( function(){
      var ngaykh = $('#NgayKhoiHanh').val();
      var datekh= new Date(ngaykh);
      var today = new Date();
      var now=Number(today);
      var numngaykh= Number(datekh);
       
        if((numngaykh- now)<0){
          alert('Ngày Khởi Hành phải lớn hơn ngày hiện');
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
    // $('#NgayKetThuc').change( function(){
    //         var ngaykt = $('#NgayKetThuc').val();
    //         var ngaykh = $('#NgayKhoiHanh').val();
    //           if(ngaykh =="" ){
    //             alert('Vui Lòng Chọn Ngày Khởi Hành' );
    //             $('#NgayKetThuc').val("");
    //           }
    //           else{
    //             $('#NgayKhoiHanh').change( function(){
    //               var ngaykh = $('#NgayKhoiHanh').val();
    //               if (ngaykh > ngaykt) {
    //                 alert('Ngày Khởi Hành phải nhỏ hơn ngày kết thúc' );
    //                 $('#NgayKhoiHanh').val("");
    //               }

    //             });
    //           }
    //       });

    });
   
      $('.hidett').on('click', function(){
          $('#hidettModal').modal('show');
            var ten = $(this).data("ten")
            var ct = $(this).data("ct");
            var dm1 = $(this).data("id");


            document.getElementById('tentour4').innerHTML = ten ;
            document.getElementById('macttour2').innerHTML = ct ;
            document.getElementById('dauMa2').innerHTML = dm1 ;
            $('#hidettform').attr('action','admin/qlTour/hidettCT/'+ $(this).data("ct"));
        });
        $('.showtt').on('click', function(){
          $('#showttModal').modal('show');
            var ten = $(this).data("ten");
            var ct = $(this).data("ct");
            var dm1 = $(this).data("id");


            document.getElementById('tentour3').innerHTML = ten ;
            document.getElementById('macttour1').innerHTML = ct ;
            document.getElementById('dauMa1').innerHTML = dm1 ;
            $('#showttform').attr('action','admin/qlTour/showttCT/'+ $(this).data("ct"));
        });

    	$('.delcttourbtn').on('click',function(){

    $('#deleteCTTourform').attr('action','admin/qlTour/xoaCTTour/'+ $(this).data("id"));
    $('#delCTTourModal').modal('show');
  });
    	$('.editCTTourbtn').on('click',function(){
      
    $('#NgayKhoiHanh1').val($(this).data("ngaykh"));
    $('#NgayKetThuc1').val($(this).data("ngaykt"));
    $('#NhanVienHD1').val($(this).data("manv"));
    $('#SL').val($(this).data("sl"));
    var tentour = $(this).data("tentour");
     var sn=$(this).data("songay");
            var s =sn-1;
    document.getElementById('matour3').innerHTML = tentour ;
    $('#editCTTourform').attr('action','admin/qlTour/suaCTTour/'+ $(this).data("id"));
    $('#editCTTourModal').modal('show');
    $('#NgayKhoiHanh1').change( function(){
      var ngaykh = $('#NgayKhoiHanh1').val();
      var ngaykt = $('#NgayKetThuc1').val();
      var datekh= new Date(ngaykh);
      var today = new Date();
      var now=Number(today);
      var numngaykh= Number(datekh);
       
        if((numngaykh- now)<0){
          alert('Ngày Khởi Hành phải lớn hơn ngày hiện');
          $('#NgayKhoiHanh1').val("");

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
            $('#NgayKetThuc1').val(date);
        }
      
      
    });
    
  });


} );


  </script>
  @endsection