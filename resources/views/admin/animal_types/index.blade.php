<x-layout>
  <x-slot name="title">
    Types
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.animal_types.create'))
      <a href="{{ route('admin.animal_types.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

  <x-success />

  <x-table>
    <x-slot name="header">
      <th>#</th>
      <th>Name</th>
      <th></th>
    </x-slot>
@foreach($animal_types as $animal_typesItem)
      <tr>
        <td>{{$animal_typesItem->id}}</td>
        <td>{{$animal_typesItem->name}}</td>
        <td>
    <a href="{{ route('admin.animal_types.edit', ['animal_type' => $animal_typesItem->id]) }}">Редактировать</a>
    <x-form method="POST" action="{{ route('admin.animal_types.destroy', $animal_typesItem) }}">
        @method('DELETE')
        <x-button type="submit" color="outline-danger">Удалить</x-button>
    </x-form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
