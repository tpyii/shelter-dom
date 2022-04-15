<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<x-header/>

<div class="container-fluid">
    <div class="row">
        <x-sidebar>
            <x-slot name="list">
                @guest
                <x-nav-link href="login" route="login">{{ __('auth.login') }}</x-nav-link>
                <x-nav-link href="register" route="register">{{ __('auth.registration') }}</x-nav-link>
                @else
                <x-nav-link href="user.about_me.index" route="user.about_me">Обо мне</x-nav-link>
                <x-nav-link href="user.favorit_animals.index" route="user.favorit_animals.*">Понравившиеся животные</x-nav-link>
                <x-nav-link href="user.donations.index" route="user.donations.*">Пожертвованные средства</x-nav-link>
                <x-nav-link href="user.requests.index" route="user.requests.*">Заявки</x-nav-link>
                <x-nav-link href="user.comments.index" route="user.comments.*">Мои комментарии</x-nav-link>
                @auth
                    <li class="nav-item d-block d-md-none">
                        <x-form method="POST" action="{{ route('logout') }}">
                            <x-button type="submit" class="nav-link px-3" color="link">Выйти</x-button>
                        </x-form>
                    </li>
                @endauth
            @endguest
            </x-slot>
        </x-sidebar>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
