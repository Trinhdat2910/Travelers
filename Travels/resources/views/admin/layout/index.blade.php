<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin</title>
  <!-- plugins:css -->
  <base href="{{asset('')}}">
  


  <link rel="stylesheet" href="admin_asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin_asset/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="admin_asset/vendors/iconfonts/font-awesome/css/font-awesome.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin_asset/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin_asset/images/favicon.png" />

  <link rel="stylesheet" href="admin_asset/Datatable/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="admin_asset/css/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin_asset/styleAdmin.css">


</head>

<body>
  <div class="container-scroller">
 	@include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.sidebar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        	@yield('content')

        </div>
      </div>
      
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="admin_asset/vendors/js/vendor.bundle.base.js"></script>
  <script src="admin_asset/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="admin_asset/js/off-canvas.js"></script>
  <script src="admin_asset/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin_asset/js/dashboard.js"></script>
  <!-- End custom js for this page-->

{{--   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}

   

 {{--  <script src="admin_asset/jquery/jquery-3.4.0.min.js"></script> --}}

  <script src="admin_asset/Datatable/js/jquery.dataTables.min.js"></script>
 
  
  <script src="ckeditor/ckeditor.js"></script> 

  <script src="admin_asset/js/js/bootstrap.min.js"></script>
  <script src="admin_asset/js/js/moment.min.js"></script>
{{--   <script src="admin_asset/js/js/jquery.min.js"></script> --}}
{{--     <script src="admin_asset/js/jquery/jquery-3.4.0.min.js"></script> --}}
  @yield('script')

  

</body>

</html>