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
      <th style="width: 0px"></th>
    </x-slot>
@foreach($animal_types as $animal_typesItem)
      <tr>
        <td>{{$animal_typesItem->id}}</td>
        <td>{{$animal_typesItem->name}}</td>
        <td>
          <div class="d-flex">
            <a class="btn btn-outline-primary btn-sm me-2" href="{{ route('admin.animal_types.edit', ['animal_type' => $animal_typesItem->id]) }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
              </svg>
            </a>
            <x-form method="POST" action="{{ route('admin.animal_types.destroy', $animal_typesItem) }}">
                @method('DELETE')
                <x-button type="submit" color="outline-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                  </svg>
                </x-button>
            </x-form>
          </div>
        </td>
      </tr>
@endforeach
  </x-table>
    {{$animal_types->links()}}
</x-layout>
