@foreach($posts as $post)

    <div class="post">

        <h2>{{ $post->title }}</h2>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" width="200">
        @endif

    </div>

@endforeach