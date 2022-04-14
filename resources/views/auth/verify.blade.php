<x-layout>
    <x-slot name="title">
        {{ __('Подтвердить пароль') }}
    </x-slot>

    @if (session('resent'))
        <x-alert type="success">
            {{ __('Письмо с ссылкой для подтверждения отправлено на ваш адрес электронной почты') }}
        </x-alert>
    @endif

    {{ __('Перед продолжением, пожалуйста, проверьте свою электронную почту на предмет письма с подтверждением') }}
    {{ __('Если Вы не получили письмо') }},
    <x-form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        <x-button type="submit" class="btn-link p-0 m-0 align-baseline">
            {{ __('кликните сюда, чтобы отправить письмо еще раз') }}
        </x-button>.
    </x-form>
</x-layout>
