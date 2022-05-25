<x-layout>
  <x-slot name="title">
    Редактирование прививки
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.inoculations.update', $inoculation) }}">
    @method('PUT')
    <x-input name="name" label="Название" value="{{ $inoculation->name }}" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
