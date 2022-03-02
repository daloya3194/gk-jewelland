<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Test CSS Table -->
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">--}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Open+Sans&display=swap" rel="stylesheet">

    <title>{{ env('APP_NAME') }}</title>

    <style>
        /*#navi {
            position:fixed;
            width: 325px;
            z-index: 1000;
            left: 0;
            top: 0;
            !*border-right: 1px solid #162636;*!
            height: 100%;
        }*/

        .pointer {
            cursor: pointer;
            opacity: 0.7;
        }

        .pointer:hover {
            background-color: lightgray;
            color: black;
            opacity: 1;
        }

        .nav-active {
            background-color: lightgray;
            color: black;
            opacity: 1;
        }

        .rounded-4 {
            border-radius: 0.5rem;
        }

        body {
            font-family: 'DM Sans', sans-serif;
        }

        .visible {
            display: block;
        }

    </style>

</head>

<body style="background-color: #e5e7eb">

<div class="d-flex justify-content-between bg-transparent border-bottom border-secondary bg-white px-4 py-2 align-items-center">
    <div id="nav_button" class="lead h3 mt-2 fw-bolder" style="cursor: pointer">
        <i class="bi bi-list"></i>
    </div>
    <div class="d-flex">
        <p class="lead h3 mt-2">Welcome,</p>
        <p class="lead h3 fw-bold mt-2 ms-2">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
    </div>
</div>

{{--<p><a href="{{ route('admin.logout', app()->getLocale()) }}">Logout</a></p>--}}

<div class="container-fluid">

    @include('admin._navigation')


@yield('content')


</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

{{--<script>
    {
        const d_none = "d-none";

        const nav_button = document.querySelector("#nav_button");
        const navi = document.querySelector("#navi");

        nav_button.addEventListener("click", () => {
            navi.classList.toggle(d_none);
        });

        document.addEventListener('click', function(event) {
            const isClickInsideElement = nav_button.contains(event.target);
            if (!isClickInsideElement) {
                navi.classList.add(d_none);
            }
        });
    }
</script>--}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

{{--<script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>--}}

<script src="/js/script.js"></script>

</body>
</html>
