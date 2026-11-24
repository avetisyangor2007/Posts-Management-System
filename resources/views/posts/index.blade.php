@extends('layouts.app')
@section('title', 'My Posts | PostSpace')
@section('content')
<div class="section-heading">
    <div><span class="eyebrow">YOUR SPACE</span><h1>My Posts</h1><p class="muted">Manage the stories you've shared.</p></div>
    <a href="/posts/create" class="btn btn-primary">＋ Create post</a>
</div>
@if(isset($posts) && $posts->count())
<div class="posts-list">
    @foreach($posts as $post)
    <article class="post-card">
        <div class="post-meta"><span>{{ $post->created_at->format('M d, Y') }}</span>
            @if($post->is_blocked)<span class="status status-blocked">Blocked</span>@else<span class="status">Published</span>@endif
        </div>
        <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
        <p>{{ \Illuminate\Support\Str::limit($post->content, 180) }}</p>
        <div class="card-actions">
            <a class="read-link" href="/posts/{{ $post->id }}/edit">Edit post →</a>
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Delete this post?')">
                @csrf @method('DELETE')
                <button class="text-button danger" type="submit">Delete</button>
            </form>
        </div>
    </article>
    @endforeach
</div>
@else
<div class="empty-state"><div class="empty-icon">✦</div><h3>You haven't posted anything yet</h3><p>Your first post can start here.</p><a href="/posts/create" class="btn btn-primary">Create a post</a></div>
@endif
@endsection
