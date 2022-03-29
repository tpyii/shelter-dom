<a href="{{route('admin.animals.create')}}">Создать</a>
@foreach($animals as $animalsItem)
    <p>{{$animalsItem->id}}</p>
    <p>Имя {{$animalsItem->name}}</p>
    <p>{{$animalsItem->description}}</p>
    <p>{{$animalsItem->treatment_of_parasites}}</p>
    <p>{{$animalsItem->birthday_at}}</p>
    <hr>
@endforeach
