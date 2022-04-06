<x-layout>
    <x-slot name="title">
        {{ __('Login') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('login') }}">
        <x-input name="email" type="email" label="{{ __('Email Address') }}" required autofocus />
        <x-input name="password" type="password" label="{{ __('Password') }}" required />
        <div class="mb-3">
            <x-input type="checkbox" name="remember" id="remember" label="{{ __('Remember Me') }}" value="1" />
        </div>

        <div class="row mb-0">
            <div class="col">
                <x-button type="submit" color="primary">
                    {{ __('Login') }}
                </x-button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </x-form>
</x-layout>
