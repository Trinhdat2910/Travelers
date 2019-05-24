
    
    <header class="site-navbar py-1" role="banner" >
      
      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Travelers</a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li >
                  <a href="" >Home</a>
                </li>
                <li class="has-children">
                  <a href="home/ListTour/TourMienBac">Miền Bắc</a>
                  <ul class="dropdown">
                    @foreach(App\nhomtour::where('MaKV', 1)->get() as $t )
                    <li><a href="home/ListTour/NhomTour/{{$t -> MaNhomTour}}">{{ $t -> TenNhom }}</a></li>
                    @endforeach
                  </ul>
                </li>
                
                <li class="has-children">
                  <a href="home/ListTour/TourMienTrung">Miền Trung</a>
                  <ul class="dropdown">
                    @foreach(App\nhomtour::where('MaKV', 2)->get() as $t )
                    <li><a href="home/ListTour/NhomTour/{{$t -> MaNhomTour}}">{{ $t -> TenNhom }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="has-children">
                  <a href="home/ListTour/TourMienNam">Miền Nam</a>
                  <ul class="dropdown">
                    @foreach(App\nhomtour::where('MaKV', 3)->get() as $t )
                    <li><a href="home/ListTour/NhomTour/{{$t -> MaNhomTour}}">{{ $t -> TenNhom }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="blog.html">Blog</a></li>
                
                <li><a href="contact.html">Contact</a></li>
                <!-- <li><a href="booking.html">Book Online</a></li> -->
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                @if(Auth::guard('khachs')->check() =="")
                <li>
                  <a href="loginMember" class="pl-3 pr-3 text-black" > Đăng Nhập 
                    
                  </a>
                </li>
                @else
                  <li>
                     @foreach(App\khachhang::where('MaKH',(Auth::guard('khachs') -> id()) )->get() as $ten)
                  <a class="pl-3 pr-3 text-black nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false" style=" width: 200px;"><span class="profile-text">Xin Chào,
                   
                        
                          {{ $ten -> Username }}</span> 

                      
                  </a>
                  @endforeach
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2" href="home/ListTour/TourDaDat">
                Tour Đã Đặt
              </a>
              <a class="dropdown-item">
                Đổi Mật Khẩu
              </a>
              
              <a class="dropdown-item" href="logoutMember">
                Đăng Xuất
              </a>
            </div>
          </li>
                </li>


                @endif
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
     
    </header>