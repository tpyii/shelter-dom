@foreach($diseases as $diseasesItem)
    <p>{{$diseasesItem->id}}</p>
    <p>{{$diseasesItem->name}}</p>
    <a href="{{ route('admin.diseases.edit', ['disease' => $diseasesItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.diseases.destroy', ['disease' => $diseasesItem->id])}}">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <hr>
@endforeach
<a href="{{route('admin.diseases.create')}}">Создать</a>
