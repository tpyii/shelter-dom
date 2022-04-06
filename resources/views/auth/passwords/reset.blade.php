<x-layout>
    <x-slot name="title">
        {{ __('Reset Password') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('password.update') }}">
        <x-input type="hidden" name="token" value="{{ $token }}" />
        <x-input name="email" type="email" value="{{ $email }}" label="{{ __('Email Address') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('Password') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('Confirm Password') }}" required />
        <x-button type="submit" color="primary">
            {{ __('Reset Password') }}
        </x-button>
    </x-form>
</x-layout>
