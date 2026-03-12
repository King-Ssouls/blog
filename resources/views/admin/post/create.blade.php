@if($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.post.store') }}" method="POST">
    @csrf
    <label for="title"> Заголовок поста
        <input type="text" name="title">
    </label>
    <label for="description"> Описание статьи
        <textarea name="description" cols="30" rows="10"></textarea>
    </label>
    <select name="tags">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <button>Создать</button>
</form>