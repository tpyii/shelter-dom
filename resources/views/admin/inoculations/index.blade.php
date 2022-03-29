@foreach($inoculations as $inoculationsItem)
    <p>{{$inoculationsItem->id}}</p>
    <p>{{$inoculationsItem->name}}</p>
    <a href="{{ route('admin.inoculations.edit', ['inoculation' => $inoculationsItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.inoculations.destroy', ['inoculation' => $inoculationsItem->id])}}">
        @csrf
        @method('delete')
        <button type="submit">Удалить</button>
    </form>
    <hr>
@endforeach
<a href="{{route('admin.inoculations.create')}}">Создать</a>
