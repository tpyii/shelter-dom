<x-layout>
  <x-slot name="title">
    Breeds
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.breeds.create'))
      <a href="{{ route('admin.breeds.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

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
</x-layout>
