<x-layout>
  <x-slot name="title">
    Animals
  </x-slot>

  <x-slot name="toolbar">
    @if (Route::has('admin.animals.create'))
      <a href="{{ route('admin.animals.create') }}" class="btn btn-sm btn-outline-success">Create</a>
    @endif
  </x-slot>

  <x-success />
  
  <x-table>
    <x-slot name="header">
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Type</th>
      <th>Breed</th>
      <th>Diseases</th>
      <th>Inoculations</th>
      <th>Parasites</th>
      <th>Birthday</th>
      <th>Images</th>
      <th></th>
    </x-slot>
@foreach($animals as $animalsItem)
      <tr>
        <td>{{$animalsItem->id}}</td>
        <td>{{$animalsItem->name}}</td>
        <td>{{$animalsItem->description}}</td>
        <td>{{$animalsItem->type->name}}</td>
        <td>{{$animalsItem->breed->name}}</td>
        <td>
        @foreach($animalsItem->disease AS $diseaseItem)
          <p>{{$diseaseItem->name}}</p>
        @endforeach
        </td>
        <td>
        @foreach($animalsItem->inoculation AS $inoculationItem)
            <p>{{$inoculationItem->name}}</p>
        @endforeach
        </td>
        <td>{{$animalsItem->treatment_of_parasites}}</td>
        <td>{{$animalsItem->birthday_at}}</td>
        <td>
        @foreach($animalsItem->images AS $imagesItem)
            <img src="{{Storage::disk('public')->url($imagesItem->path)}}" alt="#" style="max-width: 100px; height: auto">
        @endforeach
        </td>
        <td>
    <a href="{{route('admin.animals.edit', ['animal' => $animalsItem])}}">Редактировать</a>
        <x-form method="POST" action="{{ route('admin.animals.destroy', $animalsItem) }}">
            @method('DELETE')
            <x-button type="submit" color="outline-danger">Удалить</x-button>
        </x-form>
        </td>
      </tr>
@endforeach
  </x-table>
</x-layout>
