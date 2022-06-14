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

<h1>Update Product </h1>
<form action={{route('products.update', $product->id) }} method="post">
    @method('put')
    @csrf
    <div class="mb-6">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name :</label>
    <input type="text" class="form-control" value="{{ $product->name }}" name="name">
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description :</label>
    <textarea class="form-control" name="description"  rows="3">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">SKU :</label>
        <input type="text" class="form-control" value="{{ $product->SKU }}" name="SKU">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">product categorie :</label>
            <input type="text" class="form-control" value="{{ $product->product_categorie_id }}"  name="product_categorie_id">
            </div>    
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">quantity :</label>
    <input type="number" class="form-control" value="{{ $product->quantity }}"  name="quantity">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">price_sell :</label>
        <input type="text" class="form-control" value="{{ $product->price_sell }}" name="price_sell">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">price_buy :</label>
            <input type="text" class="form-control" value="{{ $product->price_buy }}"  name="price_buy">
            </div>    
    <div class="mb-3">♦
    <label for="exampleFormControlInput1" class="form-label">discount :</label>
    <input type="number" class="form-control" value="{{ $product->discount_id }}"  name="discount_id">
    </div> 
   
    <input type="submit" class="btn btn-primary btn-xs" value="update">
    
</div>
</form>

</body>