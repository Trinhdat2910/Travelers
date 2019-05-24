<nav class="sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                @if(Auth::check())
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="upload/nhanvien/{{Auth::user()-> HinhAnh}}" alt="profile image">
                </div>
                
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user() -> name}}</p>
                  <div>
                    <p class="designation text-muted">{{Auth::user() -> TenNV }} </p>
                    
                    <p style="font-weight: bold"> {{Auth::user() -> chucvu -> TenCV }} <span class="status-indicator online"></span></p>
                  </div>
                </div>
                @endif
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/tour/public/">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Trang chủ</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee/qlKH/danhsachKH">
              <i  class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Quản lý Khách Hàng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="collapse" href="#ui-basicNV" aria-expanded="false" aria-controls="ui-basic" >
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Quản Lý Nhân Viên</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicNV">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlNV/danhsachNV"> Nhân Viên Hướng Dẫn </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlNV/danhsachDH">Điều Hành Tour</a>
                </li>
                
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link"  data-toggle="collapse" href="#ui-basicT" aria-expanded="false" aria-controls="ui-basic" >
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Quản Lý Tour</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basicT">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/XuLyTour"> Tất cả </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/XuLyTourMB"> Miền Bắc </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/XuLyTourMT"> Miền Trung </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/XuLyTourMN"> Miền Nam </a>
                </li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link"  data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" id="qltour"  >
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Tour Mẫu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/danhsachTour"> Tất cả </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/dsTourMB"> Miền Bắc </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/dsTourMT"> Miền Trung </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/dsTourMN"> Miền Nam </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="employee/qlTour/themTour"> Thêm Tour Mới </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee/qlHD/danhsachHD">
              <i  class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Hợp Đồng Đặt Tour</span>
            </a>
          </li>
          
          
          
          
          <li class="nav-item">
            <a class="nav-link"  href="employee/qlDD/danhsachDD" >
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Địa Điểm Du Lịch</span>
         </a>
            
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="employee/qlDoiTac/danhsachDT" >
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Đối Tác Dịch Vụ</span>
            </a>
            
          </li>

          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
@section('script')

<script type="text/javascript">
  $(document).ready( function () {
    $('#qltour').click( function(){
      $('#ui-basic').collapse('toggle');
    });
} );

  </script>
   
@endsection