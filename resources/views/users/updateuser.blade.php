@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Update User</h4>

    <!-- Basic Layout -->
    <form action={{route('users.update' , $user) }} method="POST">
        @method('put')
        @csrf 
    <div class="row">
     
      <div class=" d-flex justify-content-center">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"></h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
            
                
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Full Name</label>
                <input type="text" class="form-control" value="{{$user->name }}" id="name" name="name" placeholder="John Doe" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" placeholder="john.doe@example.com" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-password12">Password</label>
                <div class="input-group">
                  <input
                    type="password"
                    value="{{ $user->password }}"
                    class="form-control"
                    name="password"
                    id="basic-default-password12"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="basic-default-password2"
                  />
                  <span id="basic-default-password2" class="input-group-text cursor-pointer"
                    ><i class="bx bx-hide"></i
                  ></span>
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">User Type</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="user_type" name="user_type_id">
                  <option value={{ $user->user_type_id }} selected>Open this select menu</option>
                  @foreach ($types as $type)
                  <option value={{ $type->id }}>{{ $type->type }}</option>
                  @endforeach
                </select>
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