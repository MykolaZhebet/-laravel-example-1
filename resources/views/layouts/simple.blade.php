<!doctype html>
<html land="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>Contact page</title>
</head>

<body>
    <nav>
        <x-simple-nav-link href="/">Home</x-simple-nav-link>
        <x-simple-nav-link href="/contact">Contact</x-simple-nav-link>
        <x-simple-nav-link href="/about">About</x-simple-nav-link>
    </nav>
    {{ $slot }}
</body>

</html>