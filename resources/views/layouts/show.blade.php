<h1>{{ $post->title }}</h1>

<p>{{ $post->content }}</p>

@if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" width="400">
@endif

<div class="author">

    @if($post->user->avatar)
        <img src="{{ asset('storage/' . $post->user->avatar) }}" width="40">
    @endif

    <span>{{ $post->user->name }}</span>

</div>