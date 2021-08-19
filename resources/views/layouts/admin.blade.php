<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('title')
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('adminlte/assets/images/favicon.png')}}">
        <link href="{{asset('adminlte/assets/plugins/chartist/dist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{asset('adminlte/monster-html/css/style.min.css')}}" rel="stylesheet">
        @yield('linkcss')
    </head>

    <body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
             data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

            @include('partials.header')

            @include('partials.sidebar')


            <div class="page-wrapper">

                @yield(('content'))

                @include('partials.footer')

            </div>

        </div>
        <script src="{{asset('adminlte/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('adminlte/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}.."></script>
        <script src="{{asset('adminlte/monster-html/js/app-style-switcher.js')}}"></script>
        <script src="{{asset('adminlte/monster-html/js/waves.js')}}"></script>>
        <script src="{{asset('adminlte/monster-html/js/sidebarmenu.js')}}"></script>
        <script src="{{asset('adminlte/monster-html/js/custom.js')}}"></script>
        <script src="{{asset('adminlte/assets/plugins/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('adminlte/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('adminlte/monster-html/js/pages/dashboards/dashboard1.js')}}"></script>
        @yield('js')
    </body>
</html>
