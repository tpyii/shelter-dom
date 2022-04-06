<x-layout>
    <x-slot name="title">
        {{ __('Confirm Password') }}
    </x-slot>

    <x-errors />

    {{ __('Please confirm your password before continuing.') }}

    <x-form method="POST" action="{{ route('password.confirm') }}">
        <x-input name="password" type="password" label="{{ __('Password') }}" required />

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('Confirm Password') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
