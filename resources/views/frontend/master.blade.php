<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>XOSS</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet" />
  @stack('css')
</head>

<body class="{{Route::is('home') ? '' : 'sub_page'}}">
  <div class="hero_area">
    @include('frontend.layouts.header')
    
    @yield('slider')

  </div>

  @yield('content')

  @include('frontend.layouts.footer')

  

  <script type="text/javascript" src="{{asset('frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/assets/js/bootstrap.js')}}"></script>

</body>

</html>