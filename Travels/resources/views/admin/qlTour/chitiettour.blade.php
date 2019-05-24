@extends('admin.layout.index')

@section('content')

<div class="card">
    <h2 style="margin: 0 auto">Dự Toán Chi Phí Dịch Vụ Tour</h2>
                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Chuyến Bay</h4>
                    {{-- @foreach($chitiettour as $ct) --}}
                    <a   class="addCBbtn btn btn-success btn-block"  style="width: 200px; float: right; color: #fff" data-id="{{$chitiettour -> MaCTTour}}">Thêm Chuyến Bay
                  <i class="mdi mdi-plus"></i>
                  </a>
                  {{-- @endforeach --}}
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao1'))
                      <div class= "alert alert-success" >
                        {{session('thongbao1')}}

                      </div>
                    @endif
                    <table class="table table-bordered"  >
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr >
                          <th  >
                            Hãng Bay
                          </th>
                          <th>
                            Số Hiệu
                          </th>
                          <th>
                            Hành Trình
                          </th>
                          <th>
                            Giờ Bay
                          </th>
                          <th>
                            Giá
                          </th>
                          <th>
                            Số Lượng
                          </th>
                          <th>
                            Thanh Toán
                          </th>
                          
                          
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(App\dichvutour::where('MaCTTour',$chitiettour -> MaCTTour)->where('MaLoaiDT','3')->get() as $dvt)
                          <tr>
                            <td  >
                              {{ $dvt-> doitac -> TenDoiTac}}<br>

                            </td>
                            <td>
                              @foreach(App\banggiadichvu::where('MaGiaDV',$dvt-> LoaiDV)->get() as $dv)
                                {{ $dv-> TenDV}}
                              
                              
                              
                            </td>
                            <td>
                              <li>From : {{ $dv-> KhoiHanh}}</li>
                              <li>To : {{ $dv-> DiemDen}}</li>
                              
                             
                            </td>
                            <td>
                              <li>Ngày Bay: {{ $dv-> NgayBay}}</li>
                              <li>Giờ Bay: {{ $dv-> GioBay}}</li>
                            </td>
                            <td>
                              {{ $dvt-> Gia}}
                            </td>
                            <td>
                              {{ $dvt-> SLNL}}
                            </td>
                            <td>
                               Tổng Tiền:{{ number_format($dvt-> TongTien)}} VND<br>
                              Đã Thanh Toán: {{ number_format($dvt-> DaThanhToan)}} VND<br>
                              Còn Lại: {{ number_format($dvt-> TongTien -$dvt-> DaThanhToan)}} VND
                            </td>
                            
                            <?php  $conlai = $dvt-> TongTien -$dvt-> DaThanhToan?>
                            <td>
                              @if($conlai > 0)
                              <a class="ThanhToanDV btn btn-info btn-fw" style="color: white; ">
                          Thanh Toán</a> <br>
                              @endif
                              <a class="delDVbtn btn btn-danger btn-fw" data-id='{{ $dvt -> MaDVTour }}' style="color: white;"  >
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                          @endforeach
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="card-body">
                  <div><h4 class="card-title" style=" float: left; line-height: 40px" >Danh sách dịch vụ Tour</h4>
                  	{{-- @foreach($chitiettour as $ct) --}}

                  	<a   class="addDVbtn btn btn-success btn-block" data-id='{{$chitiettour -> MaCTTour}}' style="width: 200px; float: right; color: #fff" >Thêm Dịch Vụ Tour
                	<i class="mdi mdi-plus"></i>
              		</a>
              		{{-- @endforeach --}}
                  </div>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    
                    <table class="table table-bordered" id="dichvu" >
                      <thead  bgcolor="#308ee0" style="color: #fff; ">
                        <tr >
                          <th  >
                            Loại ĐT<br>
                            Dịch Vụ
                          </th>
                          <th >

                            Tên Đối Tác//<br>
                            (Địa điểm)
                          </th>
                          
                          <th>
                            Ngày CI/<br>
                            Ngày CO
                          </th>
                          <th>
                            Số Lượng
                          </th>
                          <th>
                            Đơn Giá
                          </th>
                          <th>Thanh Toán</th>
                          
                          
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(App\dichvutour::where('MaCTTour',$chitiettour -> MaCTTour)->where('MaLoaiDT','!=','3')->get() as $dvt)
                          <tr>
                            <td style="line-height: 30px;" >
                            	@foreach(App\doitac::where('MaDoiTac',$dvt -> doitac -> MaDoiTac)->get() as $dt)
                            		{{ $dt-> loaidoitac -> TenLoaiDT}}
                            	@endforeach
                              <br>
                              @foreach(App\banggiadichvu::where('MaGiaDV',$dvt-> LoaiDV)->get() as $dv)
                                {{ $dv-> TenDV}}
                            </td>
                            <td style="line-height: 30px;">
                              {{ $dvt-> doitac -> TenDoiTac}}<br>
                              ({{ $dvt-> doitac -> tinh -> TenTinh}})
                              
                            </td>
                            
                            <td style="line-height: 30px;">
                            	<li>{{ $dvt-> NgayCI}}</li>
                              <li>{{ $dvt-> NgayCO}}</li>
                            </td>
                            <td style="line-height: 30px;">
                              @if($dvt-> MaLoaiDT == 4)
                                {{ $dvt-> SLNL}} Xe
                              @else
                              Người Lớn: {{ $dvt-> SLNL}}
                              <br>
                              Trẻ Em: {{ $dvt-> SLTE}}
                              @endif
                            </td>
                            
                            <td style="line-height: 30px;">
                              Người Lớn: {{ number_format($dv-> Gia)}} <br>
                              @if($dv -> GiaTE != null)
                              Trẻ Em: {{ number_format($dv-> GiaTE)}} <br>
                              @endif
                            </td>
                            <td style="line-height: 30px;">
                              Tổng Tiền:{{ number_format($dvt-> TongTien)}} VND<br>
                              Đã Thanh Toán: {{ number_format($dvt-> ThanhToan)}} VND<br>
                              Còn Lại: {{ number_format($dvt-> TongTien -$dvt-> ThanhToan)}} VND
                            </td>
                            
                            <?php  $conlai = $dvt-> TongTien -$dvt-> DaThanhToan?>
                            <td>
                               @if($conlai > 0)
                              <a class="TTbtn1 btn btn-info btn-fw" style="color: white; " data-macttour='{{ $chitiettour -> MaCTTour}}' data-madvt='{{ $dvt-> MaDVTour }}' data-tendt='{{ $dvt-> doitac -> TenDoiTac }}' data-dv='{{ $dv-> TenDV }}' data-chuatt='{{ $dvt-> TongTien -$dvt-> ThanhToan }}' data-tong='{{ $dvt-> TongTien }}' data-datt='{{$dvt-> ThanhToan }}'> 
                                Thanh Toán</a> <br>
                              @endif
                              {{-- <a class="editDVbtn btn btn-dark btn-fw" style="color: white; " data-id='{{ $dvt -> MaDVTour }}' data-idtinh='{{ $dvt-> doitac -> tinh -> MaTinh }}' data-tinh='{{ $dvt-> doitac -> tinh -> TenTinh }}'  data-idldt='{{ $dvt-> doitac -> loaidoitac ->  MaLoaiDT }}' data-ldt='{{ $dvt-> doitac -> loaidoitac-> TenLoaiDT }}' data-iddt='{{ $dvt-> MaDoiTac }}' data-dt='{{ $dvt-> doitac -> TenDoiTac }}' data-iddv='{{ $dvt-> LoaiDV }}' data-dv='{{ $dv-> TenDV }}' data-gia='{{ $dvt-> Gia }}' data-iddv='{{ $dvt-> LoaiDV }}' data-ngayci='{{ $dvt-> NgayCI }}' data-ngayco='{{ $dvt-> NgayCO }}'  data-idct='{{ $dvt-> MaCTTour }}'>
                          <i class="mdi mdi-cloud-download"></i>Edit</a> --}} <br>
                              <a class="delDVbtn btn btn-danger btn-fw" style="color: white;" data-id='{{ $dvt -> MaDVTour }}' >
                          <i class="mdi mdi-alert-outline"></i>Delete</a>
                            </td>
                            
                          </tr>
                          @endforeach
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

   <div class="modal fade" id="delDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa Dịch Vụ</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="delDVform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{-- {{ method_field('PUT') }} --}}
                         Bạn Muốn xóa Dịch Vụ Này              
                    
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">DELETE</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="addDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Dịch Vụ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="addDVform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{-- {{ method_field('PUT') }} --}}
                     
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Loại Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="idDV" name="LoaiDV">
                     @foreach(App\loaidoitac::all() as $dt)
                              <option value="{{ $dt -> MaLoaiDT}}">{{ $dt -> TenLoaiDT}}</option> 
                              
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh/ TP</label>
                    <select class="form-control form-control-sm" id="idTinh" name="tinh" required>
                      @foreach(App\tinh::all() as $dt)
                              
                              <option value="{{ $dt -> MaTinh}}">{{ $dt -> TenTinh}}</option>
                      @endforeach
                    </select>
                  </div>






                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Đối Tác</label>
                    <select class="form-control form-control-sm" id="doitac" name="doitac" required>
                     @foreach(App\doitac::all() as $dt)
                      
                              
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="tendichvu" name="tendichvu" required>
                     
                    </select>
                  </div>
                  <div style="width: 50%; float: left;" >
                      <label for="exampleInputCity1">Đơn Giá</label>
                      <input type="text" class="form-control" id="dongia" name="Gia" readonly style="width: 80%;">
                    </div>
                    <div style="width: 50%; float: left;" >
                      <label for="exampleInputCity1">Đơn Giá Trẻ Em</label>
                      <input type="text" class="form-control" id="dongiaTE" name="GiaTE" readonly style="width: 80%;">
                    </div>
                    <div class="form-group" style="width: 50%; float: left;">
                      <label for="exampleInputCity1">Số Lượng</label>
                      <input type="text" class="form-control" id="SLNL" name="SLNL" style="width: 80%;" >
                    </div>
                    <div class="form-group" style="width: 50%; float: left;" >
                      <label for="exampleInputCity1">Số Lượng Trẻ Em</label>
                      <input type="text" class="form-control" id="SLTE" name="SLTE" style="width: 80%;" >
                    </div>
                    
                  <div  style="width: 50%; float: left;">
                      <label for="exampleInputEmail3">Ngày Check In</label>
                      <input type="date" class="form-control" id="dateCI" name="NgayCI" required style="width: 80%;">
                    </div>
                    <div style="width: 50%; float: left;">
                      <label for="exampleInputEmail3">Ngày Check Out</label>
                      <input type="date" class="form-control" id="dateCO" name="NgayCO" style="width: 80%;">
                    </div>
                    
                    <div class="form-group" id="Totalcar" >
                      <label for="exampleInputCity1">Thành Tiền</label>
                      <input type="text" class="form-control" id="ThanhTien" name="ThanhTien" readonly>
                    </div>

                    
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Thêm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
<div class="modal fade" id="addCBModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="margin-left: 350px; ">
    <div class="modal-content" style="width :800px; ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Chuyến Bay</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="addCBform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{-- {{ method_field('PUT') }} --}}
                     
                    
                    <input type="text" name="DichVu" value="3" style="display:none;">
                  

                  <div class="form-group" style=" width: 30%; float: left;margin-left: 20px;">
                    <label for="exampleFormControlSelect3">Điểm Khởi Hành</label>
                    <select class="form-control form-control-sm" id="khoihanh" name="khoihanh" style="height: 40px;" >
                     @foreach(App\banggiadichvu::where('KhoiHanh','!=','')->get() as $dt)
                      
                              <option>{{ $dt -> KhoiHanh }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" style=" width: 30%; float: left; margin-left: 20px;">
                    <label for="exampleFormControlSelect3">Điểm Đến</label>
                    <select class="form-control form-control-sm" id="diemden" name="diemden" style="height: 40px;" >
                      @foreach(App\banggiadichvu::where('KhoiHanh','!=','')->get() as $dt)
                      
                              <option>{{ $dt -> DiemDen }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" style=" width: 30%; float: left;margin-left: 20px;">
                      <label for="exampleInputEmail3">Ngày Bay</label>
                      <input type="date" class="form-control" id="NgayBay" name="NgayBay" style="height: 40px;">
                  </div>
                  <button type="button" class="timCB btn btn-success" style="margin-left: 310px; margin-bottom: 10px;" >Tìm Chuyến Bay</button>

                  <div class="form-group" >
                      <label for="exampleInputEmail3">Số lượng</label>
                      <input type="text" class="form-control" id="SLKCB" name="SLKCB" style="height: 40px;">
                  </div>
                  <div id="chonchuyenbay" style="width:100%;  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4); border-radius: 5px;">
                    <div id="headerCB" >
                      <div class="hangbay">Hãng Bay</div>
                      <div class="sohieu">Số Hiệu</div>
                      <div class="khoihanh1">Khởi Hành</div>
                      <div class="diemden1">Điểm Đến</div>
                      <div class="ngaybay">Ngày Bay</div>
                      <div class="giobay">Giờ Bay</div>
                      <div class="giacb">Giá</div>
                    </div>
                   
                    <div id="bangCB">
                      
                    
                    </div>
                  </div>

                    
      </div>
     <div class="modal-footer">
        <button type="submit" class="btn btn-success mr-2">Thêm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="editDVModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Dịch Vụ</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">
         <form class="forms-sample"  method="POST" id="editDVform">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     {{ method_field('PUT') }}
                     <input type="hidden" name="MaCTTour" id="MaCTTour" />
                     
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Loại Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="idDV1" name="LoaiDV">
                     @foreach(App\loaidoitac::all() as $dt)
                              <option value="{{ $dt -> MaLoaiDT}}">{{ $dt -> TenLoaiDT}}</option> 
                              
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tỉnh/ TP</label>
                    <select class="form-control form-control-sm" id="idTinh1" name="tinh" required disabled>
                        @foreach(App\tinh::all() as $dt)
                              <option value="{{ $dt -> MaTinh}}">{{ $dt -> TenTinh}}</option> 
                              
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Đối Tác</label>
                    <select class="form-control form-control-sm" id="doitac1" name="doitac" required disabled>
                      @foreach(App\doitac::all() as $dt)
                              <option value="{{ $dt -> MaDoiTac}}">{{ $dt -> TenDoiTac}}</option> 
                              
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect3">Tên Dịch Vụ</label>
                    <select class="form-control form-control-sm" id="tendichvu1" name="tendichvu" required disabled>
                          @foreach(App\banggiadichvu::all() as $dt)
                              <option value="{{ $dt -> MaGiaDV}}">{{ $dt -> TenDV}}</option> 
                              
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" >
                      <label for="exampleInputCity1">Đơn Giá</label>
                      <input type="text" class="form-control" id="dongia1" name="Gia" readonly required>
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputCity1">Gía Trẻ Em</label>
                      <input type="text" class="form-control" id="dongiaTE1" name="GiaTE" readonly>
                    </div>
                  <div class="form-group">
                      <label for="exampleInputEmail3">Ngày Check In</label>
                      <input type="date" class="form-control" id="dateCI1" name="NgayCI" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Ngày Check Out</label>
                      <input type="date" class="form-control" id="dateCO1" name="NgayCO">
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
<div class="modal fade" id="TT1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thanh Toán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample"  method="POST" id="TT1form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    <div class="form-group">
                      <label for="exampleTextarea1">Đối Tác</label>
                      <input type="text" class="form-control" id="doitac2"  name='DoiTac'  readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Dịch Vụ</label>
                      <input type="text" class="form-control" id="dichvu1"  name='DichVu' readonly >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Chưa Thanh Toán </label>
                      <input type="text" class="form-control" id="ChuaTT"  name='ChuaTT' readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Số Tiền Thanh Toán</label>
                      <input type="text" class="form-control" id="SoTienTT"  name='SoTienTT' onKeyPress="return isNumberKey(event)">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Ghi Chú </label>
                      
                      <textarea class="form-control" id="Ghichu"  name='GhiChu'></textarea>
                    </div>
                    <input type="text" class="form-control" id="DaTT1" name='DaTT' style="display: none" >
                    <input type="text" class="form-control" id="SoTien"  name='SoTien' style="display: none" >
                    <input type="text" class="form-control" id="MaCTTour1"  name='MaCTTour1' style="display: none">
                    <input type="text" class="form-control" id="madvtour"  name='madvtour'style="display: none" >
                    <input type="text" class="form-control" id="MaNV"  name='MaNV' value="{{ Auth::id()}}" style="display: none">
                   
                    
                    

                             
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">Thanh Toán</button>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
</div>
@endsection
@section('script')

<script type="text/javascript">
  $(document).ready( function () {
 


      $('.addDVbtn').on('click',function(){
        $('#idDV').on('click',function(){
            

          $('#idTinh').on('click',function(){
              var dv=$('#idDV').val();
              var tinh = $('#idTinh').val();

        $.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
          $('#doitac').html(data);
        
          
        });
      });
        
      });      

        $('#SLNL').on('input', function(){
          var gia=$('#dongia').val();
          var giate=$('#dongiaTE').val();
          var sl= $('#SLNL').val();
          var slte= $('#SLTE').val();
          if ($('#dateCO').val()=="" && $('#SLTE').val()=="") {
          //   var ci = new Date($('#dateCI').val());
          //   var co = new Date($('#dateCO').val());
          
          // var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          total= (sl*gia );
          $('#ThanhTien').val(total);
          }
          else if($('#dateCO').val()=="")
          {
          total= (sl*gia + slte*giate);
          $('#ThanhTien').val(total);
          }
          else{
             var ci = new Date($('#dateCI').val());
            var co = new Date($('#dateCO').val());
          
          var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          total= (sl*gia + slte*giate)*date;
          $('#ThanhTien').val(total);
          }
          
        });

        $('#SLTE').on('input', function(){
          var gia=$('#dongia').val();
          var giate=$('#dongiaTE').val();
          var sl= $('#SLNL').val();
          var slte= $('#SLTE').val();
          if ($('#dateCO').val()=="" && $('#SLNL').val()=="") {
          //   var ci = new Date($('#dateCI').val());
          //   var co = new Date($('#dateCO').val());
          
          // var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          total= (slte*giate );
          $('#ThanhTien').val(total);
          }
          else if($('#dateCO').val()=="")
          {
          total= (sl*gia + slte*giate);
          $('#ThanhTien').val(total);
          }
          else{
             var ci = new Date($('#dateCI').val());
            var co = new Date($('#dateCO').val());
          
          var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          total= (sl*gia + slte*giate)*date;
          $('#ThanhTien').val(total);
          }
          
        });
        $('#dateCO').change( function(){
          var gia=$('#dongia').val();
          var giate=$('#dongiaTE').val();
          var sl= $('#SLNL').val();
          var slte= $('#SLTE').val();
          // if ($('#dateCO').val()=="" && $('#SLTE').val()=="") {
          // //   var ci = new Date($('#dateCI').val());
          // //   var co = new Date($('#dateCO').val());
          
          // // var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          // total= (sl*gia );
          // $('#ThanhTien').val(total);
          // }
          // else 
          // if($('#dateCO').val()=="")
          // {
          // total= (sl*gia + slte*giate);
          // $('#ThanhTien').val(total);
          // }
          // else{
             var ci = new Date($('#dateCI').val());
            var co = new Date($('#dateCO').val());
          
          var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
          total= (sl*gia + slte*giate)*date;
          $('#ThanhTien').val(total);
          // }
          
        });
        
        
     
        $('#idTinh').on('click',function(){
        //   $.get('admin/ajax/doitac1/' + dv, function(data){
        //   $('#doitac').html(data);
        // }
          $('#idDV').on('click',function(){
              var dv=$('#idDV').val();
      var tinh = $('#idTinh').val();

        $.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
          $('#doitac').html(data);
        });
      });
        
      });
        $('#doitac').on('click',function(){
        var dt=$('#doitac').val();
        $.get('admin/ajax/tendichvu/'+ dt, function(data){
          $('#tendichvu').html(data);
      });
    });
        $('#tendichvu').click(function(){

        var iddv=$('#tendichvu').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia').val(data);
      });
        $.get('admin/ajax/giadichvuTE/'+ iddv, function(data){
          $('#dongiaTE').val(data);
      });
    });
        $('#dateCI').change( function(){
      var ngaykh = $('#dateCI').val();
      var datekh= new Date(ngaykh);
      var today = new Date();
      var now=Number(today);
      var numngaykh= Number(datekh);
       
        if((numngaykh- now)<0){
          alert('Ngày Check In phải lớn hơn ngày hiện');
          $('#dateCI').val("");

        }
        else{
          $('#dateCO').change( function(){
            var ngaykt = $('#dateCO').val();
            // var datekt= new Date(ngaykt);
            // var numngaykt= Number(datekt);
              if(ngaykt < ngaykh ){
                alert('Ngày Ngày  Check Out phải lớn hơn ngày Check In' );
                $('#dateCO').val("");
              }
          });
        }
      
      
    });
        $('#dateCO').change( function(){
            var ngaykt = $('#dateCO').val();
            var ngaykh = $('#dateCI').val();
              if(ngaykh =="" ){
                alert('Vui Lòng Chọn Ngày Check In' );
                $('#dateCO').val("");
              }
              else{
                $('#dateCI').change( function(){
                  var ngaykh = $('#dateCI').val();
                  if (ngaykh > ngaykt) {
                    alert('Ngày Check In phải nhỏ hơn ngày Check Out' );
                    $('#dateCI').val("");
                  }

                });
              }
          });


    $('#addDVform').attr('action','admin/qlTour/themDVTour/'+ $(this).data("id"));
    $('#addDVModal').modal('show');
  });

      $('.editDVbtn').on('click',function(event){
        
        
        $('#idDV1').on('click',function(){
        //   $.get('admin/ajax/doitac1/' + dv, function(data){
        //   $('#doitac').html(data);
        // }
          $('#idTinh1').on('click',function(){
              var dv=$('#idDV1').val();
              var tinh = $('#idTinh1').val();
              document.getElementById('doitac1').disabled = false

        $.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
          $('#doitac1').html(data);
        
          
        });
      });
        
      });
        
     
        $('#idTinh1').on('click',function(){
        //   $.get('admin/ajax/doitac1/' + dv, function(data){
        //   $('#doitac').html(data);
        // }
          $('#idDV1').on('click',function(){
              var dv=$('#idDV1').val();
      var tinh = $('#idTinh1').val();
          document.getElementById('doitac1').disabled = false
        $.get('admin/ajax/doitac/'+ tinh  + dv, function(data){
          $('#doitac1').html(data);
        
          
        });
      });
        
      });
        $('#doitac1').on('click',function(){
        var dt=$('#doitac1').val();
        document.getElementById('tendichvu1').disabled = false
        $.get('admin/ajax/tendichvu/'+ dt, function(data){
          $('#tendichvu1').html(data);
      });
    });
        $('#tendichvu1').change(function(){
          document.getElementById('dongia1').disabled = false
        var iddv=$('#tendichvu1').val();
        
        $.get('admin/ajax/giadichvu/'+ iddv, function(data){
          $('#dongia1').val(data);
      });
        $.get('admin/ajax/giadichvuTE/'+ iddv, function(data){
          $('#dongiaTE1').val(data);
      });
    });
        $('#dateCI1').change( function(){
      var ngaykh = $('#dateCI1').val();
      var datekh= new Date(ngaykh);
      var today = new Date();
      var now=Number(today);
      var numngaykh= Number(datekh);
       
        if((numngaykh- now)<0){
          alert('Ngày check in phải lớn hơn ngày hiện tại');
          $('#dateCI1').val("");

        }
        else{
          $('#dateCO1').change( function(){
            var ngaykt = $('#dateCO1').val();
            // var datekt= new Date(ngaykt);
            // var numngaykt= Number(datekt);
              if(ngaykt < ngaykh ){
                alert('Ngày check out phải lớn hơn ngày check in' );
                $('#dateCO1').val("");
              }
          });
        }
      
      
    });
        $('#dateCO1').change( function(){
            var ngaykt = $('#dateCO1').val();
            var ngaykh = $('#dateCI1').val();
              if(ngaykh =="" ){
                alert('Vui Lòng Chọn Ngày check in' );
                $('#dateCO1').val("");
              }
              else{
                $('#dateCI1').change( function(){
                  var ngaykh = $('#dateCI1').val();
                  if (ngaykh > ngaykt) {
                    alert('Ngày check in phải nhỏ hơn ngày check out' );
                    $('#dateCI1').val("");
                  }

                });
              }
          });
        

        var idqg= $(this).data("idqg");        
        $('#MaQG1').val(idqg);
        var idtinh= $(this).data("idtinh");
        $('#idTinh1').val(idtinh);
        var iddt= $(this).data("iddt");
        $('#doitac1').val(iddt);
        var iddv= $(this).data("iddv");
        $('#tendichvu1').val(iddv);
        var idldt= $(this).data("idldt");
        $('#idDV1').val(idldt);
        var gia= $(this).data("gia");
        $('#dongia1').val(gia);
        var ci= $(this).data("ngayci");
        $('#dateCI1').val(ci);
        var co= $(this).data("ngayco");
        $('#dateCO1').val(co);
        var idct= $(this).data("idct");        
        $('#MaCTTour').val(idct);
        

    $('#editDVform').attr('action','admin/qlTour/suaDVTour/'+ $(this).data("id"));
    $('#editDVModal').modal('show');
  // });
     });
      

      $('.delDVbtn').on('click',function(){

    $('#delDVform').attr('action','admin/qlTour/xoaDVTour/'+ $(this).data("id"));
    $('#delDVModal').modal('show');
  });
      $('.addCBbtn').on('click',function(){
       
        $('.timCB').click(function(){
          var kh=$('#khoihanh').val();
  
        $.get('admin/ajax/timcb/'+kh, function(data){
          $('#bangCB').html(data);
        });
        });
       
        
     
    $('#addCBform').attr('action','admin/qlTour/ThemCB/'+ $(this).data("id"));
    $('#addCBModal').modal('show');
  });
      $('.TTbtn1').click(function(){
            
            $('#doitac2').val($(this).data("tendt"));
            $('#dichvu1').val($(this).data("dv"));
            $('#ChuaTT').val($(this).data("chuatt"));
            $('#madvtour').val($(this).data("madvt"));
            $('#MaCTTour1').val($(this).data("macttour"));
             $('#DaTT1').val($(this).data("datt"));
            ;
            $('#SoTienTT').on('input', function(){
                  
                  
                  
                    var datt= parseInt($('#DaTT1').val());
                  var sotien= parseInt($('#SoTienTT').val());
                  var chuatt= parseInt($('#ChuaTT').val());
                  var tong= datt + sotien;
                  if( sotien > chuatt){
                    alert('Số tiền cần Thanh Toán vượt quá Số  Tiền Chưa Thanh Toán ');
                    $('#SoTienTT').val("");
                  }
                  
                  $('#SoTien').val(tong);
                  
                  
            });
            

          $('#TT1form').attr('action','admin/qlTour/ThanhToanDV');
        $('#TT1Modal').modal('show');
      });
     });




  </script>
@endsection