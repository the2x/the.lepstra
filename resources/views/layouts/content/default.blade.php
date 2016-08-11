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

<script>
    jQuery(document).ready(function () {
        jQuery('#out-of-the-box-demo').slippry({
            transition: 'vertical',
            loop: false,
            controls: false
        })
    });

    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '/elfinder/ckeditor',
        uiColor: '#f7f7f7',
        height: 500
    });

    CKEDITOR.editorConfig = function (config) {
        config.removeButtons = 'Source';
    };
</script>