<x-layout>
    <x-slot name="title">
        Animals
    </x-slot>

    <x-slot name="toolbar">
        @if (Route::has('admin.animals.create'))
            <a href="{{ route('admin.animals.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        @endif
    </x-slot>

    <x-form method="GET" action="{{ route('admin.animals.index') }}" enctype="multipart/form-data" class="w-25">
        @if($searchParams)
            @if(array_key_exists('name',$searchParams))
                <x-input name="name" label="Имя" value="{{ $searchParams['name'] }}"/>
            @else
                <x-input name="name" label="Имя" value=""/>
            @endif
            @if(array_key_exists('type_id',$searchParams))
                <x-select name="type_id" label="Тип" :options="$animal_types" value="{{ $searchParams['type_id'] }}"/>
            @else
                <x-select name="type_id" label="Тип" :options="$animal_types" value=""/>
            @endif
            @if(array_key_exists('breed_id',$searchParams))
                <x-select name="breed_id" label="Порода" :options="$breeds" value="{{ $searchParams['breed_id'] }}"/>
            @else
                <x-select name="breed_id" label="Порода" :options="$breeds" value=""/>
            @endif
        @else
            <x-input name="name" label="Имя" value=""/>
            <x-select name="type_id" label="Тип" :options="$animal_types" value=""/>
            <x-select name="breed_id" label="Порода" :options="$breeds" value=""/>
        @endif
        {{--        <div class="mb-3">--}}
        {{--            <x-label for="inp1">Паразиты</x-label>--}}
        {{--            <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" />--}}
        {{--            <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" />--}}
        {{--        </div>--}}
        {{--        <x-select name="diseases[]" label="Diseases" :options="$diseases" multiple />--}}
        {{--        <x-select name="inoculations[]" label="Inoculations" :options="$inoculations" multiple />--}}
        {{--        <x-input type="date" name="birthday_at" label="Birthday" value="{{ old('birthday_at') }}" />--}}
        <x-button type="submit" color="outline-success mb-4">Search</x-button>
    </x-form>


    <x-success/>

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Breed</th>
            <th>Diseases</th>
            <th>Inoculations</th>
            <th>Parasites</th>
            <th>Birthday</th>
            <th>Images</th>
            <th></th>
        </x-slot>
        @foreach($animals as $animalsItem)
            <tr id="{{$animalsItem->id}}">
                <td>{{$animalsItem->id}}</td>
                <td>{{$animalsItem->name}}</td>
                <td>{{$animalsItem->description}}</td>
                <td>{{$animalsItem->type->name}}</td>
                <td>{{$animalsItem->breed->name}}</td>
                <td>
                    @foreach($animalsItem->disease AS $diseaseItem)
                        <p>{{$diseaseItem->name}}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($animalsItem->inoculation AS $inoculationItem)
                        <p>{{$inoculationItem->name}}</p>
                    @endforeach
                </td>
                <td>{{$animalsItem->treatment_of_parasites}}</td>
                <td>{{$animalsItem->birthday_at}}</td>
                <td>
                    @foreach($animalsItem->images AS $imagesItem)
                        <img src="{{Storage::disk('public')->url($imagesItem->path)}}" alt="#"
                             style="max-width: 100px; height: auto">
                    @endforeach
                </td>
                <td>
                    <a href="{{route('admin.animals.edit', ['animal' => $animalsItem])}}">
                        <x-button type="submit" color="outline-info" class="mb-2">Редактировать</x-button>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#Modal{{$animalsItem->id}}">
                        Удалить
                    </button>
                    <div class="modal fade" id="Modal{{$animalsItem->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm deleting</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b>Confirm deleting record №{{$animalsItem->id}}</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary delete"
                                            data-id="{{$animalsItem->id}}" data-bs-dismiss="modal">Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    @if(method_exists($animals, 'links'))
        {{$animals->links()}}
    @endif
    <script type="text/javascript">
        let deleteButtons = document.querySelectorAll('.delete');
        deleteButtons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                send('/admin/animals/' + id)
                document.getElementById(id).remove();
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok
        }
    </script>
</x-layout>
