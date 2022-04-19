<x-layout>
    <x-slot name="title">
        Пользователи
    </x-slot>

    <x-slot name="toolbar">
        <x-button class="me-2" color="outline-secondary" data-bs-toggle="modal" data-bs-target="#filter">
            Фильтры
        </x-button>
        @if (Route::has('admin.users.create'))
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-success">Создать</a>
        @endif
    </x-slot>

    <x-success />

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Имя</th>
            <th>Электронная почта</th>
            <th>Является админом</th>
            <th style="width: 0px"></th>
        </x-slot>
        @foreach($users as $user)
            <tr id="row-{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'YES' : 'NO' }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-sm me-2"
                           href="{{ route('admin.users.edit', $user) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-fill"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <x-button color="outline-danger" class="showDeleteModal"
                                  data-action="{{ route('admin.users.destroy', $user) }}"
                                  data-remove="#row-{{ $user->id }}">
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

    {{ $users->links() }}

    <x-modal id="filter" title="Фильтры">
        <x-form action="{{ route('admin.users.index') }}">
            <x-input name="name" label="Имя" value="{{ request('name') }}" />
            <x-input name="email" label="Электронная почта" value="{{ request('email') }}" />
        </x-form>
        <x-slot name="footer">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.users.index') }}">Сбросить</a>
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
