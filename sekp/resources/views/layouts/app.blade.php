<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SEKP')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body style="background-color:#f6f7fb">

<div class="d-flex">

    {{-- SIDEBAR GLOBAL --}}
    @include('layouts.navigation')

    {{-- CONTENT --}}
    <div class="flex-grow-1">

        {{-- TOPBAR GLOBAL --}}
        <nav class="navbar px-4" style="background-color:#11b3b3">
            <button class="btn text-white">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="ms-auto text-white fw-semibold">
                <i class="fa-solid fa-user-circle me-1"></i>
                Mustafiq, Admin
            </div>
        </nav>

        <main class="p-4">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
