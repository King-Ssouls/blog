<img src="{{ asset('storage/' . $user->avatar) }}" width="120">

<form method="POST" action="/profile/avatar" enctype="multipart/form-data">
    @csrf
    <input type="file" name="avatar">
    <button type="submit">Загрузить</button>
</form>