<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">


    @yield('dynamicCss')

</head>
<body class="nav-md">
    <div id="app">
        <div class="container body">
        <div class="main_container">

        @include('partials.nav._sidenav')

        @include('partials.nav._topnav')

        <!-- page content -->
        <div class="right_col" role="main">
         <div class="page-title">
          @yield('content')
         </div> 
        </div>
        <!-- /page content -->

        @include('partials._foot')


      </div> {{-- end of main container --}}
    </div>

    
 <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    


        
    </div>

   <script src="{{ asset('js/custom.min.js') }}"></script>
    
    @yield('dynamicJs')

</body>
</html>
