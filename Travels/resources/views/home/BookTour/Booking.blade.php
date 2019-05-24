@extends('home.layout.index')

@section('contentHome')
    <div class="slide-one-item home-slider owl-carousel" >
     
      <div {{-- class="site-blocks-cover overlay" --}} style="background-image: url(upload/tour/{{ $chitiettour -> tour -> HinhAnh }}); height: 300px; background-size: cover; background-position: center;"{{--  data-aos="fade" --}} {{-- data-stellar-background-ratio="0.5" --}} >
        <div class="container" >
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
             
              <p style="margin-top: 130px; color: #fff; font-size: 50px; font-weight: bold;">{{ $chitiettour -> tour-> TenTour }}</p>

            </div>
          </div>
        </div>
      </div> 
     
    </div>


    {{-- <div class="site-section">
      
      <div class="container overlap-section">
        <div class="row">
          @foreach(App\tour::where('MaKV',1) ->limit(1)->get(); as $t)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="upload/tour/{{ $t -> HinhAnh}}" alt="Image" class="img-fluid" style="height: 400px;">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Du Lịch {{ $t -> khuvuc -> TenKV }}</h3>
              </div>
            </a>
          </div>
          @endforeach
          @foreach(App\tour::where('MaKV',2) ->limit(1)->get(); as $t)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="upload/tour/{{ $t -> HinhAnh}}" alt="Image" class="img-fluid" style="height: 400px;">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Du Lịch {{ $t -> khuvuc -> TenKV }}</h3>
              </div>
            </a>
          </div>
          @endforeach
          @foreach(App\tour::where('MaKV',3) ->limit(1)->get(); as $t)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a href="#" class="unit-1 text-center">
              <img src="upload/tour/{{ $t -> HinhAnh}}" alt="Image" class="img-fluid" style="height: 400px;">
              <div class="unit-1-text">
                <h3 class="unit-1-heading">Du Lịch {{ $t -> khuvuc -> TenKV }}</h3>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    
    </div> --}}


   {{--  <div class="tab-content p-4 px-5" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
              	<form action="#" class="search-destination">
              		<div class="row">
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">From</label>
	              				<div class="form-field">
	              					<div class="icon"><span class="icon-my_location"></span></div>
					                <input type="text" class="form-control" placeholder="From">
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Where</label>
              					<div class="form-field">
	              					<div class="icon"><span class="icon-map-marker"></span></div>
					                <input type="text" class="form-control" placeholder="Where">
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Check In</label>
              					<div class="form-field">
	              					<div class="icon"><span class="icon-map-marker"></span></div>
					                <input type="date" class="form-control checkin_date" placeholder="Check In">
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-items-end">
              				<div class="form-group">
              					<label for="#">Check Out</label>
              					<div class="form-field">
	              					<div class="icon"><span class="icon-map-marker"></span></div>
					                <input type="date" class="form-control checkout_date" placeholder="From">
					              </div>
				              </div>
              			</div>
              			<div class="col-md align-self-end">
              				<div class="form-group">
              					<div class="form-field">
					                <input type="submit" value="Search" class="form-control btn btn-primary">
					              </div>
				              </div>
              			</div>
              		</div>
              	</form>
              </div>

            </div> --}}
    
  




    

 
    <div class="site-section">
      
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">ĐẶT TOUR</h2>
            <p class="color-black-opacity-5"></p>
          </div>
        </div>
        <div class="row" style="padding-bottom: 20px;">
          			<!-- multistep form -->
<form id="msform" style=" margin: 0 auto" action="home/BookTour/DatTour/{{ $chitiettour -> MaCTTour}}" method="POST" enctype="multipart/form-data">
  <!-- progressbar -->
  <input type="hidden" name="_token" value="{{csrf_token()}}" />
  <ul id="progressbar">
    <li class="active">Chọn Dịch Vụ </li>
    <li>Nhập Thông Tin</li>
    <li>Xác Nhận</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <div id="chooseDV">
        <h2 class="fs-title">Chọn Dịch Vụ</h2>
        {{-- <h3 class="fs-subtitle">This is step 1</h3> --}}
        <div id="leftbooking">
            <div id="formSL" style="line-height: 10px;">
                <h4>Số lượng hành khách</h4>
                <label>Người Lớn</label><br>
                <input type="number" name="SLNL" placeholder="Người Lớn" min="1" id="SLNL" required /><br>
                <label>Trẻ Em</label><br>
                <input type="number" name="SLTE" placeholder="Từ 2 đến 12 tuổi" min="0" id="SLTE"  /><br>
                <label>Trẻ Nhỏ</label><br>
                <input type="number" name="SLEB" placeholder="Dưới 2 tuổi"  min="0" id="SLEB"  />
            </div>
            <div id="choosepay">
              <h4>Phương Thức Thanh Toán</h4>
              <div id="thanhtoan">
                <input  id="pay100" type="radio" checked="" name="paymentType" value="1" style="display: none;">
                <input  id="pay50" type="radio"  name="paymentType" value="2" style="display: none;">
                <label for="pay100" id="tt100"><p style="float: left; margin-left: 28px;">Thanh Toán 100%</p> <i class="tt1 fa fa-check"  style="float: left; margin-top: 15px"></i></label>
                <label for="pay50" id="tt50"><p style="float: left; margin-left: 28px;">Thanh Toán 50%</p> <i class="tt2 fa fa-check"  style="float: left; margin-top: 15px"></i></label>
                <div><p style="color: #ee0979"> Sau khi đặt cọc, quý khách vui lòng hoàn tất thanh toán trong <span style="font-weight: bold;">48h</span></p></div>

              </div>
              <input  id="thanhtoan1" type="radio" class="LoaiTT" name="LoaiTT" value="1" style="display: none;">
                <input  id="thanhtoan2" type="radio" class="LoaiTT" name="LoaiTT" value="2" style="display: none;">
                <input  id="thanhtoan3" type="radio" class="LoaiTT" name="LoaiTT" value="3" style="display: none;">
              <div class="choose" id="accordionExample">
                <p>Chọn một trong các phương thức sau:</p>
                
                <label for="thanhtoan1" class="payType" data-toggle="collapse" href="#payment1" aria-expanded="false" data-target="#payment1" aria-controls="payment1" id="Pay1"><p class="paytitle">THANH TOÁN BẰNG THẺ TÍN DỤNG</p> <i class="iconpay pay1 fa fa-check"  ></i>
                  <p style="width: 95%; float: left;">Sau khi đặt vé và thanh toán thành công, Hệ thống Travelers sẽ gửi vé điện tử của Quý khách qua email.</p>
                </label>
                <div class="collapse" id="payment1" data-parent="#accordionExample">
                    <p>Travelers chấp nhận thanh toán bằng các thẻ ATM nội địa do các ngân hàng tại Việt Nam phát hành.</p>
                    <p style="color: red">Quý khách vui lòng liên hệ nhân viên tư vấn, để xác nhận số chỗ trước khi thanh toán qua ngân hàng</p>
                    <p>Khi chuyển khoản, quý khách vui lòng nhập nội dung chuyển khoản là:</p>
                    <p>"MDH madonhang, Họ tên, Noi dung thanh toan"</p>
                    <p>VD:  "MDH 0000001, Ten khach , Mua tour tren web"</p>
                    <p>Ðể việc thanh toán được chính xác. Xin cảm ơn quý khách!</p>

                </div>
                <label for="thanhtoan2" class="payType" data-toggle="collapse" href="#payment2" aria-expanded="false" data-target="#payment2" aria-controls="payment2" id="Pay2" ><p class="paytitle">THANH TOÁN TẠI VĂN PHÒNG TRAVELERS</p> <i class="iconpay pay2 fa fa-check"  ></i>
                  <p style="width: 95%; float: left;">Quý khách vui lòng đến các văn phòng Travelers để thanh toán và nhận vé.</p>
                </label>
                <div class="collapse" id="payment2" data-parent="#accordionExample">
                    <p>VĂN PHÒNG Travelers</p>
                    
                </div>
                <label for="thanhtoan3" class="payType" data-toggle="collapse" href="#payment3" aria-expanded="false" data-target="#payment3" aria-controls="payment3" id="Pay3" ><p class="paytitle">THANH TOÁN BẰNG ZALO PAY</p> <i class="iconpay pay3 fa fa-check"  ></i>
                  <p style="width: 95%; float: left;">Sau khi đặt vé và thanh toán thành công, Hệ thống Travelers sẽ gửi vé điện tử của Quý khách qua email.</p>
                </label>
                <div class="collapse" id="payment3" data-parent="#accordionExample">
                    <p>Travelers chấp nhận thanh toán bằng các thẻ ATM nội địa do các ngân hàng tại Việt Nam phát hành.</p>
                    <p>Thẻ ghi nợ nội địa (thẻ ATM): Vietcombank, Vietinbank, DongA , VIBank, Techcombank, HDBank, Tienphong Bank, Military Bank, VietA Bank, Maritime Bank, Eximbank, SHB, Sacombank,  NamA Bank,...(23 Ngân hàng)</p>
                </div>
              </div>
            </div>
            <div id="rules" >
              

            </div>
        </div>
        <div id="rightbooking">
          <div id="hotline"><p>Hỗ trợ giao dịch: <span>1900 1998</span></p></div>
          <div id="infotour">
            
            <img src="upload/tour/{{ $chitiettour -> tour -> HinhAnh }}" style="width: 100%; height: 200px">
            <p id="titletour"> {{ $chitiettour -> tour -> TenTour }} </p>
            <div id="detailinfo">
              <p><i class="fa fa-barcode"></i> Mã Tour: <span style="font-weight: bold;">{{ $chitiettour -> tour -> MaTour }} - {{ $chitiettour -> MaCTTour}}</span></p>
              <p><i class="fa fa-calendar"></i> Ngày đi: <span style="font-weight: bold;">{{ date_format(new DateTime($chitiettour -> NgayKhoiHanh ),'d-m-Y') }}</span> </p>
              <p><i class="fa fa-calendar"></i> Ngày về: <span style="font-weight: bold;">{{ date_format(new DateTime($chitiettour -> NgayKetThuc ),'d-m-Y') }}</span></p>
              <p><i class="fa fa-eercast"></i> Thời gian: <span style="font-weight: bold;">{{ $chitiettour -> tour -> SoNgay }} Ngày {{ ($chitiettour -> tour -> SoNgay) - 1 }} Đêm</span></p>
              <input type="text" name="giaTour" value="{{ $chitiettour -> tour -> Gia}}" style="display: none" id="giaTour">
              <input type="text" name="giaTourTE" value="{{ $chitiettour -> tour -> GiaTE}}" style="display: none" id="giaTE">
              <input type="text" name="giaTourEB" value="{{ $chitiettour -> tour -> GiaEB}}" style="display: none" id="giaEB">
              <input type="text" name="thanhtien" id="thanhtien" style="display: none"  >
              <p id="nguoilon" style="display: none"><i class="fa fa-user"></i>   Người Lớn : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> Gia)}} x <span id="sl1">1</span></span></p>
              <p id="treem" style="display: none"><i class="fa fa-male"></i>   Trẻ Em : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> GiaTE)}} x <span id="sl2">1</span></p></span></p>
              <p id="embe" style="display: none"><i class="fa fa-child"></i>   Em Bé : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> GiaEB)}} x <span id="sl3">1</span></p></span></p>
              <p>Tổng:  <span id="total" style="font-weight: bold;"></span> VND</p>
            </div>
          </div>
        </div>
    </div>
    {{-- <input type="number" name="SLNL" placeholder="Người Lớn"  />
    <input type="number" name="SLTE" placeholder="Từ 2 đến 12 tuổi" />
    <input type="number" name="SLEB" placeholder="Dưới 2 tuổi" /> --}}
    <input type="button" name="next" class="next action-button" value="Next" id="nhapinfo" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Nhập Thông Tin</h2>
    <h3 class="fs-subtitle"></h3>
    <div id="infoKH">
      @foreach(App\khachhang::where('MaKH',(Auth::guard('khachs') -> id()) )->get() as $user)
      <div class="info-form" >
        <h5> Người Đặt Tour : {{ $user -> TenKH}}</h5>
      </div>
      <div class="info-form">
        <h5> Email : {{ $user -> Email}}</h5>
      </div>
      <div class="info-form" >
        <h5> Địa Chỉ: {{ $user -> DiaChi}}</h5>
      </div>
      <div class="info-form" >
        <h5> Số điện thoại : {{ $user -> Tel}}</h5>
      </div>
       <input type="hidden" name="MaKH" value="{{ $user -> MaKH }}" required>
          
      @endforeach
    </div>
    <h5 style="color: #ef6c57">Danh Sách Hành Khách Đi Tour</h5>
        <div class="dshk">
           {{-- <table class ="tbhk">
            <thead>
              <tr>
                <td colspan="3">Hành Khách <span  >1</span></td>
              </tr>
            </thead>
            <tbody>
            <tr >
              <td>Họ tên  <input type="text" name="HoTen[]" required></td>
              <td> Ngày Sinh  <input type="date" name="NgaySinh[]" required></td>
              <td><p style="margin-bottom: 5px; line-height: 15px;">Giới tính </p> <select name="GioiTinh[]" class="gender">
                <option value="Male"> Nam</option>
                <option value="Female"> Nữ</option>
              </select></td>
              
            </tr>
            <tr>
               <td>Số Passport <input type="text" name="Passport[]" ></td>
                <td>Số điện thoại  <input type="text" name="Tel[]" ></td>
                 <td>Địa Chỉ <input type="text" name="DiaChi[]" required></td>
            </tr>
          </tbody>
          </table> --}}
     </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" id="trove1" />

    <input type="button" name="next" class="next action-button" value="Next" id="nhaphk" />
  </fieldset>

  <fieldset style="width: 600px;margin: 0 auto">
    <h2 class="fs-title">Xác Nhận && Đặt Tour</h2>
    <h3 class="fs-subtitle" style="color: #ee0979">{{$chitiettour -> tour-> TenTour}}</h3>
    <div id="confirmForm" style="text-align: left"> 
      <div id="thongtin">
      <p><i class="fa fa-barcode"></i> Mã Tour: <span style="font-weight: bold;">{{ $chitiettour -> tour -> MaTour }} - {{ $chitiettour -> MaCTTour}}</span></p>
              <p ><i class="fa fa-calendar"></i> Ngày đi: <span style="font-weight: bold;">{{ date_format(new DateTime($chitiettour -> NgayKhoiHanh ),'d-m-Y') }}</span> </p>
              <p><i class="fa fa-calendar"></i> Ngày về: <span style="font-weight: bold;">{{ date_format(new DateTime($chitiettour -> NgayKetThuc ),'d-m-Y') }}</span></p>
              <p><i class="fa fa-eercast"></i> Thời gian: <span style="font-weight: bold;">{{ $chitiettour -> tour -> SoNgay }} Ngày {{ ($chitiettour -> tour -> SoNgay) - 1 }} Đêm</span></p>
              
              
            </div>
            <div id="Soluong">
              <p id="nguoilon1" style="display: none"><i class="fa fa-user"></i>   Người Lớn : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> Gia)}} x <span id="sl11">1</span></span></p>
              <p id="treem1" style="display: none"><i class="fa fa-male"></i>   Trẻ Em : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> GiaTE)}} x <span id="sl21">1</span></p></span></p>
              <p id="embe1" style="display: none"><i class="fa fa-child"></i>   Em Bé : <span style="font-weight: bold;">{{ number_format($chitiettour -> tour -> GiaEB)}} x <span id="sl31">1</span></p></span></p>
              <p>Tổng:  <span id="total1" style="font-weight: bold;"></span> VND</p>
            </div>
      </div>
      <div id="dieukhoan" style="text-align: left;">
        <h5 style="width: 100%; float: left; text-align: center;">Điều Khoản</h5>
        <div id="CTDK">
          <p>Điều khoản này là sự thoả thuận đồng ý của quý khách khi sử dụng dịch vụ thanh toán trên trang web www.Travelers.net của Công ty Dịch vụ Lữ hành Travelers (Travelers) và những trang web của bên thứ ba. Việc quý khách đánh dấu vào ô “Đồng ý” và nhấp chuột vào thanh “Chấp nhận” nghĩa là quý khách đồng ý tất cả các điều khoản thỏa thuận trong các trang web này.</p>

 

          <strong>Giải thích từ ngữ</strong>

           

          <p>Điều khoản: là những điều quy định giữa Travelers và quý khách</p>

          <p>Bên thứ ba: là những đơn vị liên kết với Travelers (OnePay, Vietcombank) nhằm hỗ trợ việc thanh toán qua mạng cho quý khách</p>
          <p>Vé điện tử: là những thông tin và hành trình của quý khách cho chuyến đi được thể hiện trên một trang giấy mà quý khách có thể in ra được</p>

          <strong>Về sở hữu bản quyền</strong>

          <p>Trang web www.Travelers.net thuộc quyền sở hữu của Travelers và được bảo vệ theo luật bản quyền, quý khách chỉ được sử dụng trang web này với mục đích xem thông tin và đăng ký thanh toán online cho cá nhân chứ không được sử dụng cho bất cứ mục đích thương mại nào khác.</p>

          <p>Việc lấy nội dung để tham khảo, làm tài liệu cho nghiên cứu phải ghi rõ ràng nguồn lấy từ nội dung trang web Travelers. Không được sử dụng các logo, các nhãn hiệu Travelers dưới mọi hình thức nếu chưa có sự đồng ý của Travelers bằng văn bản.</p>

          <strong>Về thông tin khách hàng</strong>

          <p>Khi đăng ký thanh toán qua mạng, quý khách sẽ được yêu cầu cung cấp một số thông tin cá nhân và thông tin tài khoản.</p>

          <p>Đối với thông tin cá nhân: Những thông tin này chỉ để phục vụ cho nhu cầu xác nhận sự mua dịch vụ của quý khách và sẽ hiển thị những nội dung cần thiết trên vé điện tử. Travelers cũng sẽ sử dụng những thông tin liên lạc này để gửi đến quý khách những sự kiện, những tin tức khuyến mãi và những ưu đãi đặc biệt nếu quý khách đồng ý. Những thông tin này của quý khách sẽ được Travelers bảo mật và không tiết lộ cho bên thứ ba biết ngoại trừ sự đồng ý của quý khách hoặc là phải tiết lộ theo sự tuân thủ luật pháp quy định.</p>

          <p>Đối với thông tin tài khoản: Những thông tin này sẽ được Travelers và bên thứ ba áp dụng những biện pháp bảo mật cao nhất do các hệ thống thanh toán nổi tiếng trên thế giới như Visa và MasterCard cung cấp nhằm đảm bảo sự an toàn tuyệt đối của thông tin tài khoản quý khách.</p>

          <strong>Về trang web liên kết</strong>

          <p>Các trang web của Travelers có chứa những liên hệ kết nối với trang web của bên thứ ba. Việc liên kết trang web của bên thứ ba này nhằm chỉ cung cấp những sự tiện lợi cho quý khách chứ không phải là sự tán thành, chấp nhận những nội dung, thông tin sản phẩm của những trang web bên thứ ba. Travelers sẽ không chiu trách nhiệm về bất cứ trách nhiệm pháp lý nào liên quan đến những thông tin gì trong các trang web bên thứ ba.</p>
          <strong>Về hủy tour</strong>

          <p>Trong trường hợp hủy tour, quý khách vui lòng gửi email thông báo hủy tour đến Travelers. Travelers sẽ trao đổi và xác nhận lại tất cả các thông tin của quý khách. Khi hoàn tất việc xác nhận thông tin, Travelers sẽ hoàn tiền vào đúng tài khoản quý khách đã thanh toán sau khi trừ các khoản lệ phí hủy tour. Lệ phí hủy tour sẽ tùy thuộc vào từng tour tuyến quý khách đăng ký.</p>

          <strong>Trách nhiệm của Travelers</strong>

          <p>Travelers có nhiệm vụ bảo mật và lưu trữ an toàn các thông tin của quý khách với sự nghiêm túc cao nhất.</p>

          <p>Giải quyết những thắc mắc, sai sót, vi phạm mà quý khách gặp phải trong quá trình thanh toán nếu do lỗi của Travelers.</p>

          <p>Đảm bảo thực hiện đầy đủ mọi dịch vụ theo đúng chương trình mà quý khách đăng ký. Tuy nhiên chúng tôi có toàn quyền thay đổi lộ trình hoặc hủy bỏ chuyến đi du lịch bất cứ lúc nào mà chúng tôi thấy cần thiết vì sự an toàn cho quý khách.</p>

          <p>Mọi thay đổi nếu có sẽ được thông báo nhanh chóng cho quý khách ngay trước ngày khởi hành hoặc ngay sau khi phát hiện những phát sinh.</p>

          <strong>Trường hợp miễm trách nhiệm đối với Travelers</strong>

          <p>Travelers không chịu trách nhiệm về tất cả những thông tin mà quý khách cung cấp bởi chúng tôi không dễ dàng xác nhận chính xác quý khách nào đăng ký thông tin.</p>

          <p>Travelers không chịu trách nhiệm về việc thông tin của quý khách bị lấy cắp nếu như việc lấy cắp được thực hiện từ máy của quý khách do bị nhiễm virus máy tính hay do nguyên nhân nào khác.</p>

          <p>Travelers không chịu trách nhiệm đối với quý khách nếu xảy ra việc hệ thống máy tính của quý khách bị hư hại trong khi đang thanh toán hoặc bị can thiệp liên quan tới việc sử dụng một trang bên ngoài.</p>

          <p>Travelers không chịu trách nhiệm về việc mất dữ liệu thông tin của quý khách do sự cố khách quan như: thiên tai, hạn hán, hỏa hoạn, chiến tranh,…</p>

          <strong>Trách nhiệm của khách hàng</strong>

          <p>Quý khách cam kết hoàn toàn chịu trách nhiệm về các thông tin cá nhân, thông tin thẻ tín dụng đã được khai báo là trung thực, chính xác. Nếu có sai sót, giả mạo hay tranh chấp phát sinh thì Travelers có quyền hủy tour đã mua của quý khách.</p>

          <p>Quý khách có nhiệm vụ kiểm tra thông tin tài khoản để kịp thời để báo cho Travelers nếu có những sự cố. Thời hạn trong vòng 30 ngày tính từ ngày thanh toán, Travelers sẽ không nhận giải quyết bất cứ kiếu nại nào từ việc thanh toán.</p>

          <p>Quý khách không sử dụng các nội dung của trang web do Travelers quản lý cho mục đích thương mại nếu như chưa có sự đồng ý.</p>

          <p>Quý khách cần tự áp dụng cài đặt các biện pháp phòng ngừa để bảo đảm rằng bất cứ lựa chọn nào của quý khách khi sử dụng các trang web của Travelers không bị virus hoặc bất cứ mối đe dọa nào khác từ ngoài có thể can thiệp hoặc gây hư hại cho hệ thống máy tính của quý khách.</p>
        </div>
        <label><input type="checkbox" name="dongy" required style="float: left;width: 20px; margin-top: 8px;"><p style="float: left;">Tôi đã đọc và đồng ý điều khoản</p></label>
      </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="action-button" value="Submit" data-id="{{ $chitiettour-> MaCTTour}} " />
  </fieldset>
</form>

        </div>
      </div>
    


    <!-- <div class="site-section bg-light">
      
    </div> -->


    {{-- <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(home/images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
            <h2 class="text-white font-weight-light mb-5 h1">Experience Our Outstanding Services</h2>
            
          </div>
        </div>
      </div>
    </div> --}}  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Services</h2>
            <p class="color-black-opacity-5">We Offer The Following Services</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-airplane"></span></div>
              <div>
                <h3>Air Ticketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ship"></span></div>
              <div>
                <h3>Cruises</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-route"></span></div>
              <div>
                <h3>Tour Packages</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-hotel"></span></div>
              <div>
                <h3>Hotel Accomodations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-sailboat"></span></div>
              <div>
                <h3>Sea Explorations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ski"></span></div>
              <div>
                <h3>Ski Experiences</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Blog</h2>
            <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
          </div>
        </div>
        <div class="row mb-3 align-items-stretch">
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="home/images/hero_bg_1.jpg" alt="Image" class="img-fluid">
              <h2 class="font-size-regular"><a href="#">How to Plan Your Vacation</a></h2>
              <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
            </div> 
          </div>
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="home/images/hero_bg_2.jpg" alt="Image" class="img-fluid">
              <h2 class="font-size-regular"><a href="#">How to Plan Your Vacation</a></h2>
              <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> Jan 18, 2019 at 2:00 pm <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">View All Blog Posts</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Want To Travel With Us?</h2>
            <p class="mb-0"><a href="booking.html" class="btn btn-primary py-3 px-5 text-white">Book Now</a></p>
          </div>
        </div>
      </div>
    </div>
    @endsection
    @section('script')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#tt50').click(function(){
           
            $('#tt50').css({'background':'#5cb85c', 'color':'white'});
            $('#tt100').css({'background':'#bfe2bf', 'color':'black'});
            $('.tt2').css({'display':'block'});
            $('.tt1').css({'display':'none'});

        });
        $('#tt100').click(function(){
           
            $('#tt100').css({'background':'#5cb85c', 'color':'white'});
            $('#tt50').css({'background':'#bfe2bf', 'color':'black'});
            $('.tt1').css({'display':'block'});
            $('.tt2').css({'display':'none'});

        });
        $('#Pay1').click(function(){
           
            $('#Pay1').css({'background':'#5cb85c', 'color':'white'});
            $('#Pay2').css({'background':'#F3EDED', 'color':'black'});
            $('#Pay3').css({'background':'#F3EDED', 'color':'black'});
            $('.pay1').css({'display': 'block'});
            $('.pay2').css({'display': 'none'});
            $('.pay3').css({'display': 'none'});

        });
        $('#Pay2').click(function(){
           
            $('#Pay2').css({'background':'#5cb85c', 'color':'white'});
            $('#Pay1').css({'background':'#F3EDED', 'color':'black'});
            $('#Pay3').css({'background':'#F3EDED', 'color':'black'});
            $('.pay2').css({'display': 'block'});
            $('.pay1').css({'display': 'none'});
            $('.pay3').css({'display': 'none'});

        });
        $('#Pay3').click(function(){
           
            $('#Pay3').css({'background':'#5cb85c', 'color':'white'});
            $('#Pay2').css({'background':'#F3EDED', 'color':'black'});
            $('#Pay1').css({'background':'#F3EDED', 'color':'black'});
            $('.pay3').css({'display': 'block'});
            $('.pay2').css({'display': 'none'});
            $('.pay1').css({'display': 'none'});

        });
        $('#SLNL').on('input',function(){
          var SLNL= $('#SLNL').val();
          var SLTE= $('#SLTE').val();
          var SLEB= $('#SLEB').val();
          var giaNL= $('#giaTour').val();
          var giaTE= $('#giaTE').val();
          var giaEB= $('#giaEB').val();
          var total = (SLNL * giaNL) + (SLTE * giaTE) + (SLEB * giaEB);
          $('#nguoilon').css({'display':'block'});
          $('#nguoilon1').css({'display':'block'});


          document.getElementById('total').innerHTML = total;
          document.getElementById('total1').innerHTML = total;
          $('#thanhtien').val(total);
          
          document.getElementById('sl1').innerHTML = SLNL;
          document.getElementById('sl11').innerHTML = SLNL;
        });
        $('#SLTE').on('input',function(){
          var SLNL= $('#SLNL').val();
          var SLTE= $('#SLTE').val();
          var SLEB= $('#SLEB').val();
          var giaNL= $('#giaTour').val();
          var giaTE= $('#giaTE').val();
          var giaEB= $('#giaEB').val();
          var total = (SLNL * giaNL) + (SLTE * giaTE) + (SLEB * giaEB);
          if (SLTE == 0) {
            $('#treem').css({'display':'none'});
            $('#treem1').css({'display':'none'});
            document.getElementById('total').innerHTML = total;
          $('#thanhtien').val(total);
          document.getElementById('total1').innerHTML = total;
          }
          else{
          $('#treem').css({'display':'block'});
          $('#treem1').css({'display':'block'});
          
          document.getElementById('total').innerHTML = total;
          $('#thanhtien').val(total);
          document.getElementById('total1').innerHTML = total;
          document.getElementById('sl2').innerHTML = SLTE;
          document.getElementById('sl21').innerHTML = SLTE;
        }
        });
        $('#SLEB').on('input',function(){
          var SLNL= $('#SLNL').val();
          var SLTE= $('#SLTE').val();
          var SLEB= $('#SLEB').val();
          var giaNL= $('#giaTour').val();
          var giaTE= $('#giaTE').val();
          var giaEB= $('#giaEB').val();
          var total = (SLNL * giaNL) + (SLTE * giaTE) + (SLEB * giaEB);
          if (SLEB == 0) {
            $('#embe').css({'display':'none'});
            $('#embe1').css({'display':'none'});
              document.getElementById('total').innerHTML = total;
              $('#thanhtien').val(total);
              document.getElementById('total1').innerHTML = total;
          }
          else{
          $('#embe').css({'display':'block'});
          $('#embe1').css({'display':'block'});
          
          document.getElementById('total').innerHTML = total;
          $('#thanhtien').val(total);
          document.getElementById('total1').innerHTML = total;
          document.getElementById('sl3').innerHTML = SLEB;
          document.getElementById('sl31').innerHTML = SLEB;

        }
        });
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating;
        $('#nhapinfo').click(function(){
          if ($('#SLEB').val() == "") {
            $('#SLEB').val(0);
          }
          if ($('#SLTE').val() == "") {
            $('#SLTE').val(0);
          }
          if ($('#SLNL').val() == "") {
              alert('Bạn chưa nhập số lượng khách ');
          }
          else if($('#thanhtoan1').prop('checked')==false && $('#thanhtoan2').prop('checked')==false && $('#thanhtoan3').prop('checked')==false )
            { alert("Bạn chưa chọn phương thức thanh toán"); }
          
          else{
          

          if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    
    }, 
    //this comes from the custom easing plugin
    easings: 'easeInOutBack'
  });
          addkh();

        }
        });
    
        
        function addkh(){
          
          
          var nl=Number( $('#SLNL').val());
          var te=Number($('#SLTE').val());
          var eb=Number( $('#SLEB').val());
          var tong= nl + te +eb;
          // var stt =document.getElementByClassByClassName("stt");
           for (var i =1; i <= tong; i++) {
            var table =
           '<table class ="tbhk">'+
            '<thead>'+
              '<tr>'+
                '<td colspan="3">Hành Khách '+i+' </td>'+
              '</tr>'+
            '</thead>'+
            '<tbody>'+ 
            '<tr >'+
              '<td>Họ tên  <input type="text" name="HoTen['+i+']" required></td>'+
              '<td> Ngày Sinh  <input type="date" name="NgaySinh['+i+']" required></td>'+
              '<td><p style="margin-bottom: 5px; line-height: 15px;">Giới tính </p> <select name="GioiTinh['+i+']" class="gender">'+
                '<option value="Male"> Nam</option>'+
                '<option value="Female"> Nữ</option>'+
              '</select></td>'+
              
            '</tr>'+
            '<tr>'+
               '<td>Số Passport <input type="text" name="Passport['+i+']" ></td>'+
                '<td>Số điện thoại  <input type="text" name="Tel['+i+']" ></td>'+
                 '<td>Địa Chỉ <input type="text" name="Address['+i+']" required></td>'+
            '</tr>'+
          '</tbody>'+
          '</table>';
            $('.dshk').append(table);

       

          }
        
          

        }
        $('#trove1').click(function(){
          $('.tbhk').remove();
           $('#SLNL').val("");
         $('#SLTE').val("");
          $('#SLEB').val("");
        });



      });
    </script>
    @endsection