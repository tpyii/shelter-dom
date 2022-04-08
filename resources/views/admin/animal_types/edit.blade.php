<x-layout>
  <x-slot name="title">
    Types edit
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.animal_types.update', $animal_type) }}">
    @method('PUT')
    <x-input name="name" label="Name" value="{{ $animal_type->name }}" required />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
