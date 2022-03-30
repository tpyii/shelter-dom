<x-layout>
  <x-slot name="title">
    Inoculations
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.inoculations.create'))
      <a href="{{ route('admin.inoculations.create') }}" class="btn btn-sm btn-outline-success">Create</a>
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
@foreach($inoculations as $inoculationsItem)
      <tr>
        <td>{{$inoculationsItem->id}}</td>
        <td>{{$inoculationsItem->name}}</td>
        <td>
    <a href="{{ route('admin.inoculations.edit', ['inoculation' => $inoculationsItem->id]) }}">Редактировать</a>
    <form method="post" action="{{ route('admin.inoculations.destroy', ['inoculation' => $inoculationsItem->id])}}">
        @csrf
        @method('delete')
        <x-button type="submit" color="outline-danger" class="btn-sm">Удалить</x-button>
    </form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
