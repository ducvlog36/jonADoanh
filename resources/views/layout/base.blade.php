<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Tag --}}
        @include('includes.element.meta')

        <title>Jobsempai.com</title>

        {{-- CSS --}}
        @include('includes.element.link')
        {{-- CSS For Screen --}}
        @yield('css')
    </head>
    <body>
        {{-- Header --}}
        @include('includes.header')
        {{-- Main --}}
        <main id="main">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('includes.footer')

        @include('includes.element.script')
        @yield('js')
    </body>
</html>
