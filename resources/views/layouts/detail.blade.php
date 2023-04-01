<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />




    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ mix('js/app.js')  }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>
    {{--<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">--}}
    @vite(['resources/css/detail.css', 'resources/js/app.js'])


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-green-50">
        @include('layouts.navigation')
        <!-- Page Content -->
        <main class= "bg-green-50r">
            @yield('content')
        </main>
    </div>
</body>

</html>
