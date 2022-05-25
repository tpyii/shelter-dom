<x-layout>
    <x-slot name="title">
        Редактирование животного
    </x-slot>

    <x-errors/>

    <x-alert type="danger" class="alert-ajax d-none">Ошибка при удалении Изображения</x-alert>

    <x-form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data">
        @method('PUT')
        <x-select name="type_id" label="Тип" :options="$animal_types" :value="$animal->type_id" required />
        <x-select name="breed_id" label="Порода" :options="$breeds" :value="$animal->breed_id" required />
        <x-input name="name" label="Кличка" value="{{ $animal->name }}" required />
        <x-textarea name="description" label="Описание" required>{{ $animal->description }}</x-textarea>
        <div class="mb-3">
            <x-label for="inp1">Паразиты *</x-label>
            <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да"
                     :checked="$animal->treatment_of_parasites"/>
            <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет"
                     :checked="$animal->treatment_of_parasites"/>
        </div>
        <x-select name="diseases[]" label="Болезни" id="diseases" :options="$diseases" :value="$animal->disease"
                  multiple/>
        <x-select name="inoculations[]" label="Прививки" :options="$inoculations" :value="$animal->inoculation"
                  multiple/>
        <x-input type="date" name="birthday_at" label="День рождения" value="{{ $animal->birthday_at }}" required />
        <div class="mb-3">
            @foreach($images AS $image)
                <div class="d-inline-block" id="image-{{ $image->id }}">
                    <img src="{{ Storage::url($image->path) }}" alt="#" style="max-width: 100px; height: auto">
                    <x-button color="outline-danger" class="showDeleteModal" data-action="{{ route('admin.images.destroy', $image) }}" data-remove="#image-{{ $image->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                    d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd"
                                    d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg>
                    </x-button>
                </div>
            @endforeach
        </div>
        <x-input type="file" name="files[]" label="Изображение" accept=".jpg, .jpeg, .png" multiple />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>

    <x-modal id="delete" title="Подтвердить удаление">
        <b>Подтвердить уделание записи</b>
        <x-slot name="footer">
            <x-button color="secondary" data-bs-dismiss="modal">Закрыть</x-button>
            <x-button color="primary" class="delete" data-bs-dismiss="modal">Удалить</x-button>
        </x-slot>
    </x-modal>
</x-layout>
