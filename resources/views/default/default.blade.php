<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@yield('title') - Tosber</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;amp;subset=latin,cyrillic">
    <link rel="stylesheet" href="{{ theme('css/style.css') }}">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div class="out">
    
    @if ($currentUser)
        @include('partials.nav.user')
    @else
        @include('partials.nav.guest')
    @endif

    <div class="body" id="app">
        <div class="body__wrapper">

            @include('partials.header')

            <div class="content">
                <div class="content__wrapper">

                    @yield('content')

                </div>

                @include('partials.sidebar')

            </div>
        </div>

        @include('partials.footer')

    </div>
</div>

@section('scripts')
    <script type="text/javascript" src="{{ theme('js/app.js') }}"></script>
@stop
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>