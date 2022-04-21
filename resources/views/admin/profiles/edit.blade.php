<x-layout>
    <x-slot name="title">
        Редактирование профиля
    </x-slot>

    <x-errors />

    <x-form action="{{ route('admin.profiles.update', $profile) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <x-input type="tel" name="phone" label="Номер телефона" value="{{ $profile->phone }}" required />
        <x-input name="name" label="Имя" value="{{ $profile->name }}" required />
        <x-input name="surname" label="Фамилия" value="{{ $profile->surname }}" required />
        <x-textarea name="description" label="Обо мне" required>{{ $profile->description }}</x-textarea>
        <x-input name="address" label="Домашний адрес" value="{{ $profile->address }}" required />
        <x-input type="date" name="birthday_at" label="Дата рождения" value="{{ $profile->birthday_at }}" required />
        @if(Storage::disk('public')->exists($profile->avatar))
            <div class="mb-3">
                <img src="{{ Storage::url($profile->avatar) }}" alt="#" style="max-width: 100px; height: auto">
            </div>
        @endif
        <x-input type="file" name="avatar" label="Аватарка" accept=".jpg, .jpeg, .png" />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
