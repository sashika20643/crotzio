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
      <title>Crotzio - best online shop</title>
      <!-- bootstrap core css -->
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
            <!-- font awesome style -->
            <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
            <!-- Custom styles for this template -->
            <link href="{{asset('css/style.css')}}" rel="stylesheet" />
            <!-- responsive style -->
            <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />

      <style>
        .btnx{
            color: white !important;
            background-color:#a815c2;
             border:none;
             font-size:90%;
        }
        .btnx:hover{
            outline:2px solid #a815c2 !important;
            background-color: white;
            color: #a815c2 !important ;
        }
      </style>
      <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
   </head>
   <body>
    @include('sweetalert::alert')
      <div class="hero_area">
              <!-- header section strats -->
              @include('common.components.header')
              <!-- end header section -->

        @yield('content')
      </div>
    </div>
        @include('common.components.footer')
        <!-- footer end -->
        <div class="cpy_">
           <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://html.design/">crotzio</a><br>

              Developed By <a href="https://themewagon.com/" target="_blank">codemonster</a>

           </p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
     </body>
  </html>
