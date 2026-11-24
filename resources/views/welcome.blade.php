@extends('layouts.app')
@section('title', 'Home | PostSpace')
@section('content')
<section class="hero">
    <div>
        <span class="eyebrow">YOUR COMMUNITY. YOUR IDEAS.</span>
        <h1>Discover ideas.<br><span>Share your story.</span></h1>
        <p>Explore thoughts, stories and perspectives from our community.</p>
    </div>
    @auth
        <a href="/posts/create" class="btn btn-primary">＋ Create post</a>
    @else
        <a href="/register" class="btn btn-primary">Join the community</a>
    @endauth
</section>

<div class="section-heading">
    <div><h2>Latest posts</h2><p class="muted">Fresh ideas from the community</p></div>
</div>

@if(isset($posts) && $posts->count())
    <div class="posts-list">
        @foreach($posts as $post)
            @if(!$post->is_blocked)
                <article class="post-card">
                    <div class="post-meta">
                        <span class="avatar">{{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}</span>
                        <span>{{ $post->user->name ?? 'Unknown author' }}</span>
                        <span class="dot">·</span>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                    </div>
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                    <p>{{ \Illuminate\Support\Str::limit($post->content, 220) }}</p>
                    <a class="read-link" href="/posts/{{ $post->id }}">Read post <span>→</span></a>
                </article>
            @endif
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">✦</div>
        <h3>No posts yet</h3>
        <p>Be the first to share something with the community.</p>
        @auth <a href="/posts/create" class="btn btn-primary">Create the first post</a> @else <a href="/register" class="btn btn-primary">Get started</a> @endauth
    </div>
@endif
@endsection
