@props(['title' => 'Page Not Found - My App'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>{{ $title }}</title>
    <!-- Load Bootstrap once globally -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<x-include.nav />

<body class="container">

    <main class="d-flex flex-column justify-content-center align-items-center text-center" style="min-height: 70vh;">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <h2 class="mb-3">Page Not Found</h2>
        <p class="text-muted mb-4">
            Sorry, the page you are looking for could not be found.
        </p>
        <a href="{{ url('/') }}" class="btn btn-primary">
            &larr; Back to Home
        </a>
    </main>

</body>

<x-include.footer />

</html>