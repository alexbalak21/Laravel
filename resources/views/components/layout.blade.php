<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel</title>
</head>

<body>
    <header>
        <h1>Laravel App</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/register">Register</a>
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>