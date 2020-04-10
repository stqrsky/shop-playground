<!DOCTYPE html>
<html lang="en">

<head>
    <title>Neue Fische Shop - Admin Area</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}" />
</head>

<body class="app sidebar-mini rtl">
    @include('backend/includes/header')
    @include('backend/includes/sidebar')
    @yield('content')
    @include('backend/includes/footer')
</body>

</html>