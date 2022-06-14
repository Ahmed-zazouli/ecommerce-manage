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
          
          <h5 class="">ADD New Store</h5>
        </div>
        <div>
          
            <a href={{ route('store_categories.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="bx bx-plus me-0 me-sm-2"></span>&nbsp; Add Store
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
                    
            <th >Created_at</th>
            <th >Updated_at</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($store_categories as $store_categorie)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $store_categorie->id }}</strong></td>
            <td>{{ $store_categorie->name }}</td>
           
            <td>{{ $store_categorie->created_at }}</td> 
            <td>{{ $store_categorie->updated_at }}</td>           
                      
           
            
            <td>
              <div class="">

                 <form action="{{route('store_categories.edit', $store_categorie)}}" method="get" style="display :initial">
                  @csrf
                
                  <button type="submit" class="btn btn-sm btn-icon edit-record" value="edit">
                    <i class="bx bx-edit "></i>
                  </button>
              </form>
              <form action="{{route('store_categories.destroy', $store_categorie)}}" method="post" style="display :initial">
                @csrf
                @method('delete')
                  <button type="submit" class="btn btn-sm btn-icon delete-record" value="delete">
                    <i class="bx bx-trash "></i>
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
  {{ $store_categories->links('pagination::bootstrap-5') }}
@endsection