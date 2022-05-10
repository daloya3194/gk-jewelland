@inject('urlGenerator', 'Illuminate\Routing\UrlGenerator')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GK-Jewelland | Home</title>



{{--    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- Link Swiper's CSS -->
    <link href="{{ asset('css/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="text-gray-700">

    <!-- Navigation-->
    @include('layouts._navigation')

    @if(\Session::has('error'))
        <div class="border border-red-600">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="border border-green-600">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif

    @yield('content')

    @include('layouts._footer')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/swiper/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/swiper/script.js') }}"></script>

    <script src="{{ asset('js/dropdown/toggle-dropdown.js') }}"></script>

{{--    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>--}}

</body>
</html>
