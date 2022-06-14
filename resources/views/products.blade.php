<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Cours PHP</title>
</head>

<body>

<table class="table table-striped table-hover">
 <tr>
     <th scope="col">id</th>
     <th scope="col">name</th>
     <th scope="col">description</th>
     <th scope="col">quantity</th>
     <th scope="col">price sell</th>
     <th scope="col">price buy</th>
     <th scope="col">sku</th>
     <th scope="col">categorie</th>
     <th scope="col">create_at</th>
     <th scope="col">supprimer</th>
 </tr>
@foreach ($products as $product)
    
 <tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->description }}</td>
    <td>{{ $product->quantity }}</td>
    <td>{{ $product->price_sell }}</td>
    <td>{{ $product->price_buy }}</td>
    <td>{{ $product->SKU}}</td>
    <td>{{ $product->product_categorie->name }}</td>
    <td>{{ $product->created_at }}</td>
    <td><form action="{{route('products.destroy', $product)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" class="btn btn-danger btn-xs" value="supprimer">
    </form>
    <form action="{{route('products.edit', $product)}}" method="get">
        @csrf
       
        <input type="submit" class="btn btn-primary btn-xs" value="update">
    </form>
    </td>
    
</tr>
@endforeach
</table>








  

</body>

</html>