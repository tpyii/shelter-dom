<x-layout>
    <x-slot name="title">
        Diseases
    </x-slot>

    <x-slot name="toolbar">
        @if (Route::has('admin.diseases.create'))
            <a href="{{ route('admin.diseases.create') }}" class="btn btn-sm btn-outline-success">Create</a>
        @endif
    </x-slot>

    <x-success/>

    <x-table>
        <x-slot name="header">
            <th>#</th>
            <th>Name</th>
            <th></th>
        </x-slot>
        @foreach($diseases as $diseasesItem)
            <tr id="{{$diseasesItem->id}}">
                <td>{{ $diseasesItem->id }}</td>
                <td>{{ $diseasesItem->name }}</td>
                <td>
                    <a href="{{ route('admin.diseases.edit', ['disease' => $diseasesItem->id]) }}">
                        <x-button type="submit" color="outline-info" class="mb-2">Редактировать</x-button>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#Modal{{$diseasesItem->id}}">
                        Удалить
                    </button>
                    <div class="modal fade" id="Modal{{$diseasesItem->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirm deleting</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b>Confirm deleting record №{{$diseasesItem->id}}</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-primary delete"
                                            data-id="{{$diseasesItem->id}}" data-bs-dismiss="modal">Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    {{$diseases->links()}}
    <script type="text/javascript">
        let deleteButtons = document.querySelectorAll('.delete');
        deleteButtons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                send('/admin/diseases/' + id)
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
