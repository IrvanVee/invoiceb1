<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/LOGO B1  White.png') }}" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Rubick admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->

    {{-- BEGIN: font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- END: font awesome --}}

    <!-- BEGIN: JAVASCRIPT Assets-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END: JAVASCRIPT Assets-->

    {{-- BEGIN: TINYMCE CDN  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js" integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('tinyscript')
    {{-- END: TINYMCE CDN --}}

    {{-- BEGIN:SELECTED --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('selectedjs')
    {{-- END:SELECTED --}}

    {{-- BEGIN:AUTO DISPLAY WITH AJAX --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @stack('ajax')
    {{-- END:AUTO DISPLAY WITH AJAX --}}

    {{-- BEGIN:MAKE COUNT WITH JQUERY  --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    @stack('count')
    {{-- END:MAKE COUNT WITH JQUERY --}}

    {{-- BEGIN : MAKE DATA TABLES WITH DATATABLES.NET --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    @stack('datatables')
    {{-- END : MAKE DATA TABLES WITH DATATABLES.NET --}}

    {{-- BEGIN : CHART --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @stack('chart')
    {{--END : CHART  --}}
</head>
<!-- END: Head -->

@yield('body')

</html>