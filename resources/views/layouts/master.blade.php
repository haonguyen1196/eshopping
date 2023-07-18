<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <link href="{{ asset('Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/price-range.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/animate.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/main.css')}}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        @include('components.header')

        @yield('content')

        @include('components.footer')

        <!-- js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('Eshopper/js/jquery.js')}}"></script>
        <script src="{{ asset('Eshopper/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ asset('Eshopper/js/price-range.js')}}"></script>
        <script src="{{ asset('Eshopper/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{ asset('Eshopper/js/main.js')}}"></script>
        @yield('js')
    </body>
</html>
