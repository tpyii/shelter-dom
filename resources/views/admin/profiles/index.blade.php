<x-layout>
    <x-slot name="title">
        Профили
    </x-slot>

    <x-slot name="toolbar">
        <x-button class="me-2" color="outline-secondary" data-bs-toggle="modal" data-bs-target="#filter">
            Фильтры
        </x-button>
        @if (Route::has('admin.profiles.create'))
            <a href="{{ route('admin.profiles.create') }}" class="btn btn-sm btn-outline-success">Создать</a>
        @endif
    </x-slot>

    <x-success />

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Пользователь</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>"Обо мне"</th>
            <th>Адрес проживания</th>
            <th>Дата рождения</th>
            <th>Номер телефона</th>
            <th>Аватарка</th>
            <th style="width: 0px"></th>
        </x-slot>
        @foreach($profiles as $profile)
            <tr id="row-{{ $profile->id }}">
                <td>{{ $profile->id }}</td>
                <td>{{ $profile->user->name }}</td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->surname }}</td>
                <td>{{ $profile->description }}</td>
                <td>{{ $profile->address }}</td>
                <td>{{ $profile->birthday_at }}</td>
                <td>{{ $profile->phone }}</td>
                <td><img src="{{ Storage::url($profile->avatar) }}" alt="#" style="max-width: 100px; height: auto"></td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-sm me-2"
                           href="{{ route('admin.profiles.edit', $profile) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-fill"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <x-button color="outline-danger" class="showDeleteModal"
                                  data-action="{{ route('admin.profiles.destroy', $profile) }}"
                                  data-remove="#row-{{ $profile->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-lg"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                <path fill-rule="evenodd"
                                      d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                            </svg>
                        </x-button>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>

    {{ $profiles->links() }}

    <x-modal id="filter" title="Фильтры">
        <x-form action="{{ route('admin.profiles.index') }}">
            <x-input name="name" label="Имя" value="{{ request('name') }}" />
            <x-input name="surname" label="Фамилия" value="{{ request('surname') }}" />
            <x-select name="user_id" label="Пользователь" :options="$users" value="{{ request('user_id') }}" />
            <x-select name="age" label="Возраст" :options="$ages" value="{{ request('age') }}" />
            <x-input name="address" label="Домашний адрес" value="{{ request('address') }}" />
            <x-input type="tel" name="phone" label="Номер телефона" value="{{ request('phone') }}" />
        </x-form>
        <x-slot name="footer">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.profiles.index') }}">Сбросить</a>
            <x-button type="submit" color="primary">Применить</x-button>
        </x-slot>
    </x-modal>

    <x-modal id="delete" title="Подтвердите удаление">
        <b>Подтвердите удаление записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
