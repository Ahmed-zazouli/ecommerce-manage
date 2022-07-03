@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Product</h4>

    <!-- Basic Layout -->
    <form action={{route('products.store') }} method="POST">
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
                <label class="form-label" for="basic-default-fullname">Product Name</label>
                <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" placeholder="" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="SKU">SKU</label>
                <input type="text" value="{{ old('SKU') }}" class="form-control" id="SKU" name="SKU" placeholder="HADGZRBHE58" />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Discount</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="discount" name="discount_id">
                  <option selected>Open this select menu</option>
                  @foreach ($discounts as $discount)
                  <option value={{ $discount->id }}>{{ $discount->name }}</option>
                  @endforeach
                </select>
              </div>
      
              <div class="mb-3">
                <label class="form-label" for="quantity">Quantity</label>
                <input
                  type="number"
                  value="{{ old('quantity') }}"
                  id="basic-default-phone"
                  class="form-control phone-mask"
                  placeholder="41"
                  name="quantity"
                />
              </div>
              
                <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Description</label>
                  <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control"
                     placeholder="How do you Describe The Product?"
                     rows="2" name="description"> {{ old('description') }} </textarea>
                    <span class="input-group-text">
                      <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
                  </div>
                 
                </div>
              
              <button type="submit" class="btn btn-primary">Send</button>
           
          </div>
        </div>
      </div>
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Basic with Icons</h5>
            <small class="text-muted float-end">Merged input group</small>
          </div>
          <div class="card-body">

            <div class="mb-3">
              <label class="form-label" for="image">Image</label>
              <input
                type="file"
                value="{{ old('image') }}"
                id="image"
                class="form-control phone-mask"
                placeholder="Choose image"
                name="image"
              />
              @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            
                
              <div class="mb-3">
                <label class="form-label" for="product_categorie_id">Product Categorie</label>
                <div class="input-group input-group-merge">
                  
                    <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="product_categorie" name="product_categorie_id">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $categorie)
                        <option value={{ $categorie->id }}>{{ $categorie->name }}</option>
                        @endforeach
                      </select>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Price Sell</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">MAD</span>
                  <input
                    type="text"
                    value="{{ old('price_sell') }}"
                    id="basic-icon-default-company"
                    class="form-control"
                    name="price_sell"
                    placeholder="Price Sell."
                    aria-label="Price Sell."
                    aria-describedby="basic-icon-default-company2"
                  />
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Price Buy</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text">MAD</span>
                  <input
                    type="text"
                    value="{{ old('price_buy') }}"
                    id="basic-icon-default-company"
                    class="form-control"
                    name="price_buy"
                    placeholder="Price Buy."
                    aria-label="Price Buy."
                    aria-describedby="basic-icon-default-company2"
                  />
                  <span class="input-group-text">.00</span>
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