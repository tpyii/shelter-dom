<x-layout>
    <x-slot name="title">
        Мои любимчики
    </x-slot>

    <x-success />

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
        <div class='row mb-5'>
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
                            <x-button color="outline-danger" class="showDeleteModal"
                                      data-action="{{ route('user.favourite_animals.destroy', $animal) }}"
                                      data-remove="#row-{{ $animal->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-x-lg" viewBox="0 0 16 16">
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
        </div>
    </x-table>
    <x-modal id="delete" title="Подтвердить удаление">
        <b>Подтвердить удаление записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
