<x-layout>
  <x-slot name="title">
    Breeds
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.breeds.create'))
      <a href="{{ route('admin.breeds.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

  @if (session('success'))
    <x-alert type="success">
      {{ session('success') }}
    </x-alert>
  @endif

  <x-table>
    <x-slot name="header">
      <th>#</th>
      <th>Type</th>
      <th>Breed</th>
      <th></th>
    </x-slot>
@foreach($breeds as $breedsItem)
      <tr>
        <td>{{$breedsItem->id}}</td>
        <td>{{$animal_type::find($breedsItem->type_id)->name}}</td>
        <td>{{$breedsItem->name}}</td>
        <td>
    <a href="{{ route('admin.breeds.edit', ['breed' => $breedsItem->id]) }}">Редактировать</a>
    <x-form method="POST" action="{{ route('admin.breeds.destroy', $breedsItem) }}">
        @method('DELETE')
        <x-button type="submit" color="outline-danger" class="btn-sm">Удалить</x-button>
    </x-form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
