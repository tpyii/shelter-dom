<p>Каталог:</p>
@forelse($catalog as $catalogItem)
    <strong>
        <p>Номер питомца: {{$catalogItem['id']}}</p>
        <p>Тип: {{$catalogItem['type']}}</p>
        <p>Порода: {{$catalogItem['breed']}}</p>
        <p>Имя: {{$catalogItem['name']}}</p>
        <br>
        <a href="{{ route('catalog.show', ['id' => $catalogItem['id']]) }}">Подробнее</a>
    </strong>
    <hr>
@empty
    <p>Питомцы отсутствуют</p>
@endforelse
