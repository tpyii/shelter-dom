<x-layout>
    <x-slot name="title">
        {{ __('auth.reset_pass') }}
    </x-slot>

    <x-errors />

    @if (session('status'))
        <x-alert type="success">
            {{ session('status') }}
        </x-alert>
    @endif

    <x-form method="POST" action="{{ route('password.email') }}">
        <x-input name="email" type="email" label="{{ __('auth.email') }}" required autofocus />
        <x-button type="submit" color="primary">
            {{ __('auth.send_reset_link') }}
        </x-button>
    </x-form>
</x-layout>
