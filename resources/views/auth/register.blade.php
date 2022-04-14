<x-layout>
    <x-slot name="title">
        {{ __('Регистрация') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('register') }}">
        <x-input name="name" label="{{ __('Имя') }}" required autocomplete="name" autofocus />
            <x-input name="email" type="email" label="{{ __('Адрес электронной почты') }}" required />
        <x-input name="password" type="password" label="{{ __('Пароль') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('Подтвердить пароль') }}" required />
        <x-button type="submit" color="primary">
            {{ __('Зарегистрироваться') }}
        </x-button>
    </x-form>
</x-layout>
