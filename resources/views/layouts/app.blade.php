<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GK-Jewelland | Home</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Link Swiper's CSS -->
    <link href="{{ asset('css/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper/style.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="">

    <!-- Navigation-->
    @include('layouts._navigation')

    @yield('content')

    @include('layouts._footer')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/swiper/script.js') }}"></script>

</body>
</html>
