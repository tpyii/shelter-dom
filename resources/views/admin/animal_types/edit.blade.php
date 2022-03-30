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

  <x-form method="POST" action="{{ route('admin.animal_types.update', $animal_type) }}">
    @method('PUT')
    <x-label for="name">Name</x-label>
    <input type="text" id="name" name="name" value="{{ $animal_type->name }}">
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
