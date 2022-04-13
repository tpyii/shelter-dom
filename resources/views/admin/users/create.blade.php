<form action="{{route('admin.users.store')}}" method="POST">
    @csrf
    <label for="name">Имя</label>
    <input type="text" name="name">
    <label for="email">Почта</label>
    <input type="email" name="email">
    <label for="password">Пароль</label>
    <input type="text" name="password">
    <br>
    <p>Админ</p>
    <label for="inp1">Да</label>
    <input type="radio" name="is_admin" id="inp1" value="1">
    <label for="inp2">Нет</label>
    <input type="radio" name="is_admin" id="inp2" value="0">
    <button type="submit">Сохранить</button>
</form>
