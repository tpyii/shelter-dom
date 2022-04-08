<x-layout>
    <x-slot name="title">
        {{ __('Verify Your Email Address') }}
    </x-slot>

    @if (session('resent'))
        <x-alert type="success">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </x-alert>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <x-form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        <x-button type="submit" class="btn-link p-0 m-0 align-baseline">
            {{ __('click here to request another') }}
        </x-button>.
    </x-form>
</x-layout>
