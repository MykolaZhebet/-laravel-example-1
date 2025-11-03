<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Testing 1</h1>
@auth
<p>You are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
@else
    <div>
    <h2>Register</h2>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="password">
{{--        <input type="submit" name="submit" value="Register">--}}
        <button>Register</button>
    </form>
    <h2>Login</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="password">
{{--        <input type="submit" name="submit" value="Register">--}}
        <button>Login</button>
    </form>
    </div>
@endauth


@if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
