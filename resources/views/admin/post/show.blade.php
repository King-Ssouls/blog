<h3>{{ $post->title }}</h3>
<p>{{ $post->description }}</p>
@forelse ($post->tags as $tag)
    <span>{{ $tag->name }}</span>
@empty
    <span>Тэгов нет!</span>
@endforelse