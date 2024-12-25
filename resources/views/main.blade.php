<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::asset('assets/css/main.css')}}" rel="stylesheet">
    <meta name="author" content="Jose Orlando Felicio Parreira">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ URL::asset('assets/img/icon.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/icon.png') }}">
    <title>
        @yield('title', 'NXLog PHP Test')
    </title>
</head>

<body>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
