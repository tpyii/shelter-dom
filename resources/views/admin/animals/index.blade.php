<x-layout>
    <x-slot name="title">
        Animals
    </x-slot>

    <x-slot name="toolbar">
        <x-button class="me-2" color="outline-secondary" data-bs-toggle="modal" data-bs-target="#filter">
            Filter
        </x-button>

        @if (Route::has('admin.animals.create'))
            <a href="{{ route('admin.animals.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        @endif
    </x-slot>

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
            <th style="width: 0px"></th>
        </x-slot>
        @foreach($animals as $animalsItem)
            <tr>
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
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-sm me-2" href="{{route('admin.animals.edit', ['animal' => $animalsItem])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                        <x-form method="POST" action="{{ route('admin.animals.destroy', $animalsItem) }}">
                            @method('DELETE')
                            <x-button type="submit" color="outline-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                </svg>
                            </x-button>
                        </x-form>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    @if(method_exists($animals, 'links'))
        {{$animals->links()}}
    @endif

    <x-modal id="filter" title="Filter">
        <x-form action="{{ route('admin.animals.index') }}">
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
        </x-form>
        <x-slot name="footer">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.animals.index') }}">Reset</a>
            <x-button type="submit" color="primary">Apply</x-button>
        </x-slot>
    </x-modal>
</x-layout>
