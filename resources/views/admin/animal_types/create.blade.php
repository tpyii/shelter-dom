<x-layout>
  <x-slot name="title">
    Создание типа
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.animal_types.store') }}">
    <x-input name="name" label="Название" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
