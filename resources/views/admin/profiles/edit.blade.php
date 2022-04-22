<x-layout>
    <x-slot name="title">
        Редактирование профиля
    </x-slot>

    <x-errors />

    <x-alert type="danger" class="alert-ajax d-none">Ошибка при удалении Аватарки</x-alert>

    <x-form action="{{ route('admin.profiles.update', $profile) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <x-input type="tel" name="phone" label="Номер телефона" value="{{ $profile->phone }}" required />
        <x-input name="name" label="Имя" value="{{ $profile->name }}" required />
        <x-input name="surname" label="Фамилия" value="{{ $profile->surname }}" required />
        <x-textarea name="description" label="Обо мне" required>{{ $profile->description }}</x-textarea>
        <x-input name="address" label="Домашний адрес" value="{{ $profile->address }}" required />
        <x-input type="date" name="birthday_at" label="Дата рождения" value="{{ $profile->birthday_at }}" required />
        @if(Storage::disk('public')->exists($profile->avatar))
            <div class="mb-3" id="image-{{ $profile->id }}">
                <div class="d-inline-block">
                    <img src="{{ Storage::url($profile->avatar) }}" alt="#" style="max-width: 100px; height: auto">
                    <x-button color="outline-danger" class="showDeleteModal" data-action="{{ route('admin.avatar.destroy', $profile) }}" data-remove="#image-{{ $profile->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                    d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd"
                                    d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg>
                    </x-button>
                </div>
            </div>
        @endif
        <x-input type="file" name="avatar" label="Аватарка" accept=".jpg, .jpeg, .png" />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>

    <x-modal id="delete" title="Подтвердить удаление">
        <b>Подтвердить уделание записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
