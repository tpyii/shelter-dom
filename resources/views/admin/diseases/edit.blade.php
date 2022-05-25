<x-layout>
  <x-slot name="title">
    Редактирование болезни
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.diseases.update', $disease) }}">
    @method('PUT')
    <x-input name="name" label="Название" value="{{ $disease->name }}" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
