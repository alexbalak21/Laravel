<nav class="navbar navbar-expand-lg navbar-light bg-light mx-2">
    <a class="navbar-brand me-5" href="/">
        <img src="laravel.svg"
            alt="Laravel Logo"
            width="30"
            height="30"
            class="d-inline-block align-text-top">
        {{ $title ?? 'Laravel' }}
    </a>

    <x-userMenu />

    <button class="navbar-toggler ms-1"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
        </ul>
    </div>

</nav>