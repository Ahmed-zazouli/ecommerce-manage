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
          <h5 class="">ADD New Product Category</h5>
        </div>
        <div>
          
            <a href={{ route('product_categories.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="tf-icons bx bx-bell"></span>&nbsp; Add Product Category
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
            {{-- <th>description</th> --}}
            <th>Store Categories</th>        
            <th >Created_at</th>
            <th >Updated_at</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($product_categories as $product_categorie)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product_categorie->id }}</strong></td>
            <td>{{ $product_categorie->name }}</td>
           
            {{-- <td>{{ $product_categorie->description }}</td> --}}
            <td>{{ $product_categorie->store_categorie->name }}</td>
            <td>{{ $product_categorie->created_at }}</td>
            <td>{{ $product_categorie->updated_at }}</td>
           
            
            <td>
              <div class="dropdown">

                 <form action="{{route('product_categories.edit', $product_categorie)}}" method="get">
                  @csrf
                
                  <button type="submit" class="btn btn-outline-secondary btn-sm" value="edit">
                    <i class="bx bx-edit-alt me-1"></i>
                  </button>
              </form>
              <form action="{{route('product_categories.destroy', $product_categorie)}}" method="post">
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
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!--/ Bootstrap Table with Header Dark -->
@endsection