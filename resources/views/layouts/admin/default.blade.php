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
    @if(Request::segment(1) == 'category' || Request::segment(1) == 'filter')
        @include('brand.slider')
    @endif
    @yield('content')
</div>

<footer>
    @include('includes.footer')
</footer>
</body>
</html>

<script>
    jQuery('.slider').lbSlider({
        leftBtn: '.sa-left',
        rightBtn: '.sa-right',
        visible: 8,
        autoPlay: true,
        autoPlayDelay: 1
    });

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-4275228-14', 'auto');
    ga('send', 'pageview');

</script>