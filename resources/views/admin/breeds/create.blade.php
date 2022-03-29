<x-layout>
  <x-slot name="title">
    Breeds create
  </x-slot>

<form method="post" action="{{ route('admin.breeds.store')}}">
    @csrf
    <label for="type_id">Тип</label>
    <select id="type_id" name="type_id">
        @foreach($types as $typesItem)
            <option value="{{ $typesItem->id }}" @if(old('type_id') === $typesItem->id) selected @endif>{{ $typesItem->name }}</option>
        @endforeach
    </select>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
