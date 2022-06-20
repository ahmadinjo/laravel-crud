<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit {{ $tag->name }}</title>
    </head>
    <body>
        <form action="{{route('tags.update', ['tag' =>$tag->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $tag->name }}">
            </div>
            @error('name')<span style="color: red">{{ $message }}</span>@enderror
            
            <input type="submit">
        </form>
    </body>
</html>
