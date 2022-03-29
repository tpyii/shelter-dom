<x-layout>
  <x-slot name="title">
    Types
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.types.create'))
      <a href="{{ route('admin.types.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

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
</x-layout>
