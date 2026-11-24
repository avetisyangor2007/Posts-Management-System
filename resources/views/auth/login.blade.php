@extends('layouts.app')
@section('title', 'Login | PostSpace')
@section('content')
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-mark">P</div>
        <span class="eyebrow">WELCOME BACK</span>
        <h1>Sign in to PostSpace</h1>
        <p class="muted">Continue sharing and discovering ideas.</p>
        <form method="POST" action="/login" class="form">
            @csrf
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            @error('email') <small class="field-error">{{ $message }}</small> @enderror
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Enter your password" required>
            @error('password') <small class="field-error">{{ $message }}</small> @enderror
            <button class="btn btn-primary btn-full" type="submit">Sign in</button>
        </form>
        <p class="auth-switch">Don't have an account? <a href="/register">Create one</a></p>
    </div>
</div>
@endsection
