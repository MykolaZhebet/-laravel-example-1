<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1>Edit Post</h1>
@auth
<p>You are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div>
        <h2>Edit Post</h2>
        <form action="/edit-post/{{$post->id}}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{$post->title}}"/>
            <textarea name="body">{{$post->body}}</textarea>
            <button>Edit Post</button>
        </form>
    </div>
@else
    <p>Please authorize <a href="/">Login</a></p>
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
