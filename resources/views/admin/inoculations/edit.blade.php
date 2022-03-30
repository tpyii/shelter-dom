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

  <x-form method="POST" action="{{ route('admin.inoculations.update', $inoculation) }}">
    @method('PUT')
    <div class="mb-3">
      <x-label for="name">Name</x-label>
      <x-input name="name" value="{{ $inoculation->name }}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
