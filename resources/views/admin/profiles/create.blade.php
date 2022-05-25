<x-layout>
    <x-slot name="title">
        Создание профиля
    </x-slot>

    <x-errors />

    <x-form action="{{ route('admin.profiles.store') }}" method="POST" enctype="multipart/form-data">
        <x-select name="user_id" label="Пользователь" :options="$users" required />
        </select>
        <x-input type="tel" name="phone" label="Номер телефона" required />
        <x-input name="name" label="Имя" required />
        <x-input name="surname" label="Фамилия" required />
        <x-textarea name="description" label="Обо мне" required>{{old('description')}}</x-textarea>
        <x-input name="address" label="Домашний адрес" required />
        <x-input type="date" name="birthday_at" label="Дата рождения" required />
        <x-input type="file" name="avatar" label="Аватарка" accept=".jpg, .jpeg, .png" required />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
