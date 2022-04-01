<x-layout>
  <x-slot name="title">
    Inoculations create
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.inoculations.store') }}">
    <x-input name="name" label="Name" />
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
