<x-layout>
    <x-slot name="title">
        Мои любимчики
    </x-slot>
    
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
{{--                        <a class="btn btn-outline-primary btn-sm me-2"--}}
{{--                           href="{{ route('admin.animals.edit', $animal) }}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                 class="bi bi-pencil-fill" viewBox="0 0 16 16">--}}
{{--                                <path--}}
{{--                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
                        <x-button color="outline-danger" class="showDeleteModal"
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
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
</x-layout>
