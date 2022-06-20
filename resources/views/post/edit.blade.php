<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Post</title>
    </head>
    <body>
        <h1>Edit Post - {{ $post->title }}</h1>
        <form action="{{route('posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}">
            </div>
            @error('title')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="body">Content</label>
                <input type="text" id="body" name="body" value="{{ $post->content }}">
            </div>
            @error('body')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="category">Category</label>
                <select name="category_slug" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" @if($category->slug == $post->category->slug) {{ 'selected' }} @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="tag">Tag</label>
                <select name="tags[]" id="tag" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if($post->tags->contains($tag)) {{ 'selected' }} @endif>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('tag')<span style="color: red">{{ $message }}</span>@enderror
            <input type="submit">
        </form>
    </body>
</html>
