<x-layout>
  <x-slot name="title">
    Types create
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

<form method="post" action="{{ route('admin.animal_types.store')}}">
    @csrf
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <button type="submit">Сохранить</button>
</form>
</x-layout>
