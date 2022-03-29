@foreach($breeds as $breedsItem)
    <p>{{$breedsItem->id}}</p>
    <p>{{$animal_type::find($breedsItem->type_id)->name}}</p>
    <p>{{$breedsItem->name}}</p>
    <a href="{{ route('admin.breeds.edit', ['breed' => $breedsItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.breeds.destroy', ['breed' => $breedsItem->id])}}">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <hr>
@endforeach
<a href="{{route('admin.breeds.create')}}">Создать</a>
