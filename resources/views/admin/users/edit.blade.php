<form action="{{route('admin.users.update', ['user' => $user])}}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Имя</label>
    <input type="text" name="name" value="{{$user->name}}">
    <label for="email">Почта</label>
    <input type="email" name="email" value="{{$user->email}}">
    <br>
    <p>Админ</p>
    <label for="inp1">Да</label>
    <input type="radio" name="is_admin" id="inp1" value="1" @if($user->is_admin === 1) checked @endif>
    <label for="inp2">Нет</label>
    <input type="radio" name="is_admin" id="inp2" value="0" @if($user->is_admin === 0) checked @endif>
    <button type="submit">Сохранить</button>
</form>
