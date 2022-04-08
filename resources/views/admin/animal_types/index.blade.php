<x-layout>
    <x-slot name="title">
        Types
    </x-slot>

    <x-slot name="toolbar">
        @if (Route::has('admin.animal_types.create'))
            <a href="{{ route('admin.animal_types.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        @endif
    </x-slot>

    <x-success/>

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Name</th>
            <th></th>
        </x-slot>
        @foreach($animal_types as $animal_typesItem)
            <tr id="{{$animal_typesItem->id}}">
                <td>{{$animal_typesItem->id}}</td>
                <td>{{$animal_typesItem->name}}</td>
                <td>
                    <a href="{{ route('admin.animal_types.edit', ['animal_type' => $animal_typesItem->id]) }}">
                        <x-button type="submit" color="outline-info" class="mb-2">Редактировать</x-button>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#Modal{{$animal_typesItem->id}}">
                        Удалить
                    </button>
                </td>
                <div class="modal fade" id="Modal{{$animal_typesItem->id}}" tabindex="-1"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirm deleting</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <b>Confirm deleting record №{{$animal_typesItem->id}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary delete"
                                        data-id="{{$animal_typesItem->id}}" data-bs-dismiss="modal">Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        @endforeach
    </x-table>
    {{$animal_types->links()}}
    <script type="text/javascript">
        let deleteButtons = document.querySelectorAll('.delete');
        deleteButtons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                send('/admin/animal_types/' + id)
                document.getElementById(id).remove();
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok
        }
    </script>
</x-layout>
