@extends('employee.layout.index')

@section('contentNV')

<div class="card">
                <div class="card-body">
                  <h4 class="card-title">DANH SÁCH HỢP ĐỒNG ĐẶT TOUR</h4>
                  <div class="table-responsive">
                    @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
                    @endif
                    <table class="table table-bordered" id="dshd">
                      <thead  bgcolor="#308ee0" style="color: #fff">
                        <tr>
                          <th >
                            Mã HĐ
                          </th>
                          <th >
                            Tên Khách Hàng <br>
                            MaTour
                          </th>
                          <th>
                            Thông Tin                          
                          </th>
                          <th>
                            Thành Tiền                         
                          </th>
                          <th>
                            Trạng Thái                         
                          </th>
                          
                          
                          
                         
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($hopdong as $hd)
                          <tr>
                            <td class="font-weight-medium" >
                              {{ $hd -> MaHD}} 
                            </td>
                            
                            <td>
                              
                                 {{ $hd -> khachhang -> TenKH }}/({{ $hd -> khachhang -> Email }})                              
                              <br>
                             
                                 {{ $hd -> chitiettour-> tour -> TenTour }}/({{ $hd -> chitiettour-> tour -> MaTour }} - {{ $hd -> MaCTTour }})
                             
                            </td>
                            <td style="line-height: 20px;">
                             <li>Ngày Đặt {{ $hd -> NgayDat}}</li>
                            
                             <li>Ngày Xác Nhận 

                               @if($hd -> NgayXacNhan == null)
                                <a  class=" btn-rounded btn-warning"> Chưa Xác Nhận</a>
                                @else
                                  {{ $hd -> NgayXacNhan}}
                              @endif             

                            </li>
                             <li> Số Chỗ {{ $hd -> SoCho }}</li>
                              @foreach(App\user::where('MaNV', $hd -> MaNV)->get() as $nv)
                                <li> NV Liên Hệ: {{ $nv -> TenNV }}</li>
                             @endforeach
                             <li>{{ $hd -> loaitt -> TenLoaiTT }}</li>
                            </td>
                            <td>
                              {{ number_format($hd -> ThanhTien) }}
                            </td>
                            <td style="line-height: 20px;">
                            @if($hd -> TrangThai == 0)
                                <a  class=" btn-rounded btn-danger" style="color: #fff"> Chưa Thanh Toán</a>
                            @elseif($hd -> TrangThai == 1)
                             <a  class=" btn-rounded btn-primary" style="color: #fff"> Đã Thanh Toán 50%</a>
                             @else
                             <a  class=" btn-rounded btn-success" style="color: #fff"> Đã Thanh Toán 100%</a>
                              @endif  
                              <br>
                              Đã Thanh Toán: {{ number_format( $hd -> DaThanhToan )}} <br>
                              Còn Lại: {{number_format( $hd -> ThanhTien -  $hd -> DaThanhToan)}}
                            </td>
                            
                            
                            
                            
                            <td>
                              <?php $a = App\hopdongdichvu::where('MaHD',$hd -> MaHD)->count() ?>
                            @if($a==0)
                            <a class="btn btn-warning btn-fw" style="color:#fff; width: 170px;" href="employee/qlHD/XuLyHD/{{$hd -> MaHD}}">Add Dịch Vụ</a>  <br>
                            @else
                              <a class="btn btn-warning btn-fw" style="color:#fff;width: 170px;" href="employee/qlHD/UpdateDVHD/{{$hd -> MaHD}}" >Update Dịch Vụ</a>  <br>
                            @endif
                            @if($hd -> TrangThai == 2)
                            <a class="btn btn-info btn-fw" href="employee/qlHD/InHD/{{$hd -> MaHD}}" style="width: 170px;">In Hóa Đơn</a><br>
                            @else
                              <a class="YCThanhToan btn btn-info btn-fw"  style="width: 170px;" data-mahd="{{$hd -> MaHD}}" data-tenkh="{{$hd -> khachhang-> TenKH}}" data-email="{{$hd -> khachhang-> Email}}" data-matour="{{$hd -> chitiettour-> tour-> MaTour}}-{{$hd -> MaCTTour}}" data-tentour="{{$hd -> chitiettour-> tour-> TenTour}}" data-ngaykh="{{$hd -> chitiettour-> NgayKhoiHanh}}" data-ngaykt="{{$hd -> chitiettour-> NgayKetThuc}}" data-tong="{{number_format($hd -> ThanhTien)}}" data-datt="{{number_format($hd ->  DaTT)}}" data-phaitt="{{number_format($hd -> ThanhTien - $hd ->  DaTT)}}" data-makh="{{$hd ->khachhang -> MaKH}}" >Yêu Cầu Thanh Toán</a><br>
                            @endif
                            
                              <a class="btn btn-dark btn-fw" href="employee/qlHD/suaHD/{{$hd -> MaHD}}" style="width: 170px;">Sửa Booking</a>
                          <br>
                            <a class="btn btn-danger btn-fw" href="employee/qlHD/xoaHD/{{$hd -> MaHD}}" style="width: 170px;">Hủy Booking</a>
                            </td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

 <div class="modal fade" id="YCTTModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gửi Yêu Cầu Thanh Toán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample" action="employee/qlBieuMau/YCThanhToanHD" method="POST" id="YCTTform" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleTextarea1">Tên Khách Hàng</label>
                      <input type="text" class="form-control" id="TenKH"  name='TenKH'>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Email</label>
                      <input type="text" class="form-control" id="email"  name='email'>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tiêu Đề Mail</label>
                      <input type="text" class="form-control" id="TieuDe"  name='TieuDe' >
                    </div>
                    <input type="text" class="form-control" id="MaKH" required name='MaKH' style="display: none;">
                    <input type="text" class="form-control" id="MaHD" required name='MaHD' style="display: none;">
                    <input type="text" class="form-control" id="MaTour" required  name='MaTour'style="display: none;">
                    <input type="text" class="form-control" id="TenTour" required name='TenTour' style="display: none;">
                    <input type="text" class="form-control" id="NgayKH" required name='NgayKH' style="display: none;">
                    <input type="text" class="form-control" id="NgayKT" required name='NgayKT' style="display: none;">
                    <input type="text" class="form-control" id="Tongtien" required name='Tongtien' style="display: none;">
                    <input type="text" class="form-control" id="PhaiTT" required name='PhaiTT' style="display: none;">
                    <input type="text" class="form-control" id="DaTT" required name='DaTT' style="display: none;">
                    

                             
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">Gửi Mail</button>
        
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
    $('#dshd').DataTable();
    $('#dshd').click(function(){
      $('.YCThanhToan').click(function(){
        $('#MaKH').val($(this).data("makh"));
        $('#TenKH').val($(this).data("tenkh"));
        $('#email').val($(this).data("email"));
        $('#MaHD').val($(this).data("mahd"));
        $('#MaTour').val($(this).data("matour"));
        $('#TenTour').val($(this).data("tentour"));
        $('#NgayKH').val($(this).data("ngaykh"));
        $('#NgayKT').val($(this).data("ngaykt"));
        $('#Tongtien').val($(this).data("tong"));
        $('#DaTT').val($(this).data("datt"));
        $('#PhaiTT').val($(this).data("phaitt"));


        $('#YCTTform').attr('action','employee/qlBieuMau/YCThanhToanHD');
        $('#YCTTModal').modal('show');
      });
    });
    
});

  </script>
@endsection