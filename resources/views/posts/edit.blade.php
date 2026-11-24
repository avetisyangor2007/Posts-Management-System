@extends('layouts.app')
@section('title', 'Edit Post | PostSpace')
@section('content')
<div class="editor-wrap">
    <a href="/my-posts" class="back-link">← Back to My Posts</a>
    <div class="page-title"><span class="eyebrow">MAKE IT BETTER</span><h1>Edit your post</h1><p class="muted">Update your title or make changes to your story.</p></div>
    <form action="/posts/{{ $post->id }}" method="POST" class="form panel">
        @csrf @method('PUT')
        <label for="title">Post title</label>
        <input id="title" name="title" value="{{ old('title', $post->title) }}" maxlength="255" required>
        @error('title') <small class="field-error">{{ $message }}</small> @enderror
        <label for="content">Your story</label>
        <textarea id="content" name="content" rows="12" required>{{ old('content', $post->content) }}</textarea>
        @error('content') <small class="field-error">{{ $message }}</small> @enderror
        <div class="form-actions"><a href="/my-posts" class="btn btn-ghost">Cancel</a><button class="btn btn-primary" type="submit">Save changes</button></div>
    </form>
</div>
@endsection
