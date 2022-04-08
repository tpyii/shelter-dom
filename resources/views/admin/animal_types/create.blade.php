<x-layout>
  <x-slot name="title">
    Types create
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.animal_types.store') }}">
    <x-input name="name" label="Name" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
