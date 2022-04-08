<x-layout>
  <x-slot name="title">
    Breeds create
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.breeds.store') }}">
    <x-select name="type_id" label="Тип" :options="$animal_types" required />
    <x-input name="name" label="Name" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
