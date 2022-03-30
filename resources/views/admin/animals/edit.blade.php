<form method="post" action="{{ route('admin.animals.store')}}">
    @csrf
    <label for="type_id">Тип</label>
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}"
                    @if($animal->type->id === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="type_id">Порода</label>
    <select id="type_id" name="type_id">
        @foreach($breeds as $breedsItem)
            <option value="{{ $breedsItem->id }}"
                    @if($animal->breed->id === $breedsItem->id) selected @endif>{{ $breedsItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" value="{{ $animal->name }}">
    <br>
    <label for="treatment_of_parasites">Паразиты</label>
    <input type="radio" name="treatment_of_parasites" id="inp1" value="YES" @if($animal->treatment_of_parasites==="YES") checked @endif>
    <label for="inp1">Да</label>
    <input type="radio" name="treatment_of_parasites" id="inp2" value="NO" @if($animal->treatment_of_parasites==="NO") checked @endif>
    <label for="inp1">Нет</label>
    <br>
    <p>Болезни</p>
    @foreach($diseases as $diseasesItem)
        <input type="checkbox" name="diseases" value="{{$diseasesItem->id}}" @if(in_array($diseasesItem->id, $diseases_array)) checked @endif>
        <label for="diseases">{{$diseasesItem->name}}</label>
        <br>
    @endforeach
    <p>Прививки</p>
    @foreach($inoculations as $inoculationsItem)
        <input type="checkbox" name="diseases" value="{{$inoculationsItem->id}}" @if(in_array($inoculationsItem->id, $inoculations_array)) checked @endif>
        <label for="diseases">{{$inoculationsItem->name}}</label>
        <br>
    @endforeach
    <input type="date" name="birthday_at" value="{{$animal->birthday_at}}">
    <br>
    <button type="submit">Сохранить</button>
</form>
