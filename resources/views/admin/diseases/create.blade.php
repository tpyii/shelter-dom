<x-layout>
  <x-slot name="title">
        Создание болезни
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.diseases.store') }}">
    <x-input name="name" label="Название" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
