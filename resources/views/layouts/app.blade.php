<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-nunito antialiased" x-data="{
        sidebarOpen: window.innerWidth >= 768,
        isMobile: window.innerWidth < 768
    }" x-init="
        window.addEventListener('resize', () => {
            isMobile = window.innerWidth < 768;
            // Cierra el sidebar en móvil al cambiar a desktop si estaba abierto
            if (!isMobile && !sidebarOpen) sidebarOpen = true;
        });
    ">
        <div class="h-screen bg-gray-100">
            <x-header/>
            <div class="h-[92vh] flex">
                @include('layouts.navigation')

            <!-- Page Content -->
            <main class="md:ml-64 transition-all duration-300" :class="{ 'ml-0': !sidebarOpen || isMobile }">
                {{ $slot }}
            </main>
            </div>
        </div>
    </body>
</html>
