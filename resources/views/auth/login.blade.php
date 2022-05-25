<x-layout>
    <x-slot name="title">
        {{ __('auth.login') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('login') }}">
        <x-input name="email" type="email" label="{{ __('auth.email') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('auth.pass') }}" required />
        <div class="mb-3">
            <x-input type="checkbox" name="remember" id="remember" label="{{ __('auth.remember_me') }}" value="1" />
        </div>

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('auth.login') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                        {{ __('auth.forgot_pass') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
