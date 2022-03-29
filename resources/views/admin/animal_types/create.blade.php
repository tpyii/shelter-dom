<x-layout>
  <x-slot name="title">
    Types create
  </x-slot>

<form method="post" action="{{ route('admin.animal_types.store')}}">
    @csrf
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
