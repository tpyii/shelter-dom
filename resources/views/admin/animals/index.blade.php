<x-layout>
    <x-slot name="title">
        Животные
    </x-slot>

    <x-slot name="toolbar">
        <x-button class="me-2" color="outline-secondary" data-bs-toggle="modal" data-bs-target="#filter">
            Фильтры
        </x-button>

        @if (Route::has('admin.animals.create'))
            <a href="{{ route('admin.animals.create') }}" class="btn btn-sm btn-outline-success">Создать</a>
        @endif
    </x-slot>

    <x-success/>

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Кличка</th>
            <th>Описание</th>
            <th>Тип</th>
            <th>Порода</th>
            <th>Болезни</th>
            <th>Прививки</th>
            <th>Паразиты</th>
            <th>День рождения</th>
            <th>Фотографии</th>
            <th style="width: 0px"></th>
        </x-slot>
        @foreach($animals as $animal)
            <tr id="row-{{ $animal->id }}">
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->description }}</td>
                <td>{{ $animal->type->name }}</td>
                <td>{{ $animal->breed->name }}</td>
                <td>
                    @foreach($animal->disease AS $disease)
                        <p>{{ $disease->name }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($animal->inoculation AS $inoculation)
                        <p>{{ $inoculation->name }}</p>
                    @endforeach
                </td>
                <td>{{ $animal->treatment_of_parasites }}</td>
                <td>{{ $animal->birthday_at }}</td>
                <td>
                    @foreach($animal->images AS $image)
                        <img src="{{ Storage::url($image->path) }}" alt="#"
                             style="max-width: 100px; height: auto">
                    @endforeach
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-sm me-2"
                           href="{{ route('admin.animals.edit', $animal) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path
                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <x-button color="outline-danger" class="showDeleteModal me-2"
                                  data-action="{{ route('admin.animals.destroy', $animal) }}"
                                  data-remove="#row-{{ $animal->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                <path fill-rule="evenodd"
                                      d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                            </svg>
                        </x-button>
                        <x-form method="POST" action="{{ route('user.favourite_animals.store') }}">
                            <input type="hidden" name="id" value="{{ $animal->id }}">
                            <x-button type="submit" color="outline-danger" class="btn btn-outline-primary btn-sm me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                </svg>
                            </x-button>
                        </x-form>
                        <x-button id="heart-{{ $animal->id }}" color="outline-danger" class="showDeleteModal"
                                  data-action="{{ route('user.favourite_animals.destroy', $animal) }}"
                                  data-remove="#heart-{{ $animal->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8.931.586 7 3l1.5 4-2 3L8 15C22.534 5.396 13.757-2.21 8.931.586ZM7.358.77 5.5 3 7 7l-1.5 3 1.815 4.537C-6.533 4.96 2.685-2.467 7.358.77Z"/>
                            </svg>
                        </x-button>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>

    {{ $animals->links() }}

    <x-modal id="filter" title="Фильтры">
        <x-form action="{{ route('admin.animals.index') }}">
            <x-input name="name" label="Кличка" value="{{ request('name') }}" />
            <x-select name="type_id" label="Тип" :options="$animal_types" value="{{ request('type_id') }}" />
            <x-select name="breed_id" label="Порода" :options="$breeds" value="{{ request('breed_id') }}" />
            <x-select name="age" label="Возраст" :options="$ages" value="{{ request('age') }}" />
            <x-select name="diseases[]" label="Болезни" id="diseases" :options="$diseases" :value="request('diseases', [])" multiple />
            <x-select name="inoculations[]" label="Прививки" :options="$inoculations" :value="request('inoculations', [])" multiple />
            <div class="mb-3">
                <x-label for="inp1">Паразиты</x-label>
                <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" checked="{{ request('treatment_of_parasites') }}"/>
                <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" checked="{{ request('treatment_of_parasites') }}"/>
            </div>
        </x-form>
        <x-slot name="footer">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.animals.index') }}">Сбросить</a>
            <x-button type="submit" color="primary">Применить</x-button>
        </x-slot>
    </x-modal>

    <x-modal id="delete" title="Подтвердить удаление">
        <b>Подтвердить удаление записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
