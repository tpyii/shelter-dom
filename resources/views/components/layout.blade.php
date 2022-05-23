<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/dashboard.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<x-header/>

<div class="container-fluid">
    <div class="row">
        
        <x-sidebar />

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ $title }}</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    {{ $toolbar ?? '' }}
                </div>
            </div>

        {{ $slot }}

    </div>
    </main>
</div>
</div>

<!-- Js -->
<script src="{{ mix('js/bootstrap.js') }}"></script>
</body>
</html>
