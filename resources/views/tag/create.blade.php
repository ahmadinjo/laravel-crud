<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Tag</title>
    </head>
    <body>
        <h1>New Tag</h1>
        <form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            @error('name')<span style="color: red">{{ $message }}</span>@enderror
        
            <input type="submit">
        </form>
    </body>
</html>
