@foreach($animal_types as $animal_typesItem)
    <p>{{$animal_typesItem->id}}</p>
    <p>{{$animal_typesItem->name}}</p>
    <a href="{{ route('admin.animal_types.edit', ['animal_type' => $animal_typesItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.animal_types.destroy', ['animal_type' => $animal_typesItem->id])}}">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <hr>
@endforeach
<a href="{{route('admin.animal_types.create')}}">Создать</a>
