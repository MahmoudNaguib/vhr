<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @include('partials.css')
    @stack('css')
</head>
<body>
@include('partials.header')
<div class="main">
    <div class="container mt-5">
        @include('partials.flash_messages')
        @yield('title')
        @yield('content')
    </div>
</div>

@include('partials.footer')
@include('partials.js')
@stack('js')

</body>
</html>
