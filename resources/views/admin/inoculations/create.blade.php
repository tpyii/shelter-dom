<x-layout>
  <x-slot name="title">
    Inoculations create
  </x-slot>

<form method="post" action="{{ route('admin.inoculations.store')}}">
    @csrf
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
