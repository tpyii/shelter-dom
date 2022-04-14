<x-layout>
    <x-slot name="title">
        {{ __('auth.registration') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('register') }}">
        <x-input name="name" label="{{ __('auth.name') }}" required autocomplete="name" autofocus />
        <x-input name="email" type="email" label="{{ __('auth.email') }}" required />
        <x-input name="password" type="password" label="{{ __('auth.pass') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('auth.confirm_pass') }}" required />
        <x-button type="submit" color="primary">
            {{ __('auth.register') }}
        </x-button>
    </x-form>
</x-layout>
