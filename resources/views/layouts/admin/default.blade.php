<!doctype html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

@include('layouts.session.session_order')

<header>
    @include('includes.header')
    @include('layouts.menu.menu')
    @include('layouts.error')
</header>

<div class="wrapper">
    @yield('content')
</div>

<footer>
    @include('includes.footer')
</footer>
</body>
</html>