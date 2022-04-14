<x-layout>
    <x-slot name="title">
        {{ __('Сбросить пароль') }}
    </x-slot>

    <x-errors />

    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    <x-form method="POST" action="{{ route('password.email') }}">
        <x-input name="email" type="email" label="{{ __('Адрес электронной почты') }}" required autofocus />
        <x-button type="submit" color="primary">
            {{ __('Отправить ссылку для сброса пароля') }}
        </x-button>
    </x-form>
</x-layout>
