<html>
    <head>
        <title>
            Laravel Blade
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <header>
            <h1>Laravel Blade Lab</h1>
            @include('partials.nav')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>&copy; 2025 Laravel Blade Lab</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>