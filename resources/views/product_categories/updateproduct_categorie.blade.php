@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Update  Product Categorie</h4>

    <!-- Basic Layout -->
    <form action={{route('product_categories.update', $product_categorie->id) }} method="post">
        @method('put')
        @csrf 
    <div class="row">
     
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"></h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
            
                
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Category Name</label>
                <input type="text" class="form-control" id="name" value="{{ $product_categorie->name }}" name="name" placeholder="John Doe" />
              </div>
              
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Store Categorie</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"   id="discount" name="store_categorie_id">
                  <option value="{{ $product_categorie->store_categorie_id }}" selected>Open this select menu</option>
                  @foreach ($store_categories as $store_categorie)
                  <option value={{ $store_categorie->id }}>{{ $store_categorie->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Description</label>
                <div class="input-group input-group-merge speech-to-text">
                  <textarea class="form-control"
                   placeholder="How do you Describe The Product?"
                   rows="2" name="description"> {{ $product_categorie->description }}</textarea>
                  <span class="input-group-text">
                    <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                  </span>
                </div>
               
              </div>
      
             
               
              
             
              <button type="submit" class="btn btn-primary">Send</button>
           
          </div>
        </div>
      </div>
     
    </div>
   </form>
  </div>
  <!-- / Content -->
@endsection