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
            <th >photo</th>
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
            <td><div class="avatar me-2"><img src="{{ $product->photo }}" alt="Avatar" class=""></div></td>
            <td>{{ $product->product_categorie->name }}</td>
            <td>{{ $product->updated_at }}</td>
           
            
            <td>
              <div class="dropdown">

                 <form action="{{route('products.edit', $product)}}" method="get" style="display :initial">
                  @csrf
                
                  <button type="submit" class="btn btn-sm btn-icon edit-record" value="edit">
                    <i class="bx bx-edit "></i>
                  </button>
              </form>
              <form action="{{route('products.destroy', $product)}}" method="post" style="display :initial">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-icon delete-record" value="delete">
                  <i class="bx bx-trash "></i>
                </button>
                {{-- <button type="button" class="btn btn-sm btn-icon delete-record deleteP"                 
                data-bs-toggle="modal" 
                data-bs-target="#modalCenter">
                  <i class="bx bx-trash "></i>
                </button> --}}

                 <!-- Modal for confirmation delete-->
                 {{-- <div class="modal fade" id="modalCenter" tabindex="-5" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="modalCenterTitle">Confirme la supprission</h3>
                        <input type="text" name="product_delet_id" id="product_id"/>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title" >Voulez-vous vraiment supprimer ? </h5>
                       
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="submit" class="btn btn-primary" value="delete">Confirme </button>
                      </div>
                    </div>
                  </div>
                </div> --}}
             

             <!-- Slide from Top Modal -->
              </form>
  
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
  
  {{ $products->links('pagination::bootstrap-5') }}
  
@endsection

@section('scripts')

   <script>
    // $(document).ready(function(){
    //   $('.deleteP').click(function(e){
    //     e.preventDefault();
    //     var product_id =$(this).val();
    //     $('#product_id').val(product_id);
    //     // $('.modal-title').text(product_id);
    //   });

    // });


   </script>

@endsection