<x-layout>
    <x-slot name="title">
        {{ __('auth.registration') }}
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('register') }}">
        <input type='hidden' name='recaptcha_token' id='recaptcha_token'>
        <x-input name="name" label="{{ __('auth.name') }}" required autocomplete="name" autofocus />
        <x-input name="email" type="email" label="{{ __('auth.email') }}" required />
        <x-input name="password" type="password" label="{{ __('auth.pass') }}" required />
        <x-input name="password_confirmation" type="password" label="{{ __('auth.confirm_pass') }}" required />

        @if($errors->has('recaptcha_token'))
            {{$errors->first('recaptcha_token')}}
        @endif
        <x-button type="submit" color="primary">
            {{ __('auth.register') }}
        </x-button>
    </x-form>
</x-layout>

<script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_CAPTCHA_PUBLIC_KEY') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('GOOGLE_CAPTCHA_PUBLIC_KEY') }}').then(function(token) {
            document.getElementById("recaptcha_token").value = token;
        }); });

</script>
