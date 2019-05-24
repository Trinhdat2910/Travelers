@extends('admin.layout.index')

@section('content')

<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Quản Lý Thu Chi </h4>
                  <h3>Tổng Hợp Theo Tháng</h3>
                  <div style=" width: 100%;">
                  	<div class="form-group" style="float: left; width: 180px;">
                      <label for="exampleTextarea1">Từ Ngày</label><br>
                      <input type="date" name="ngay" id="ngay1">
                    </div>
                    <div class="form-group" style="float: left; width: 180px;">
                      <label for="exampleTextarea1"> Đến Ngày</label><br>
                      <input type="date" name="ngay" id="ngay2">
                    </div>
                  
                  </div>
                  <a class="Timbtn btn btn-primary btn-success" style="width: 150px; float: left; color: #fff; margin-top: 23px; margin-left: 20px;">Tìm</a>
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
                            ID
                          </th>
                          <th >
                            Tên Khách Hàng <br>
                            Tên Đối Tác<br>
                            Dịch Vụ
                          </th>
                          <th>
                            Mã Tour                          
                          </th>
                          <th>
                            Loại                        
                          </th>
                          <th>
                            Số Tiền                        
                          </th>
                          <th>
                            Nội Dung                        
                          </th>
                          <th>
                          	Ngày Thanh Toán
                          </th>
                          
                          
                          
                         
                          <th style="text-align: center;">
                            Nhân Viên
                          </th>
                        </tr>
                      </thead>
                      <tbody id='dlThuChi'>
                      	@foreach(App\thuchi::all() as $tc)
                      	<tr>
                      		<td style="line-height: 20px;">{{ $tc -> id}}</td>
                      		<td style="line-height: 20px;">
                      			@if($tc -> MaHD != null)
                      			{{ $tc -> hopdong-> khachhang-> TenKH}}<br>
                      			{{ $tc -> DichVu}}
                      			@elseif($tc -> MaDVTour != null)
                      			{{ $tc -> dichvutour -> doitac -> TenDoiTac}}<br>
                      			{{ $tc -> DichVu}}
                      			@else
                      			{{ $tc -> DichVu}}
                      			@endif
                      		</td>
                      		<td style="line-height: 20px;">
                      			@foreach(App\chitiettour::where('MaCTTour',$tc -> MaCTTour)->get() as $mact)
                      			Mã Tour: {{ $mact -> MaTour}} - {{ $mact -> MaCTTour}}<br>
                      			Tên Tour: {{ $mact -> tour -> TenTour}}

                      			@endforeach

                      		</td>
                      		<td style="line-height: 20px;">
                      			@if($tc-> LoaiThuChi==1)
                      				Thu
                      			@else
                      				Chi
                      			@endif
                      		</td>
                      		<td style="line-height: 20px;">{{ number_format($tc -> SoTien)}} VND</td>
                      		<td style="line-height: 20px;">
                      			{{ $tc -> NoiDung}}
                      		</td>
                      		<td style="line-height: 20px;">
                      			{{ $tc -> NgayTT}}
                      		</td>
                      		<td style="line-height: 20px;">
                      			@foreach(App\user::where('MaNV',$tc -> MaNV)->get() as $manv)
                      				{{$manv -> TenNV}}
                      			@endforeach
                      		</td>
                      	</tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

 

 

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#tourmau').on('click',function(){
              var Tour=$('#tourmau').val();


        $.get('admin/ajax/TimTour/'+ Tour, function(data){
          $('#ngaykh').html(data);
        
          
        });
      });
		$('.Timbtn').on('click',function(){
             
              var ngay1= $('#ngay1').val();
              var ngay2= $('#ngay2').val();
              if(ngay1 == "" || ngay2 ==""){
              	alert('Bạn  Chưa  Chọn  Ngày Thanh Toán ')
              }
              else if(ngay2 < ngay1){
              	alert('Ngày Kết Thức Phải Lớn Hơn Ngày Bắt Đầu')
              	$('#ngay2').val("");
              }
              else{
              		$.get('admin/ajax/TimTCThang/'+ngay1+'/'+ngay2, function(data){
			          $('#dlThuChi').html(data);
			        
			          
			        });

              }


        
      });
	});

</script>
@endsection
