<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Travalers  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
  

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="home/fonts/icomoon/style.css">

    <link rel="stylesheet" href="home/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/css/magnific-popup.css">
    <link rel="stylesheet" href="home/css/jquery-ui.css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="home/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="home/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="home/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_asset/vendors/iconfonts/font-awesome/css/font-awesome.css">
   


    <link rel="stylesheet" href="home/css/aos.css">

    <link rel="stylesheet" href="home/css/style.css">
    <link rel="stylesheet" href="home/css/wizard.css">


    
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
     @include('home.layout.header')

  

   
     @yield('contentHome')
    
    @include('home.layout.footer')
    
  </div>

  <script src="home/js/jquery-3.3.1.min.js"></script>
  <script src="home/js/jquery-migrate-3.0.1.min.js"></script>

  <script src="home/js/jquery-ui.js"></script>
  <script src="home/js/popper.min.js"></script>
  <script src="home/js/bootstrap.min.js"></script>
  <script src="home/js/owl.carousel.min.js"></script>
  <script src="home/js/jquery.stellar.min.js"></script>
  <script src="home/js/jquery.countdown.min.js"></script>
  <script src="home/js/jquery.magnific-popup.min.js"></script>
  <script src="home/js/bootstrap-datepicker.min.js"></script>
  <script src="home/js/aos.js"></script>

  <script src="home/js/main.js"></script>
   <script src="home/js/wizard.js"></script>

  @yield('script')
    
  </body>
</html>