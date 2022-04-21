<x-layout>
    <x-slot name="title">
        Редактирование профиля
    </x-slot>

    <x-errors />

    <x-form action="{{ route('admin.profiles.update', $profile) }}" method="POST">
        @method('PUT')
        <x-input type="tel" name="phone" label="Номер телефона" value="{{ $profile->phone }}" required />
        <x-input name="name" label="Имя" value="{{ $profile->name }}" required />
        <x-input name="surname" label="Фамилия" value="{{ $profile->surname }}" required />
        <x-textarea name="description" label="Обо мне" required>{{ $profile->description }}</x-textarea>
        <x-input name="address" label="Домашний адрес" value="{{ $profile->address }}" required />
        <x-input type="date" name="birthday_at" label="Дата рождения" value="{{ $profile->birthday_at }}" required />
{{--        <div class="mb-3">--}}
{{--            <div class="d-inline-block" id="image-{{ $image->id }}">--}}
{{--                <img src="{{ Storage::url($image->path) }}" alt="#" style="max-width: 100px; height: auto">--}}
{{--                <x-button color="outline-danger" class="showDeleteModal" data-action="{{ route('admin.images.destroy', $image) }}" data-remove="#image-{{ $image->id }}">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                         class="bi bi-x-lg" viewBox="0 0 16 16">--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>--}}
{{--                        <path fill-rule="evenodd"--}}
{{--                              d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>--}}
{{--                    </svg>--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </div>--}}
        <x-input type="file" name="files[]" label="Изображение" accept=".jpg, .jpeg, .png" required />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
