@extends('employee.layout.index')

@section('contentNV')

<div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center; font-size: 30px" >Đăng Kí Dịch Vụ Tour</h4>
                  <div class="infoHD">
                  	<div class="leftHD">
                  		<p>Mã Hợp Đồng : {{ $hopdong -> MaHD}}</p>
                  		<p>Tên Khách Hàng: {{ $hopdong -> khachhang-> TenKH }}</p>
                  		<p>Email:  {{  $hopdong -> khachhang -> Email}}</p>
                  		<p>Số Điện Thoại: {{  $hopdong -> khachhang -> Tel}}</p>
                  		<p>Địa Chỉ:  {{  $hopdong -> khachhang -> DiaChi}}</p>
                  		<p style="float: left; ">Người Lớn : {{$hopdong -> SLNL}}</p>
                  		<p style="float: left; margin-left: 20px;">Trẻ Em : {{$hopdong -> SLTE}}</p>
                  		<p style="float: left; margin-left: 20px;">Em Bé : {{$hopdong -> SLEB}}</p>

                  	</div>
                  	<div class="rightHD">
                  		<p>Mã Tour: {{  $hopdong -> chitiettour -> tour-> MaTour}} - {{  $hopdong -> chitiettour -> MaCTTour}}</p>
                  		<p>Tên Tour: {{  $hopdong -> chitiettour -> tour -> TenTour }}</p>
                  		<p>Ngày Khởi Hành: {{  $hopdong -> chitiettour -> NgayKhoiHanh }}</p>
                  		<p>Ngày Kết Thúc: {{  $hopdong -> chitiettour -> NgayKetThuc }}</p>
                  		<p>Điểm Khởi Hành: {{  $hopdong -> chitiettour -> tour -> DiemKhoiHanh }}</p>
                  		<p>Hành Trình: @foreach(App\diadiemtour::where('MaTour',$hopdong -> chitiettour -> tour-> MaTour) -> get() as $diadiem)
                  			{{ $diadiem -> diadiemdulich -> TenDD}} -
                  			@endforeach
                  		</p>
                  	</div>

                  </div>
                  <form class="forms-sample" action="employee/qlHD/UpdateDVHD/{{$hopdong -> MaHD}}" method="POST" enctype='multipart/form-data'>
                  	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                  	<fieldset class="DichVu" >
                  		<legend >Air - Ticket</legend>
                  		<table class="table table-bordered">
                  			<thead bgcolor="#308ee0" style="color: #fff">
                  				<tr>
                  					<td>Hãng Bay</td>
                  					<td>Số Hiệu</td>
                  					<td>Form - To</td>
                  					<td>Time</td>
                  					<td>Giá</td>
                  					<td>Số Lượng</td>
                  					<td>Thành Tiền</td>
                  				</tr>
                  			</thead>
                  			<tbody id="noidungCB">
                  				@foreach(App\dichvutour::where('MaCTTour', $hopdong -> MaCTTour)->where('MaLoaiDT',3)->get() as $CB)
                  				<tr>
                  					<td>{{ $CB -> doitac -> TenDoiTac }} <input type="text" name="MaDVCB[]" value="{{ $CB -> MaDVTour}}"  style="display: none;" ></td>
                  					@foreach(App\banggiadichvu::where('MaGiaDV',$CB-> LoaiDV)->get() as $giaCB)
                  					<td>{{ $giaCB -> TenDV }} </td>
                  					<td>
                  						<li>From : {{ $giaCB -> KhoiHanh }}</li>
                  						<li>To : {{ $giaCB -> DiemDen }}</li>
                  					</td>
                  					<td>
                  						<li>Day: {{ $giaCB -> NgayBay }}</li>
                  						<li>Time : {{ $giaCB -> GioBay}}</li>
                  					</td>
                  					<td>
                  						<input type="text" name="GiaCB[]" value="{{ $giaCB -> Gia}}" readonly style="background: #ccc" class="GiaCB">
                  					</td>
                  					@foreach(App\hopdongdichvu::where('MaHD',$hopdong-> MaHD)-> where('MaDVTour',$CB -> MaDVTour)->get() as $HDCB)
                  					<td><input type="text" name="SLKCB[]" style="background: #ccc" min=0 class="SLKCB" onKeyPress="return isNumberKey(event)" value="{{ $HDCB -> SLNL}}"></td>
                  					<td><input type="text" name="TotalCB[]" style="background: #ccc" readonly class="TotalCB" value="{{ $HDCB -> ThanhTien}}"></td>
                  					@endforeach
                  				</tr>
                  				@endforeach
                  				@endforeach
                  			</tbody>
                  		</table>
                  	</fieldset>
                  	<fieldset class="DichVu" >
                  		<legend >Hotel</legend>
                  		<table class="table table-bordered">
                  			<thead bgcolor="#308ee0" style="color: #fff">
                  				<tr>
                  					<td>Loại Dịch Vụ</td>
                  					<td>Khách sạn</td>
                  					<td>Ngày Check In <br>
                  						Ngày Check Out
                  					</td>
                  					<td>Giá</td>
                  					<td>Số Lượng</td>
                  					<td>Thành Tiền</td>
                  				</tr>
                  			</thead>
                  			<tbody id="noidungHT">
                  				@foreach(App\dichvutour::where('MaCTTour', $hopdong -> MaCTTour)->where('MaLoaiDT',1)->get() as $HT)
                  				@foreach(App\banggiadichvu::where('MaGiaDV',$HT-> LoaiDV)->get() as $giaHT)
                  				<tr>
                  					<td>{{ $giaHT -> TenDV }}  <input type="text" name="MaDVHT[]" value="{{ $HT -> MaDVTour}}"  style="display: none;" ></td>
                  					<td>{{ $HT -> doitac -> TenDoiTac }}</td>
                  					
                  					
                  					<td >
                  						<li>CI :  <input type="date" name="NgayCIHT" value="{{ $HT -> NgayCI}}" readonly style="background: #ccc" class="NgayCIHT"></li>
                  						<br>
                  						<li>CO: <input type="date" name="NgayCOHT" value="{{ $HT -> NgayCO}}" readonly style="background: #ccc" class="NgayCOHT"></li>
                  					</td>
                  					
                  					<td>
                  						<input type="text" name="GiaHT[]" value="{{ $giaHT -> Gia}}" readonly style="background: #ccc" class="GiaHT">
                  					</td>
                  					@foreach(App\hopdongdichvu::where('MaHD',$hopdong-> MaHD)-> where('MaDVTour',$HT -> MaDVTour)->get() as $HDHT)
                  					<td><input type="text" name="SLKHT[]" style="background: #ccc" min=0 class="SLKHT" onKeyPress="return isNumberKey(event)" value="{{ $HDHT -> SLNL}}"></td>

                  					<td><input type="text" name="TotalHT[]" style="background: #ccc" readonly class="TotalHT" value="{{ $HDHT -> ThanhTien}}"></td>
                  					@endforeach
                  				</tr>
                  				@endforeach
                  				@endforeach
                  			</tbody>
                  		</table>
                  		
                  	</fieldset>
                  	<fieldset class="DichVu" >
                  		<legend >Restaurant</legend>
                  		<table class="table table-bordered">
                  			<thead bgcolor="#308ee0" style="color: #fff">
                  				<tr>
                  					<td>Loại Dịch Vụ</td>
                  					<td>Nhà Hàng</td>
                  					<td>Ngày Sử Dụng 
                  					</td>
                  					<td>Giá</td>
                  					
                  					<td>Số Lượng</td>
                  					<td>Thành Tiền</td>
                  				</tr>
                  			</thead>
                  			<tbody id="noidungRT">
                  				@foreach(App\dichvutour::where('MaCTTour', $hopdong -> MaCTTour)->where('MaLoaiDT',2)->get() as $RT)
                  				@foreach(App\banggiadichvu::where('MaGiaDV',$RT-> LoaiDV)->get() as $giaRT)
                  				<tr>
                  					<td>{{ $giaRT -> TenDV }} <input type="text" name="MaDVRT[]" value="{{ $RT -> MaDVTour}}"  style="display: none;" ></td>
                  					<td>{{ $RT -> doitac -> TenDoiTac }}</td>
                  					
                  					
                  					<td >
                  						 <input type="date" name="NgayCIRT" value="{{ $RT -> NgayCI}}" readonly style="background: #ccc" class="NgayCIRT">
                  						
                  						                 						
                  					</td>
                  					
                  					<td>
                  						Người Lớn <input type="text" name="GiaRT[]" value="{{ $giaRT -> Gia}}" readonly style="background: #ccc" class="GiaRT"><br>
                  						Trẻ Em <input type="text" name="GiaTERT[]" value="{{ $giaRT -> GiaTE}}" readonly style="background: #ccc" class="GiaTERT">
                  					</td>
                  					@foreach(App\hopdongdichvu::where('MaHD',$hopdong-> MaHD)-> where('MaDVTour',$RT -> MaDVTour)->get() as $HDRT)
                  					<td>
                  						Người Lớn <input type="text" name="SLNLRT[]" style="background: #ccc" min=0 class="SLNLRT" onKeyPress="return isNumberKey(event)" value="{{$HDRT -> SLNL}}"><br>
                  					Trẻ Em <input type="text" name="SLTERT[]" style="background: #ccc" min=0 class="SLTERT" onKeyPress="return isNumberKey(event)" value="{{$HDRT -> SLTE}}"></td>
                  					<td><input type="text" name="TotalRT[]" style="background: #ccc" readonly class="TotalRT" value="{{$HDRT -> ThanhTien}}"></td>
                  					@endforeach
                  				</tr>
                  				@endforeach
                  				@endforeach
                  			</tbody>
                  		</table>
                  	</fieldset>
                  	
                  	<fieldset class="DichVu" >
                  		<legend >Sightseeing tickets</legend>
                  		<table class=" table-bordered">
                  			<thead bgcolor="#308ee0" style="color: #fff">
                  				<tr>
                  					<td>Loại Dịch Vụ</td>
                  					<td>Đơn Vị Cung Cấp</td>
                  					<td>Ngày Sử Dụng</td>
                  					<td>Giá</td>                  					
                  					<td>Số Lượng</td>
                  					<td>Thành Tiền</td>
                  				</tr>
                  			</thead>
                  			<tbody id="noidungST">
                  				@foreach(App\dichvutour::where('MaCTTour', $hopdong -> MaCTTour)->where('MaLoaiDT',5)->get() as $ST)
                  				@foreach(App\banggiadichvu::where('MaGiaDV',$ST-> LoaiDV)->get() as $giaST)
                  				<tr>
                  					<td>{{ $giaST -> TenDV }} <input type="text" name="MaDVST[]" value="{{ $ST -> MaDVTour}}"  style="display: none;" ></td>
                  					<td width="100px;">{{ $ST -> doitac -> TenDoiTac }}</td>
                  					
                  					
                  					<td >
                  						 <input type="date" name="NgayCIST" value="{{ $ST -> NgayCI}}" readonly style="background: #ccc" class="NgayCIST">
                  						
                  						                 						
                  					</td>
                  					
                  					<td>
                  						Người Lớn <input type="text" name="GiaST[]" value="{{ $giaST -> Gia}}" readonly style="background: #ccc" class="GiaST"><br>
                  						Trẻ Em <input type="text" name="GiaTEST[]" value="{{ $giaST -> GiaTE}}" readonly style="background: #ccc" class="GiaTEST">
                  					</td>
                  					@foreach(App\hopdongdichvu::where('MaHD',$hopdong-> MaHD)-> where('MaDVTour',$ST -> MaDVTour)->get() as $HDST)
                  					<td>
                  						Người Lớn <input type="text" name="SLNLST[]" style="background: #ccc" min=0 class="SLNLST" onKeyPress="return isNumberKey(event)" value="{{ $HDST -> SLNL}}"><br>
                  					Trẻ Em <input type="text" name="SLTEST[]" style="background: #ccc" min=0 class="SLTEST" onKeyPress="return isNumberKey(event)" value="{{ $HDST -> SLTE}}"></td>
                  					<td><input type="text" name="TotalST[]" style="background: #ccc" readonly class="TotalST" value="{{ $HDST -> ThanhTien}}"></td>
                  					@endforeach
                  				</tr>
                  				@endforeach
                  				@endforeach
                  			</tbody>
                  		</table>
                  	</fieldset>
                  	<input type="submit" name="submit"class="btn btn-success mr-2" style="margin-left: 500px; width: 100px" value="Lưu">
                  </form>
                </div>
              </div>

 

@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		

		$('#noidungCB').delegate('.GiaCB, .SLKCB','keyup',function(){
			var tr= $(this).parent().parent();
			var sl =tr.find('.SLKCB').val();
			var gia =tr.find('.GiaCB').val();
			var total= sl*gia;
			tr.find('.TotalCB').val(total);
		});
		$('#noidungHT').delegate('.GiaHT, .SLKHT, .NgayCIHT, .NgayCOHT','keyup',function(){
			var tr= $(this).parent().parent();
			var sl =tr.find('.SLKHT').val();
			var gia =tr.find('.GiaHT').val();
			var ci = new Date(tr.find('.NgayCIHT').val());
	        var co = new Date(tr.find('.NgayCOHT').val());
	        
	        var date= (co.getTime()- ci.getTime())/ (1000*60*60*24) ;
	        
			var total= sl*gia *date;
			tr.find('.TotalHT').val(total);
		});
		$('#noidungRT').delegate('.GiaRT, .SLNLRT,.SLTERT,.GiaTERT', 'keyup',function(){
			var tr= $(this).parent().parent();
			var slnl =tr.find('.SLNLRT').val();
			var gianl =tr.find('.GiaRT').val();
			var slte =tr.find('.SLTERT').val();
			var giate =tr.find('.GiaTERT').val();
		       
			var total= (slnl*gianl)+(slte*giate);
			tr.find('.TotalRT').val(total);
		});
		$('#noidungST').delegate('.GiaST, .SLNLST,.SLTEST,.GiaTEST', 'keyup',function(){
			var tr= $(this).parent().parent();
			var slnl =tr.find('.SLNLST').val();
			var gianl =tr.find('.GiaST').val();
			var slte =tr.find('.SLTEST').val();
			var giate =tr.find('.GiaTEST').val();
		       
			var total= (slnl*gianl)+(slte*giate);
			tr.find('.TotalST').val(total);
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
