<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
    <meta name="author" content="Jose Orlando Felicio Parreira">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ URL::asset('assets/img/icon.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/icon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>
        @yield('title', 'NXLog PHP Test')
    </title>
</head>

<body>
    <div id="loader" class="d-none align-items-center justify-content-center">
        <div>
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
                
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ERROR!</strong> {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL::asset('assets/js/app.js')}}"></script>
</body>

</html>
