<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>PetResQ</title>

    <!-- Font Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('petresq/css/style.css') }}?v={{ time() }}">
    @stack('styles')
</head>

<body>

    @include('partials.navbar')

    @yield('content')

    @stack('scripts')

</body>


</html>
