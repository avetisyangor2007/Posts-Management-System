@extends('layouts.app')
@section('title', 'Create account | PostSpace')
@section('content')
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-mark">P</div>
        <span class="eyebrow">JOIN THE COMMUNITY</span>
        <h1>Create your account</h1>
        <p class="muted">A place for your thoughts, stories and ideas.</p>
        <form method="POST" action="/register" class="form">
            @csrf
            <label for="name">Full name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Your name" required>
            @error('name') <small class="field-error">{{ $message }}</small> @enderror
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            @error('email') <small class="field-error">{{ $message }}</small> @enderror
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="At least 8 characters" required>
            @error('password') <small class="field-error">{{ $message }}</small> @enderror
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Repeat your password" required>
            <button class="btn btn-primary btn-full" type="submit">Create account</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="/login">Sign in</a></p>
    </div>
</div>
@endsection
