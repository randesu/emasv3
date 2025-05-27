<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://raw.githubusercontent.com/SantriKoding-com/assets-food-store/refs/heads/main/images/logo.png" type="image/x-icon">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Food Store">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta content="@yield('title')" property="og:title">
    <meta content="@yield('description')" property="og:description">
    <meta content="@yield('image')" property="og:image">
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/c88cf729d4.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
     {{-- <x-menus.header /> --}}
    @livewireStyles
    @vite(['resources/css/app.css'])
    <style>
    .text-truncate-multiline {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2; /* Ubah ke 3 jika ingin maksimal 3 baris */
    }
</style>
</head>
<body>
    
    {{-- <livewire:web.home.header/> --}}
    @if (!Request::is('login') && !Request::is('register'))
    <livewire:web.home.header />
    @endif
   

    <!-- render content -->
    {{ $slot }}
    <!-- end render content -->

    @if (!Request::is('login') && !Request::is('register'))
    <x-menus.wangsaff />
    <x-menus.bottom />
    @endif
{{-- <x-menus.wangsaff />
    <x-menus.bottom /> --}}
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @livewireScripts
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('info'))
            toastr.info('{{ session('info') }}', 'INFO!');
        @elseif(session()->has('warning'))
            toastr.warning('{{ session('warning') }}', 'PERINGATAN!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>
</body>
</html>