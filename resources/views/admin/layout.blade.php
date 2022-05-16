<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GK-Jewelland | Admin</title>
    <link rel="icon" href="{{ asset('img/gk_logo.png') }}">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">

    <link href="{{ asset('css/datatables/datatables.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

</head>

<body class="flex h-screen bg-gray-100 font-sans">

<!-- Side bar-->
@include('admin._sidebar')

<div class="flex flex-row flex-wrap flex-1 flex-grow content-start pl-16 text-gray-700">

    @include('admin._navigation')

    @yield('content')

</div>

<script src="{{ asset('js/script.js') }}"></script>

@isset($nav)
    @if(in_array($nav, ['dashboard']))
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <script src="{{ asset('js/charts/chartist-js.js') }}"></script>
    @endif
@endisset

<script src="{{ asset('js/dropdown/toggle-dropdown.js') }}"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/datatables/datatables.js') }}"></script>

@isset($nav)
    @if(in_array($nav, ['products']))
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="{{ asset('js/filepond/filepond-upload.js') }}"></script>
    @endif
@endisset
</body>

</html>
