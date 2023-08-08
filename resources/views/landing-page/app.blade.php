<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('images/emblem.png') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @yield('link')
</head>

<body>
    <div class="d-flex vh-100 flex-column">
        @include('landing-page.navigation')
        @yield('main')
        @include('landing-page.footer')
    </div>
    <script src="../path/to/bootstrap/dist/js/bootstrap.min.js"></script>
    @yield('script')
</body>

</html>
