<a href="{{route('admin.animals.create')}}">Создать</a>
@foreach($animals as $animalsItem)
    <p>{{$animalsItem->id}}</p>
    <p>Имя {{$animalsItem->name}}</p>
    <p>Описание {{$animalsItem->description}}</p>
    <p>Тип {{$animalsItem->type->name}}</p>
    <p>Порода {{$animalsItem->breed->name}}</p>
    <div> Болезни:
        @foreach($animalsItem->disease AS $diseaseItem)
           <p>{{$diseaseItem->name}}</p>
        @endforeach
    </div>
    <div> Прививки:
        @foreach($animalsItem->inoculation AS $inoculationItem)
            <p>{{$inoculationItem->name}}</p>
        @endforeach
    </div>
    <p>{{$animalsItem->treatment_of_parasites}}</p>
    <p>{{$animalsItem->birthday_at}}</p>
    <div> Фото:
        @foreach($animalsItem->images AS $imagesItem)
            <img src="{{$imagesItem->path}}" alt="#">
        @endforeach
    </div>
    <a href="{{route('admin.animals.edit', ['animal' => $animalsItem])}}">Редактировать</a>
    <hr>
@endforeach
