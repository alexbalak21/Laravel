@php
use App\Http\Controllers\PostController;
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light mx-2">
    <a class="navbar-brand me-5" href="/">
        <img src="laravel.svg"
            alt="Laravel Logo"
            width="30"
            height="30"
            class="d-inline-block align-text-top">
        {{ $title ?? 'Laravel' }}
    </a>

    @auth
    <x-userMenu class="d-lg-none ms-auto me-1" name="{{ ucfirst(Auth::user()->name) }}" />
    @else
    <x-visitorMenu class="d-lg-none ms-auto me-2" />
    @endauth


    <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="/posts/new">New Post</a>
            </li>
            <li>
                <a class="nav-link" href="/posts">Posts</a>
            </li>
            @endauth
        </ul>
    </div>
    @auth
    <x-userMenu class="d-none d-lg-flex" name="{{ ucfirst(Auth::user()->name) }}" />
    @else
    <x-visitorMenu class="d-none d-lg-flex me-1" />
    @endauth

</nav>  