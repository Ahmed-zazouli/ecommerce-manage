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
          <h5 class="">ADD New User</h5>
        </div>
        <div>
          
            <a href={{ route('users.create') }} class="menu-link">
          <button type="sumbit" class="btn rounded-pill btn-outline-secondary">
            <span class="bx bx-plus me-0 me-sm-2"></span>&nbsp; Add User
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
            <th>full name</th>           
            <th>email</th>
            <th>user type</th>
            <th>update_at</th>
            <th >action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $user->id }}</strong></td>
            <td>{{ $user->name }}</td>
           
            <td>{{ $user->email }}</td>
            <td>{{ $user->user_type->type }}</td>
            <td>{{ $user->updated_at }}</td>
          
            <td>
              <div class="dropdown">

                 <form action="{{route('users.edit', $user)}}" method="get">
                  @csrf
                
                  <button type="submit" class="btn btn-outline-secondary btn-sm" value="edit">
                    <i class="bx bx-edit-alt me-1"></i>
                  </button>
              </form>
              <form action="{{route('users.destroy', $user)}}" method="post">
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
@endsection