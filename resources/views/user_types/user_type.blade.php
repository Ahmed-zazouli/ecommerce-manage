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
          
          <h5 class="">ADD New User Type</h5>
        </div>
        <div>
          
            <a href={{ route('user_types.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="bx bx-plus me-0 me-sm-2"></span>&nbsp; Add User Type
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
            <th>type</th>
            <th>permission</th>  
            <th>active</th>      
            <th >Created_at</th>
            <th >Updated_at</th> 
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($user_types as $user_type)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user_type->id }}</strong></td>
            <td>{{ $user_type->type }}</td>
            <td>{{ $user_type->permission }}</td>
            <td><span class="badge me-1
              @if ($user_type->active == 1)
                   bg-label-success 
              @else
                   bg-label-danger      
              @endif ">
              @if ($user_type->active == 1)
                   activated
              @else
                   inactivated     
              @endif</span></td>


            <td>{{ $user_type->created_at }}</td> 
            <td>{{ $user_type->updated_at }}</td>           
                                           
            <td>
              <div class="">

                 <form action="{{route('user_types.edit', $user_type)}}" method="get" style="display :initial">
                  @csrf
                
                  <button type="submit" class="btn btn-sm btn-icon edit-record" value="edit">
                    <i class="bx bx-edit "></i>
                  </button>
              </form>
              <form action="{{route('user_types.destroy', $user_type)}}" method="post" style="display :initial">
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
  {{ $user_types->links('pagination::bootstrap-5') }}
@endsection