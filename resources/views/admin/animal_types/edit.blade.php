<x-layout>
  <x-slot name="title">
    Types edit
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

<form method="post" action="{{ route('admin.animal_types.update', ['animal_type' => $animal_type->id])}}">
    @csrf
    @method('put')
    <input type="text" id="name" name="name" value="{{ $animal_type->name }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
