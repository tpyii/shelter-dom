<x-layout>
  <x-slot name="title">
    Diseases create
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

<form method="post" action="{{ route('admin.diseases.store')}}">
    @csrf
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
</form>
</x-layout>
