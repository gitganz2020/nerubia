<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle','Movie API')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-4.5.0/bootstrap.min.css') }}">
</head>
<body>
    <div class="wrapper container">
        @include('header')
        <main class="container">
            @yield('content')
        </main>
        @include('footer')
    </div>
    <script src="{{ asset('assets/js/bootstrap-4.5.0/bootstrap.min.css') }}"></script>
</body>
</html>