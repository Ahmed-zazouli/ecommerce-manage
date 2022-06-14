@extends('menu')
@section('content')


   <!-- Bootstrap Table with Header - Dark -->
   <div class="container-xxl flex-grow-1 container-p-y">
    
   <div class="card">
    <footer class="footer bg-light">
      <div
        class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
      >
        <div>
          <h5 class="">ADD New Product</h5>
        </div>
        <div>
          
            <a href={{ route('products.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="bx bx-plus me-0 me-sm-2"></span>&nbsp; Add Product
          </button>
        </a>
        </div>
      </div>
    </footer>
   
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>id </th>
            <th>name</th>
            
            <th>quantity</th>
            <th>price sell</th>
            <th>price buy</th>
            <th >sku</th>
            <th >categorie</th>
            <th >updated_at</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($products as $product)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->id }}</strong></td>
            <td>{{ $product->name }}</td>
           
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price_sell }}</td>
            <td>{{ $product->price_buy }}</td>
            <td>{{ $product->SKU}}</td>
            <td>{{ $product->product_categorie->name }}</td>
            <td>{{ $product->updated_at }}</td>
           
            
            <td>
              <div class="dropdown">

                 <form action="{{route('products.edit', $product)}}" method="get">
                  @csrf
                
                  <button type="submit" class="btn btn-outline-secondary btn-sm" value="edit">
                    <i class="bx bx-edit-alt me-1"></i>
                  </button>
              </form>
              <form action="{{route('products.destroy', $product)}}" method="post">
                @csrf
                @method('delete')
                  <button type="submit" class="btn btn-outline-secondary btn-sm" value="delete">
                    <i class="bx bx-trash me-1"></i>
                  </button>
              </form>
                <!--
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  >
                  <a class="dropdown-item" href="javascript:void(0);"
                    ><i class="bx bx-trash me-1"></i> Delete</a
                  >-->
                </div>
              </div>
            </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
      
    </div>
    
  </div>
  
  <!--/ Bootstrap Table with Header Dark -->
  <nav aria-label="Page navigation example">
  {{ $products->links() }}
  </nav>
@endsection