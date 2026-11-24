@extends('layouts.app')
@section('title', $post->title . ' | PostSpace')
@section('content')
<article class="article-wrap">
    <a href="/" class="back-link">← Back to posts</a>
    <div class="post-meta article-meta">
        <span class="avatar">{{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}</span>
        <span>{{ $post->user->name ?? 'Unknown author' }}</span><span class="dot">·</span><span>{{ $post->created_at->format('M d, Y') }}</span>
    </div>
    <h1>{{ $post->title }}</h1>
    <div class="article-content">{{ $post->content }}</div>
    @auth
        @if(auth()->id() === $post->user_id)
        <div class="form-actions">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit post</a>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Delete this post?')">@csrf @method('DELETE')<button class="btn btn-outline" type="submit">Delete</button></form>
        </div>
        @endif
    @endauth
</article>
@endsection
