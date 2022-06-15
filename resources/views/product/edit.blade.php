<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Product: {{ $product->name }}</title>
    </head>
    <body>
        <form action="{{route('update_product', ['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}">
            </div>
            @error('name')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" min="1" name="price" value="{{ $product->price }}">
            </div>
            @error('price')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="{{ $product->description }}">
            </div>
            @error('description')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" accept="image/jpeg,image/jpg,image/png" name="image">
            </div>
            @error('image')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" min="0" name="quantity" value="{{ $product->quantity }}">
            </div>
            @error('quantity')<span style="color: red">{{ $message }}</span>@enderror
            <input type="submit">
        </form>
    </body>
</html>
