<x-layout>
    <x-slot name="title">
        {{ __('Сбросить парль') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('password.update') }}">
        <x-input type="hidden" name="token" value="{{ $token }}" />
        <x-input name="email" type="email" value="{{ $email }}" label="{{ __('Адрес электронной почты') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('Пароль') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('Подтвердить пароль') }}" required />
        <x-button type="submit" color="primary">
            {{ __('Сбросить пароль') }}
        </x-button>
    </x-form>
</x-layout>
