<x-layout>
  <x-slot name="title">
    Breeds create
  </x-slot>

  @if ($errors->any())
    <x-alert type="danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </x-alert>
  @endif

  <x-form method="POST" action="{{ route('admin.breeds.store') }}">
    <x-label for="type_id">Тип</x-label>
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}" @if(old('type_id') === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    <x-label for="name">Name</x-label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
