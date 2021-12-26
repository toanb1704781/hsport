<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.layouts.head')

</head>

<body>
    {{--  Preloader  --}}
    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>

    {{--  Main Content  --}}
    <div class="main-container-wrapper">

        {{--  Navbar  --}}
        @include('frontend.layouts.navbar')

        {{--  HOME PAGE  --}}
        @yield('home')

        {{-- Main --}}
        @yield('main')

    </div>

    {{--  Footer  --}}
    @include('frontend.layouts.footer')

    {{--  Script  --}}
    @include('frontend.layouts.script')

    @yield('script')

</body>
</html>