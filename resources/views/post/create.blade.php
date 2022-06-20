<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Post</title>
    </head>
    <body>
        <h1>New Post</h1>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            @error('title')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="body">Content</label>
                <input type="text" id="body" name="body">
            </div>
            @error('body')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="category">Category</label>
                <select name="category_slug" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="tag">Tag</label>
                <select name="tags[]" id="tag" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('tag')<span style="color: red">{{ $message }}</span>@enderror
            <input type="submit">
        </form>
    </body>
</html>
