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
            <td>{{$user->user_type->type}}</td>
            <td>{{ $user->updated_at }}</td>
          
            <td>
              <div class="dropdown">

                 <form action="{{route('users.edit', $user)}}" method="get" style="display :initial">
                  @csrf
                
                  <button type="submit" class="btn btn-sm btn-icon edit-record" value="edit">
                    <i class="bx bx-edit " title="update"></i>
                  </button>
              </form>
              <form action="{{route('users.destroy', $user)}}" method="post" style="display :initial">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-sm btn-icon delete-record" value="delete">
                  <i class="bx bx-trash " title="delete"></i>
                </button>


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
  {{ $users->links('pagination::bootstrap-5') }}
@endsection