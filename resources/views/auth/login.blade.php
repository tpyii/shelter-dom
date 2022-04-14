<x-layout>
    <x-slot name="title">
        {{ __('Войти') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('login') }}">
        <x-input name="email" type="email" label="{{ __('Адрес электронной почты') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('Пароль') }}" required />
        <div class="mb-3">
            <x-input type="checkbox" name="remember" id="remember" label="{{ __('Запомнить меня') }}" value="1" />
        </div>

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('Войти') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
