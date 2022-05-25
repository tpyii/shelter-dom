<x-layout>
    <x-slot name="title">
        {{ __('auth.reset_pass') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('password.update') }}">
        <x-input type="hidden" name="token" value="{{ $token }}" />
        <x-input name="email" type="email" value="{{ $email }}" label="{{ __('auth.email') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('auth.pass') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('auth.confirm_pass') }}" required />
        <x-button type="submit" color="primary">
            {{ __('auth.reset_pass') }}
        </x-button>
    </x-form>
</x-layout>
