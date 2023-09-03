<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('products.create')}}">Products</a>
            </li>
        </ul>
    </div>
    </nav>
    <div class="container">
        <a href="{{route('products.create')}}" class="btn btn-dark mt-2 float-end">New Products</a>
        <table class="table table-hover table-bordered mt-2">
            <thead>
                <tr>
                    <th>SNO</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <img src="products/{{$product->image}}" class="rounded-circle" style="max-height:30px";/>
                        </td>
                        <td>
                            <a href="products/{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                            <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                         </td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>