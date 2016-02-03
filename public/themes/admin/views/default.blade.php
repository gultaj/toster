<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') | TosberAdmin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        @section('styles')
           <link href="{{ theme('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
           <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
           {{-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> --}}
           <link href="{{ theme('css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
           <link href="{{ theme('css/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
           <link href="{{ theme('css/admin-style.css') }}" rel="stylesheet" type="text/css" />
        @show
    </head>
    <body class="skin-blue">
    <div class="wrapper">

        @include('partials.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('partials.menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('header')
            </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        @include('partials.footer')
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    @section('scripts')
       <script src="{{ theme('js/jQuery-2.1.4.min.js') }}"></script>
       <script src="{{ theme('js/bootstrap.min.js') }}" type="text/javascript"></script>
       <script src="{{ theme('js/app.min.js') }}" type="text/javascript"></script>
    @show

    </body>
</html>