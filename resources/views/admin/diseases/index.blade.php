<x-layout>
  <x-slot name="title">
    Diseases
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.diseases.create'))
      <a href="{{ route('admin.diseases.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

  <x-success />

  <x-table>
    <x-slot name="header">
      <th>#</th>
      <th>Name</th>
      <th></th>
    </x-slot>
@foreach($diseases as $diseasesItem)
      <tr>
        <td>{{ $diseasesItem->id }}</td>
        <td>{{ $diseasesItem->name }}</td>
        <td>
    <a href="{{ route('admin.diseases.edit', ['disease' => $diseasesItem->id]) }}">Редактировать</a>
    <x-form method="POST" action="{{ route('admin.diseases.destroy', $diseasesItem) }}">
        @method('DELETE')
        <x-button type="submit" color="outline-danger" class="btn-sm">Удалить</x-button>
    </x-form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
