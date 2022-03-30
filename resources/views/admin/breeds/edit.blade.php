<x-layout>
  <x-slot name="title">
    Breeds edit
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

<form method="post" action="{{ route('admin.breeds.update', ['breed' => $breed->id])}}">
    @csrf
    @method('put')
    <label for="type_id">Тип</label>
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}" @if($breed->type_id === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    <input type="text" id="name" name="name" value="{{ $breed->name }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
