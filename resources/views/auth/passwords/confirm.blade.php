<x-layout>
    <x-slot name="title">
        {{ __('auth.confirm_pass') }}
    </x-slot>

    <x-errors />

    {{ __('auth.please_confirm') }}

    <x-form method="POST" action="{{ route('password.confirm') }}">
        <x-input name="password" type="password" label="{{ __('auth.pass') }}" required />

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('auth.confirm_pass') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('auth.forgot_pass') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
