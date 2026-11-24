<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PostSpace')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="navbar">
    <div class="container nav-content">
        <a href="/" class="logo">Post<span>Space</span></a>
        <nav class="nav-links">
            <a href="/">Home</a>
            @auth
                <a href="/my-posts">My Posts</a>
                <a href="/profile">Profile</a>
                @if(auth()->user()->role === 'admin')
                    <a href="/admin">Admin</a>
                @endif
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-outline" type="submit">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
                <a href="/register" class="btn btn-primary">Get Started</a>
            @endauth
        </nav>
    </div>
</header>

<main class="container main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    @yield('content')
</main>

<footer class="footer">
    <div class="container"><p>© {{ date('Y') }} PostSpace. All rights reserved.</p></div>
</footer>
</body>
</html>
