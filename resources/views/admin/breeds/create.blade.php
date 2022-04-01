<x-layout>
  <x-slot name="title">
    Breeds create
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

  <x-form method="POST" action="{{ route('admin.breeds.store') }}">
    <x-select name="type_id" label="Тип" :options="$animal_types" />
    <div class="mb-3">
      <x-label for="name">Name</x-label>
      <x-input name="name" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
