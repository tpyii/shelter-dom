<x-layout>
    <x-slot name="title">
        {{ __('Reset Password') }}
    </x-slot>

    <x-errors />

    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    <x-form method="POST" action="{{ route('password.email') }}">
        <x-input name="email" type="email" label="{{ __('Email Address') }}" required autofocus />
        <x-button type="submit" color="primary">
            {{ __('Send Password Reset Link') }}
        </x-button>
    </x-form>
</x-layout>
