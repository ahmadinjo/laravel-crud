<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Product</title>
    </head>
    <body>
        <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            @error('name')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" min="1" name="price">
            </div>
            @error('price')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description">
            </div>
            @error('description')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="image">Image</label>
                <input type="file" id="image" accept="image/jpeg,image/jpg,image/png" name="image">
            </div>
            @error('image')<span style="color: red">{{ $message }}</span>@enderror
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" min="0" name="quantity">
            </div>
            @error('quantity')<span style="color: red">{{ $message }}</span>@enderror
            <input type="submit">
        </form>
    </body>
</html>
