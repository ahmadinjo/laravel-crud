<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Products List</title>
    </head>
    <body>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Desc.</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><a href="{{ route('show_product', ['slug' => $product->slug]) }}">{{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td><img src="{{asset('img/'.$product->image_path)}}" alt="{{$product->name}}" width="50px" height="50px"></td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <button onclick="deleteProduct(this)" class="delete-btn" id="product-btn-{{ $product->id }}" data-id="{{ $product->id }}">Delete</button>
                            <a href="{{ route('edit_product', ['id' => $product->id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="" method="post" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
        <script>
            const deleteProduct = (e) => {
                const id = e.getAttribute('data-id');
                const delete_form = document.getElementById('delete-form');
                delete_form.setAttribute('action', `/products/${id}`);
                delete_form.submit();
                delete_form.setAttribute('action', '');
            }
        </script>
    </body>
</html>
