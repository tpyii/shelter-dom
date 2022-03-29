@foreach($types as $typesItem)
    <p>{{$typesItem->id}}</p>
    <p>{{$typesItem->name}}</p>
    <a href="{{ route('admin.types.edit', ['type' => $typesItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.types.destroy', ['type' => $typesItem->id])}}">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <hr>
@endforeach
<a href="{{route('admin.types.create')}}">Создать</a>
