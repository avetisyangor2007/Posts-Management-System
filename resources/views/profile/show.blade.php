@extends('layouts.app')
@section('title', 'Profile | PostSpace')
@section('content')
<div class="profile-card">
    <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
    <span class="eyebrow">COMMUNITY MEMBER</span>
    <h1>{{ $user->name }}</h1>
    <p class="muted">{{ $user->email }}</p>
    <div class="profile-stat"><strong>{{ $user->posts_count ?? $user->posts->count() }}</strong><span>Posts shared</span></div>
</div>
<div class="section-heading"><div><h2>Posts by {{ $user->name }}</h2></div></div>
<div class="posts-list">
    @forelse($user->posts as $post)
    <article class="post-card"><div class="post-meta">{{ $post->created_at->format('M d, Y') }}</div><h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3><p>{{ \Illuminate\Support\Str::limit($post->content, 180) }}</p></article>
    @empty
    <div class="empty-state"><h3>No posts yet</h3><p>This user hasn't shared any posts.</p></div>
    @endforelse
</div>
@endsection
