<x-layout>
  <x-slot name="title">
    Diseases edit
  </x-slot>

<form method="post" action="{{ route('admin.diseases.update', ['disease' => $disease->id])}}">
    @csrf
    @method('put')
    <input type="text" id="name" name="name" value="{{ $disease->name }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
