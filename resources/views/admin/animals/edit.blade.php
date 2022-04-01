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
    <x-select name="type_id" label="Тип" :options="$animal_types" :value="$animal->type_id" />
    <x-select name="breed_id" label="Порода" :options="$breeds" :value="$animal->breed_id" />
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ $animal->name }}" />
    </div>
    <x-textarea name="description" label="Описание">{{ $animal->description }}</x-textarea>
    <div class="mb-3">
      <x-label for="inp1">Паразиты</x-label>
      <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" :checked="$animal->treatment_of_parasites" />
      <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" :checked="$animal->treatment_of_parasites" />
    </div>
    <x-select name="diseases[]" label="Болезни" id="diseases" :options="$diseases" :value="$animal->disease" multiple />
    <x-select name="inoculations[]" label="Прививки" :options="$inoculations" :value="$animal->inoculation" multiple/>
    <div class="mb-3">
      <x-label for="birthday_at">День рождения</x-label>
      <x-input type="date" name="birthday_at" value="{{$animal->birthday_at}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
