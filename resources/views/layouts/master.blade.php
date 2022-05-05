<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    @include('partials.css')
    @stack('css')
</head>
<body>
@include('partials.header')
@include('partials.breadcrumb')
<div class="main">
    <div class="container mt-3">
        @include('partials.flash_messages')
        <div class="container mb-2">
            @include('partials.inner-navigation')
        </div>
        <div class="text-center">
            @yield('title')
        </div>
        <div class="main_container">
            @yield('content')
        </div>
    </div>
</div>

@include('partials.footer')
@include('partials.js')
@stack('js')

</body>
</html>
