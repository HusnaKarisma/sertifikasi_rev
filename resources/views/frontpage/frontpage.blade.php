<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ ($page_title)?CRUDBooster::getSetting('appname').': '.strip_tags($page_title):"Home" }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="webapp for perpustakaan nasional">
  <meta name="author" content="ahmad.furqon@gmail.com">
  
  <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
  <link href="{{ asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="{{asset("vendor/crudbooster/assets/adminlte/font-awesome/css")}}/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link href="{{asset("vendor/crudbooster/ionic/css/ionicons.min.css")}}" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />    
  <link href="{{ asset("vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />

  <link href="{{asset("css/normalize.css")}}" rel="stylesheet" type="text/css" />
</head>

<body class="blog layout-boxed">
  <div id="mask">
    <div id="loader"></div>
  </div>
  
  @include('frontpage.navbar')

  <div id="main" class="pd-top">

    @yield('content')
    
  </div>

  @include('frontpage.footer')

  <script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <script src="{{ asset ('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{asset("js/plugins/bootstrap/bootstrap-select.js")}}"></script>
  <script src="{{asset("js/plugins/fancybox/jquery.fancybox.pack.js")}}"></script>
  <script src="{{asset("js/plugins/appear/jquery.appear.js")}}"></script>
  <script src="{{asset("js/plugins/paralax/parallax.js")}}"></script>
  <script src="{{asset("js/plugins/sticky/jquery.sticky.js")}}"></script>
  <script src="{{asset("js/plugins/fullscreen/jquery.fullscreenslides.min.js")}}"></script>
  <script src="{{asset("js/plugins/share/share-button.min.js")}}"></script>
  <script src="{{asset("js/app.js")}}"></script>
  
</body>

</html>