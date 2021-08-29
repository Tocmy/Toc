<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getlocale()) }}">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('page-header')
        @include('layouts.admin.head')
        <!--font-->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet"/>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
         <!--navbar-->

         @include('layouts.admin.main-header')

        <!--sidebar-->
        @include('layouts.admin.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
            @include('layouts.breadcrumb')
        </div>
        <section class="content">
            @yield('content')
        </section>
        </div>
        <footer class="main-footer">
            @include('layouts.admin.footer')
        </footer>
        </div>
        <!--Optional JavaScript-->
        <!--jQuery first, then Popper.js, then Bootstrap JS-->
        @include('layouts.admin.script')
        @yield('script')
    </body>
</html>
