<form method="post" action="{{ route('admin.breeds.store')}}">
    @csrf
    <label for="type_id">Тип</label>
    <select id="type_id" name="type_id">
        @foreach($types as $typesItem)
            <option value="{{ $typesItem->id }}"
                    @if(old('type_id') === $typesItem->id) selected @endif>{{ $typesItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="type_id">Порода</label>
    <select id="type_id" name="type_id">
        @foreach($breeds as $breedsItem)
            <option value="{{ $typesItem->id }}"
                    @if(old('breed_id') === $breedsItem->id) selected @endif>{{ $breedsItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <br>
    <label for="treatment_of_parasites">Паразиты</label>
    <input type="radio" name="treatment_of_parasites" id="inp1">
    <label for="inp1">Да</label>
    <input type="radio" name="treatment_of_parasites" id="inp2">
    <label for="inp1">Нет</label>
    <br>
    <input type="date" name="birthday_at">
    <br>
    <button type="submit">Сохранить</button>
</form>
