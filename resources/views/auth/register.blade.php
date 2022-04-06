<x-layout>
    <x-slot name="title">
        {{ __('Register') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('register') }}">
        <x-input name="name" label="{{ __('Name') }}" required autocomplete="name" autofocus />
        <x-input name="email" type="email" label="{{ __('Email Address') }}" required />
        <x-input name="password" type="password" label="{{ __('Password') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('Confirm Password') }}" required />
        <x-button type="submit" color="primary">
            {{ __('Register') }}
        </x-button>
    </x-form>
</x-layout>
