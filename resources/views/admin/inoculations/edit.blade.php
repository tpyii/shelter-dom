<x-layout>
  <x-slot name="title">
    Inoculations edit
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.inoculations.update', $inoculation) }}">
    @method('PUT')
    <x-input name="name" label="Name" value="{{ $inoculation->name }}" />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
