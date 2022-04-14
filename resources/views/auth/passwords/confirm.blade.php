<x-layout>
    <x-slot name="title">
        {{ __('Подтвердите пароль') }}
    </x-slot>

    <x-errors />

    {{ __('Пожалуйста, подтвердите свой пароль перед продолжением.') }}

    <x-form method="POST" action="{{ route('password.confirm') }}">
        <x-input name="password" type="password" label="{{ __('Пароль') }}" required />

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('Подтвердить пароль') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
