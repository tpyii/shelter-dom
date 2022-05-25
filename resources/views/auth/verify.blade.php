<x-layout>
    <x-slot name="title">
        {{ __('auth.verify_email') }}
    </x-slot>

    @if (session('resent'))
        <x-alert type="success">
            {{ __('auth.fresh_link') }}
        </x-alert>
    @endif

    {{ __('auth.check_email') }}
    {{ __('auth.not_receive') }},
    <x-form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        <x-button type="submit" class="btn-link p-0 m-0 align-baseline">
            {{ __('auth.request_another') }}
        </x-button>.
    </x-form>
</x-layout>
