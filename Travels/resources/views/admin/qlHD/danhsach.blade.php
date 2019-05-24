@extends('admin.layout.index')

@section('content')

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
                            
                            <td style="line-height: 20px">
                              
                                 {{ $hd -> khachhang -> TenKH }}/({{ $hd -> khachhang -> Email }}) 

                              <br>
                             
                                 {{ $hd -> chitiettour-> tour -> TenTour }}/({{ $hd -> chitiettour-> tour -> MaTour }} - {{ $hd -> MaCTTour }})
                                 <br>
                                 Điều Hành Tour: {{$hd -> chitiettour -> tour -> user -> TenNV}}
                             
                            </td>
                            <td style="line-height: 20px;">
                             <li>Ngày Đặt {{ $hd -> NgayDat}}</li>
                            
                             <li>Ngày Xác Nhận 

                               @if($hd -> NgayXacNhan == null)
                                <a  class="XacNhanbtn btn-rounded btn-warning" data-mahd="{{$hd -> MaHD}}" data-sl="{{$hd -> SoCho}}" data-macttour="{{ $hd -> MaCTTour }}" data-tentour="{{ $hd -> chitiettour -> tour -> TenTour }} ({{ $hd -> chitiettour -> tour -> MaTour }}-{{ $hd -> MaCTTour }})" data-tenkh="{{$hd -> khachhang-> TenKH}}"> Chưa xác nhận</a>
                                @else
                                  {{ $hd -> NgayXacNhan}}
                              @endif             

                            </li>
                             <li> Số Chỗ {{ $hd -> SoCho }}</li>
                             
                              <li> SLNL: {{ $hd -> SLNL }}</li>
                              <li> SLTE: {{ $hd -> SLTE }}</li>
                              <li> SLEB: {{ $hd -> SLEB }}</li>
                            
                             <li>{{ $hd -> loaitt -> TenLoaiTT }}</li>
                            </td>
                            <td style="line-height: 20px;">
                              
                              <br>
                              Tổng Tiền: {{ number_format($hd -> ThanhTien) }} <br>
                              Đã Thanh Toán: {{ number_format( $hd -> DaThanhToan )}} <br>
                              Còn Lại: <a style="color:red">{{number_format( $hd -> ThanhTien -  $hd -> DaThanhToan)}}</a>
                            </td>
                            <td style="line-height: 20px;">
                                <?php $conlai = ($hd -> ThanhTien)- ($hd -> DaThanhToan ); ?>
                              @if( $conlai == 0)
                              <a  class=" btn-rounded btn-success" style="color: #fff"> Đã Thanh Toán </a>
                               @else
                                <a  class="TTbtn1 btn-rounded btn-danger" style="color: #fff" data-mahd="{{ $hd -> MaHD }}" data-macttour="{{ $hd -> MaCTTour }}"  data-tentour="{{ $hd -> chitiettour -> tour -> TenTour }} ({{ $hd -> chitiettour -> tour -> MaTour }}-{{ $hd -> MaCTTour }})" data-tenkh="{{ $hd -> khachhang-> TenKH }}" data-con="{{ $hd -> ThanhTien - $hd -> DaThanhToan}}"  data-datt="{{ $hd -> DaThanhToan}}"> Chưa Thanh Toán</a>
                              @endif  
                            </td>
                            
                            
                            <td>
                              <?php $daTT = $hd -> DaThanhToan; 
                                    $tong2 = ($hd -> ThanhTien)/2;
                              ?>
                              @if($daTT >= $tong2)
                              <?php $a = App\hopdongdichvu::where('MaHD',$hd -> MaHD)->count() ?>
                                  @if($a == 0)
                                  <a class="btn btn-warning btn-fw" style="color:#fff; width: 170px;" href="admin/qlHD/XuLyHD/{{$hd -> MaHD}}">Add Dịch Vụ</a>  <br>
                                  
                                  @else
                                    <a class="btn btn-warning btn-fw" style="color:#fff;width: 170px;" href="admin/qlHD/UpdateDVHD/{{$hd -> MaHD}}" >Update Dịch Vụ</a>  <br>
                                    @endif
                            @endif


                            @if($hd -> TrangThai == 1)
                            <a class="btn btn-info btn-fw" href="admin/qlHD/InHD/{{$hd -> MaHD}}" style="width: 170px;">In Hóa Đơn</a><br>
                            @else
                              <a class="YCThanhToan btn btn-info btn-fw"  style="width: 170px;" data-mahd="{{$hd -> MaHD}}" data-tenkh="{{$hd -> khachhang-> TenKH}}" data-email="{{$hd -> khachhang-> Email}}" data-matour="{{$hd -> chitiettour-> tour-> MaTour}}-{{$hd -> MaCTTour}}" data-tentour="{{$hd -> chitiettour-> tour-> TenTour}}" data-ngaykh="{{$hd -> chitiettour-> NgayKhoiHanh}}" data-ngaykt="{{$hd -> chitiettour-> NgayKetThuc}}" data-tong="{{number_format($hd -> ThanhTien)}}" data-datt="{{number_format($hd ->  DaTT)}}" data-phaitt="{{number_format($hd -> ThanhTien - $hd ->  DaTT)}}" data-makh="{{$hd ->khachhang -> MaKH}}" >Yêu Cầu Thanh Toán</a><br>
                            @endif
                            
                          
                            <a class="btn btn-danger btn-fw" href="admin/qlHD/xoaHD/{{$hd -> MaHD}}" style="width: 170px;">Hủy Booking</a>
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
       <form class="forms-sample" action="admin/qlBieuMau/YCThanhToanHD" method="POST" id="YCTTform" enctype="multipart/form-data">
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
                      <label for="exampleTextarea1">Mã Hợp Đồng</label>
                      <input type="text" class="form-control" id="MaHD1"  name='MaHD' readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tên Khách Hàng</label>
                      <input type="text" class="form-control" id="TenKH1"  name='TenKH'  readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tour</label>
                      <input type="text" class="form-control" id="TenTour1"  name='TenTour' readonly >
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
                    <input type="text" class="form-control" id="DaTT1" required name='DaTT' style="display: none">
                    <input type="text" class="form-control" id="SoTien" required name='SoTien' style="display: none" >
                    <input type="text" class="form-control" id="MaCTTour1" required name='MaCTTour' style="display: none">
                    <input type="text" class="form-control" id="MaNV" required name='MaNV' value="{{ Auth::id()}}" style="display: none">
                   
                    
                    

                             
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">Thanh Toán</button>
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="XNModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample"  method="POST" id="XNform" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label for="exampleTextarea1">Mã Hợp Đồng</label>
                      <input type="text" class="form-control" id="MaHD2"  name='MaHD' readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tên Khách Hàng</label>
                      <input type="text" class="form-control" id="TenKH2"  name='TenKH'  readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Tour</label>
                      <input type="text" class="form-control" id="TenTour2"  name='TenTour' readonly >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Số Chỗ Đặt  </label>
                      <input type="text" class="form-control" id="SoCho1"  name='SoCho' readonly>
                    </div>
                    
                    <input type="text" class="form-control" id="MaCTTour2" required name='MaCTTour' style="display: none">
                    
                    
                    

                             
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger mr-2">Xác Nhận</button>
        
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


        $('#YCTTform').attr('action','admin/qlBieuMau/YCThanhToanHD');
        $('#YCTTModal').modal('show');
      });

      $('.TTbtn1').click(function(){
            $('#MaHD1').val($(this).data("mahd"));
            $('#TenKH1').val($(this).data("tenkh"));
            $('#TenTour1').val($(this).data("tentour"));
            $('#ChuaTT').val($(this).data("con"));
            $('#TenTour1').val($(this).data("tentour"));
            $('#MaCTTour1').val($(this).data("macttour"));
             $('#DaTT1').val($(this).data("datt"));
            ;
            $('#SoTienTT').on('input', function(){
                  var datt= parseInt($('#DaTT1').val());
                  var sotien= parseInt($('#SoTienTT').val());
                  var tong= datt + sotien;
                  
                  $('#SoTien').val(tong);
            });

          $('#TT1form').attr('action','admin/qlHD/ThanhToanHD');
        $('#TT1Modal').modal('show');
      });
      $('.XacNhanbtn').click(function(){
            $('#MaHD2').val($(this).data("mahd"));
            $('#TenKH2').val($(this).data("tenkh"));
            $('#TenTour2').val($(this).data("tentour"));
            $('#SoCho1').val($(this).data("sl"));
            // $('#TenTour1').val($(this).data("tentour"));
            $('#MaCTTour2').val($(this).data("macttour"));
            //  $('#DaTT1').val($(this).data("datt"));
            // ;
            // $('#SoTienTT').on('input', function(){
            //       var datt= parseInt($('#DaTT1').val());
            //       var sotien= parseInt($('#SoTienTT').val());
            //       var tong= datt + sotien;
                  
            //       $('#SoTien').val(tong);
            // });

          $('#XNform').attr('action','admin/qlHD/XacNhanHD');
        $('#XNModal').modal('show');
      });

    });

    
});
function isNumberKey(evt)
     {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
     return false;
     return true;
     }
  </script>
@endsection