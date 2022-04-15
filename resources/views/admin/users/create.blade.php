<x-layout>
    <x-slot name="title">
        Создание пользователя
    </x-slot>

    <x-errors />

    <x-form action="{{ route('admin.users.store') }}" method="POST">
        <x-input type="text" name="name" label="Имя" required />
        <x-input type="email" name="email" label="Почта" required />
        <x-input type="text" name="password" label="Пароль" required />
        <br>
        <div class="md-3">
            <x-label for="inp1">Является админом</x-label>
            <x-input type="radio" name="is_admin" id="inp1" value="1" label="Да" />
            <x-input type="radio" name="is_admin" id="inp2" value="0" label="Нет" />
        </div>
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
