@extends('layouts.app')
@section('content')

<div class="container">

    <h1>{{ $post->title }}</h1>

    <div class="post-content">
        {{ $post->content }}
    </div>

    <section class="comments-section">
        <h3>Комментарии ({{ $post->comments->total() }})</h3>
        @auth
            <form method="POST" action="{{ route('comments.store') }}" class="comment-form">
                @csrf

                <input type="hidden" name="post_id" value="{{ $post->id }}">
                
                <div class="form-group">
                    <textarea name="content" rows="3" placeholder="Напиши комент" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        @endauth
        <div class="comments-list">

            @foreach($post->comments as $comment)

                <x-comment :comment="$comment">
                @if($comment->replies->isNotEmpty())

                    <div class="replies ml-4">
                        @foreach($comment->replies as $reply)

                            <x-comment :comment="$reply">

                        @endforeach
                    </div>

                @endif

            @endforeach

        </div>

        {{ $post->comments->links() }}
    </section>
</div>
@endsection