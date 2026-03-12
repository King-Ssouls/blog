<a href="{{ route('admin.post.create') }}">Добавить пост</a>

@forelse($posts as $post)
    <article>
        <div>
            <span>{{ $post->author->name }}</span>
            <span>{{ $post->duration }}</span>
        </div>
        <a href="{{ route('admin.post.show', ['post' => $post]) }}">{{ $post->title }}</a>
        <p>{{ $post->description }}</p>
    </article>
    <form action="{{ route('admin.post.delete', ['post' => $post]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button>Удалить</button>
    </form>
@empty
    <p>Данных нет</p>
@endforelse