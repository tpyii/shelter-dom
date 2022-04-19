<x-layout>
    <x-slot name="title">
        Редактирование пользователя
    </x-slot>

    <x-errors />

    <x-form action="{{ route('admin.users.update', $user) }}" method="POST">
        @method('PUT')
        <x-input type="text" name="name" label="Имя" value="{{ $user->name }}" required />
        <x-input type="email" name="email" label="Почта" value="{{ $user->email }}" required />
        <div class="mb-3">
            <x-label for="inp1">Является админом *</x-label>
            <x-input type="radio" name="is_admin" id="inp1" value="1" label="Да" checked="{{ $user->is_admin }}" />
            <x-input type="radio" name="is_admin" id="inp2" value="0" label="Нет" checked="{{ $user->is_admin }}" />
        </div>
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
