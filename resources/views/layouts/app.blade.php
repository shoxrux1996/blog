<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel=icon href="{{ asset('dist/images/favicon.png')}}" sizes="32x32" type="image/png">
    <title>Юридическая консультация онлайн - бесплатная помощь юристов и адвокатов 24 часа в сутки</title>

    <!-- Styles -->
    <!-- Bootstrap Core -->
    <link href="{{ asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/typography.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.css')}}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('dist/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  @yield('body')

    
    <!-- Scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('dist/js/jquery.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('dist/js/script.js')}}"></script>

    @yield('scripts')

    <!-- Preloader -->
    <style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #2C3E50 url("{{ asset('dist/images/puff.svg')}}" ) center center no-repeat;background-size:79px;}</style>
    <div id="hellopreloader"><div id="hellopreloader_preload"></div></div>
    <script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
    <!-- /Preloader -->
</body>
</html>
