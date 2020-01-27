<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" href="{{asset('css/login/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/login/sweetalert.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="{{asset('login/components/font-awesome/css/font-awesome.min.css')}}">
    <!--link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"-->
    <title>Hotelerias Lidotel</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    @include('flash::message')
    @yield('content')


    <!-- Essential javascripts for application to work-->
    <script src="{{asset('js/login/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/login/popper.min.js')}}"></script>
    <script src="{{asset('js/login/bootstrap.min.js')}}"></script>
    

    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/login/plugins/pace.min.js')}}"></script>
    <script src="{{asset('js/login/sweetalert.js')}}"></script>


    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
    @include('sweet::alert')
  </body>
</html>
