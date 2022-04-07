<x-layout>
    <x-slot name="title">
        Animals
    </x-slot>

    <x-slot name="toolbar">
        <x-button color="outline-success" data-bs-toggle="modal" data-bs-target="#filter">
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
            <th></th>
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
                    <a href="{{route('admin.animals.edit', ['animal' => $animalsItem])}}">
                        <x-button type="submit" color="outline-info" class="mb-2">Редактировать</x-button>
                    </a>
                    <x-form method="POST" action="{{ route('admin.animals.destroy', $animalsItem) }}">
                        @method('DELETE')
                        <x-button type="submit" color="outline-danger">Удалить</x-button>
                    </x-form>
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
