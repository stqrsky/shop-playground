<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/backend/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/backend/css/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body class="app sidebar-mini rtl">
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        @yield('content')
    </section>
</body>

</html>