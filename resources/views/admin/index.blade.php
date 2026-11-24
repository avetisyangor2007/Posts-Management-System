@extends('layouts.app')
@section('title', 'Admin | PostSpace')
@section('content')
<div class="page-title"><span class="eyebrow">CONTROL CENTER</span><h1>Administration</h1><p class="muted">Manage community members and published content.</p></div>
<div class="admin-grid">
    <section class="panel"><h2>Users</h2><p class="muted">User blocking and restoration controls will appear here.</p>
        @isset($users)
        @foreach($users as $user)
        <div class="admin-row"><div><strong>{{ $user->name }}</strong><small>{{ $user->email }}</small></div>
            <form action="/admin/users/{{ $user->id }}/toggle" method="POST">@csrf @method('PATCH')<button class="btn btn-outline" type="submit">{{ $user->is_blocked ? 'Unblock' : 'Block' }}</button></form>
        </div>
        @endforeach
        @endisset
    </section>
    <section class="panel"><h2>Posts</h2><p class="muted">Post moderation controls will appear here.</p>
        @isset($posts)
        @foreach($posts as $post)
        <div class="admin-row"><div><strong>{{ $post->title }}</strong><small>By {{ $post->user->name ?? 'Unknown' }}</small></div>
            <form action="/admin/posts/{{ $post->id }}/toggle" method="POST">@csrf @method('PATCH')<button class="btn btn-outline" type="submit">{{ $post->is_blocked ? 'Restore' : 'Block' }}</button></form>
        </div>
        @endforeach
        @endisset
    </section>
</div>
@endsection
