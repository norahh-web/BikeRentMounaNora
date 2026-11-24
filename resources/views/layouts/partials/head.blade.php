<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ isset($title) ? trim($title).' · ' : '' }}{{ config('app.name', 'BikeRent') }}</title>

{{-- Favicon --}}
<link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
<meta name="theme-color" content="#221C37">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet">

<!-- Assets (único punto de entrada del proyecto) -->
@vite(['resources/css/app.css', 'resources/js/app.js'])