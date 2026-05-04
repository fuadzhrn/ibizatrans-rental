<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ibiza Trans - Professional Transport & Tours</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>
<body class="ibiza-body">
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')

    <script src="{{ asset('assets/js/global.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>
</html>
