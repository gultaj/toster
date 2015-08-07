<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@yield('title') - Tosber</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic&amp;amp;subset=latin,cyrillic">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
<div class="out">
    
    @if (Auth::check())
        @include('partials.nav.user')
    @else
        @include('partials.nav.guest')
    @endif

    <div class="body">
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

@yield('scripts')

</body>
</html>