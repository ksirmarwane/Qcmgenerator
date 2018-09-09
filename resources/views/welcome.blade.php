<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>QCMGenerator</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="css/grayscale.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    
  
    #btn-transparent {
      border: 1px solid #0facf3;
      border-radius: 10rem;
      width: 200px !important;
      font-size: 12px;
      padding: 9px 34px;
      margin-right: 16px !important;
      font-size: 14px;
      background-color: transparent;
      text-align: center;
      color: #fff;
        
    }
    #btn-trans-active {
      background-color: #0facf3;
      color: #fff;
      border: 1px solid #0facf3;
      border-radius: 10rem;
      width: 200px !important;
      font-size: 12px;
      padding: 9px 34px;
      margin-right: 16px !important;
      font-size: 14px;
      text-align: center;
        
    }
    #btn-transparent:hover {
        background-color: #FFF;
        padding: 10px 36px;
        color: #000 !important;
        transition: .4s;
    }
    </style>
    
    
</head>

<body>
    <div id="app">
        
        
        @include('partials.welcomemenu')
        @include('partials.welcomescreen')
        @include('partials.contact')
        @include('partials.footer')


    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="assets/js/jquery-3.3.1.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="js/grayscale.js"></script>
</body>
</html>
