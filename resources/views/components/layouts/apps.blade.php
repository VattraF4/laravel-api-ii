@props(['title' => 'My App'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>{{$title}}</title>
    <!-- Load Bootstrap once globally -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<x-include.nav />

<body class="container">

    <main>
        {{$slot}}
    </main>

</body>

<x-include.footer />

</html>