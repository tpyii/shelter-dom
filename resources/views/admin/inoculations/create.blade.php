<x-layout>
  <x-slot name="title">
    Inoculations create
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.inoculations.store') }}">
    <x-input name="name" label="Name" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
