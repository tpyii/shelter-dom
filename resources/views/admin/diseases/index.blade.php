<x-layout>
  <x-slot name="title">
    Diseases
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.diseases.create'))
      <a href="{{ route('admin.diseases.create') }}" class="btn btn-sm btn-outline-success">Create</a>
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
      <th>Name</th>
      <th></th>
    </x-slot>
@foreach($diseases as $diseasesItem)
      <tr>
        <td>{{ $diseasesItem->id }}</td>
        <td>{{ $diseasesItem->name }}</td>
        <td>
    <a href="{{ route('admin.diseases.edit', ['disease' => $diseasesItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.diseases.destroy', ['disease' => $diseasesItem->id])}}">
        @csrf
        @method('delete')
        <x-button type="submit" color="outline-danger" class="btn-sm">Удалить</x-button>
    </form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
