<x-layout>
  <x-slot name="title">
    Breeds edit
  </x-slot>

  <x-errors />

  <x-form method="POST" action="{{ route('admin.breeds.update', $breed) }}">
    @method('PUT')
    <x-select name="type_id" label="Тип" :options="$animal_types" :value="$breed->type_id" />
    <x-input name="name" label="Name" value="{{ $breed->name }}" />
    <x-button type="submit" color="outline-success">Сохранить</x-button>
  </x-form>
</x-layout>
