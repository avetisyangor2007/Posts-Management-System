@extends('layouts.app')
@section('title', 'Create Post | PostSpace')
@section('content')
<div class="editor-wrap">
    <a href="/my-posts" class="back-link">← Back to My Posts</a>
    <div class="page-title"><span class="eyebrow">CREATE SOMETHING</span><h1>Write a new post</h1><p class="muted">Put your thoughts into words and share them.</p></div>
    <form action="/posts" method="POST" class="form panel">
        @csrf
        <label for="title">Post title</label>
        <input id="title" name="title" value="{{ old('title') }}" maxlength="255" placeholder="Give your post a title" required>
        @error('title') <small class="field-error">{{ $message }}</small> @enderror
        <label for="content">Your story</label>
        <textarea id="content" name="content" rows="12" placeholder="Start writing here..." required>{{ old('content') }}</textarea>
        @error('content') <small class="field-error">{{ $message }}</small> @enderror
        <div class="form-actions"><a href="/my-posts" class="btn btn-ghost">Cancel</a><button class="btn btn-primary" type="submit">Publish post</button></div>
    </form>
</div>
@endsection
