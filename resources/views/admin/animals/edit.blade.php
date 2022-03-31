<x-layout>
  <x-slot name="title">
    Animals edit
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

  <x-form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data">
    @method('PUT')
    <div class="mb-3">
      <x-label for="type_id">Тип</x-label>
      <x-select name="type_id" :options="$animal_types" :value="$animal->type_id" />
    </div>
    <div class="mb-3">
      <x-label for="breed_id">Порода</x-label>
      <x-select name="breed_id" :options="$breeds" :value="$animal->breed_id" />
    </div>
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ $animal->name }}" />
    </div>
    <div class="mb-3">
      <x-label for="description">Описание</x-label>
      <x-textarea name="description">{{$animal->description}}</x-textarea>
    </div>
    <div class="mb-3">
      <x-label for="inp1">Паразиты</x-label>
      <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" :checked="$animal->treatment_of_parasites" />
      <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" :checked="$animal->treatment_of_parasites" />
    </div>
    <div class="mb-3">
      <x-label for="diseases">Болезни</x-label>
      <x-select name="diseases[]" id="diseases" :options="$diseases" :value="$animal->disease" multiple />
    </div>
    <div class="mb-3">
      <x-label for="inoculations">Прививки</x-label>
      <x-select name="inoculations[]" :options="$inoculations" :value="$animal->inoculation" multiple/>
    </div>
    <div class="mb-3">
      <x-label for="birthday_at">День рождения</x-label>
      <x-input type="date" name="birthday_at" value="{{$animal->birthday_at}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
