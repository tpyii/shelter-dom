<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">

            @if(auth()->check())
                <x-nav-link href="user.about_me.index" route="user.about_me.*">Обо мне</x-nav-link>
                <x-nav-link href="user.favourite_animals.index" route="user.favourite_animals.*">Мои любимчики</x-nav-link>
                <x-nav-link href="user.donations.index" route="user.donations.*">Пожертвования</x-nav-link>
                <x-nav-link href="user.requests.index" route="user.requests.*">Заявки</x-nav-link>
                <x-nav-link href="user.comments.index" route="user.comments.*">Мои комментарии</x-nav-link>
                @if(auth()->user()->is_admin)
                    <hr>
                    <x-nav-link href="admin.dashboard" route="admin.dashboard">Дэшборд</x-nav-link>
                    <x-nav-link href="admin.animals.index" route="admin.animals.*">Животные</x-nav-link>
                    <x-nav-link href="admin.breeds.index" route="admin.breeds.*">Породы</x-nav-link>
                    <x-nav-link href="admin.animal_types.index" route="admin.animal_types.*">Типы</x-nav-link>
                    <x-nav-link href="admin.diseases.index" route="admin.diseases.*">Болезни</x-nav-link>
                    <x-nav-link href="admin.inoculations.index" route="admin.inoculations.*">Прививки</x-nav-link>
                    <x-nav-link href="admin.users.index" route="admin.users.*">Пользователи</x-nav-link>
                    <x-nav-link href="admin.profiles.index" route="admin.profiles.*">Профили</x-nav-link>
                @endif
                <li class="nav-item d-block d-md-none">
                    <x-form method="POST" action="{{ route('logout') }}">
                        <x-button type="submit" class="nav-link px-3" color="link">Выйти</x-button>
                    </x-form>
                </li>
            @else
                <x-nav-link href="login" route="login">{{ __('auth.login') }}</x-nav-link>
                <x-nav-link href="register" route="register">{{ __('auth.registration') }}</x-nav-link>
            @endif

        </ul>
    </div>
</nav>
