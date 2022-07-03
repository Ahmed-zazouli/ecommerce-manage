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
          
          <h5 class="">ADD New Discount</h5>
        </div>
        <div>
          
            <a href={{ route('discounts.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="bx bx-plus me-0 me-sm-2"></span>&nbsp; Add Discount
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
            <th >active</th>
            <th >Updated_at</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($discounts as $discount)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $discount->id }}</strong></td>
            <td>{{ $discount->name }}</td>
            <td><span class="badge me-1
              @if ($discount->active == 1)
                   bg-label-success 
              @else
                   bg-label-danger      
              @endif ">
              @if ($discount->active == 1)
                   activated
              @else
                   inactivated     
              @endif</span></td> 
            <td>{{ $discount->updated_at }}</td>           
                                           
            <td>
              <div class="">

                 <form action="{{route('discounts.edit', $discount)}}" method="get" style="display :initial">
                  @csrf
                
                  <button type="submit" class="btn btn-sm btn-icon edit-record" value="edit">
                    <i class="bx bx-edit "></i>
                  </button>
              </form>
              <form action="{{route('discounts.destroy', $discount)}}" method="post" style="display :initial">
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
  {{ $discounts->links('pagination::bootstrap-5') }}
@endsection