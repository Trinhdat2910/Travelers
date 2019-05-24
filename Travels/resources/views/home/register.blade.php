<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Member</title>
  <!-- plugins:css -->
   <base href="{{asset('')}}">
  <link rel="stylesheet" href="admin_asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin_asset/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin_asset/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register Member</h2>
            <div class="auto-form-wrapper">
              @if(count($errors) > 0 )
                      <div class= "alert alert-danger" >
                        @foreach($errors -> all() as $err)
                          {{ $err }}<br>


                        @endforeach

                      </div>
                  @endif
              @if(session('thongbao'))
                      <div class= "alert alert-success" >
                        {{session('thongbao')}}

                      </div>
              @endif
              <form action="Member" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Họ Tên" name="HoTen" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Password" required name="Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" required name="confirmPass">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Số điện thoại" name="Tel" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Địa Chỉ " name="Diachi" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                 
                    <select class="input-group form-control form-control-sm " id="quocgia" name="quocgia" >
                      @foreach(App\quocgia::all() as $qg)
                      <option value="{{ $qg -> MaQG }}">{{ $qg -> TenQG }}</option>
                      @endforeach
                    </select>
                    {{-- <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div> --}}
                  
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked required> Tôi đồng ý với các điều khoản
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block">Đăng Ký</button>
                  
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Bạn Đã Có Tài Khoản ?</span>
                  <a href="loginMember" class="text-black text-small">Đăng Nhập</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin_asset/vendors/js/vendor.bundle.base.js"></script>
  <script src="admin_asset/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="admin_asset/js/off-canvas.js"></script>
  <script src="admin_asset/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>