<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.png') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KTA Persatuan Purnawirawan Angkatan Laut">
    <meta name="keywords" content="persatuan purnawirawan angkatan laut, ppal, kta, kartu tanda anggota">
    <meta name="author" content="FATMUH">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
