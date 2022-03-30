<x-layout>
  <x-slot name="title">
    Inoculations edit
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

<form method="post" action="{{ route('admin.inoculations.update', ['inoculation' => $inoculation->id])}}">
    @csrf
    @method('put')
    <input type="text" id="name" name="name" value="{{ $inoculation->name }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
