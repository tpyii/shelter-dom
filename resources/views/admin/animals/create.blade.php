<x-layout>
    <x-slot name="title">
        Создание животного
    </x-slot>

    <x-errors />

    <x-form method="POST" action="{{ route('admin.animals.store') }}" enctype='multipart/form-data'>
        <x-select name="type_id" label="Тип" :options="$animal_types" required />
        <x-select name="breed_id" label="Порода" :options="$breeds" required />
        <x-input name="name" label="Кличка" value="{{ old('name') }}" required />
        <x-textarea name="description" label="Описание" required>{{ old('description') }}</x-textarea>
        <div class="mb-3">
            <x-label for="inp1">Паразиты *</x-label>
            <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" />
            <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" />
        </div>
        <x-select name="diseases[]" label="Болезни" :options="$diseases" multiple />
        <x-select name="inoculations[]" label="Прививки" :options="$inoculations" multiple />
        <x-input type="date" name="birthday_at" label="День рождения" required />
        <x-input type="file" name="files[]" label="Изображение" accept=".jpg, .jpeg, .png" multiple required />
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>
