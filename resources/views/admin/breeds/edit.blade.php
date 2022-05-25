<x-layout>
  <x-slot name="title">
    Редактирование породы
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.breeds.update', $breed) }}">
    @method('PUT')
    <x-select name="type_id" label="Тип" :options="$animal_types" :value="$breed->type_id" required />
    <x-input name="name" label="Название" value="{{ $breed->name }}" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
