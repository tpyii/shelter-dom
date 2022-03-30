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
</x-layout>
