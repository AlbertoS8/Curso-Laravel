<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-gray-900" >
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div style="color: aliceblue">
            <div class="container px-80">
                <div class="card card-black mt-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
