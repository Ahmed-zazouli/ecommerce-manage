@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> User Type</h4>

    <!-- Basic Layout -->
    <form action={{route('user_types.store') }} method="POST">
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
                <label class="form-label" for="basic-default-fullname">Type</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="type" name="type">
                  <option selected>Open this select menu</option>
                  <option value="Admin" >Admin</option>
                  <option value="User" >User</option>
                  <option value="Client" >Client</option>
                </select>  
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Permission</label>
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="permission" name="permission">
                  <option selected>Open this select menu</option>
                  <option value="view" >View</option>
                  <option value="create" >Create</option>
                  <option value="update" >Update</option>
                  <option value="delete" >Delete</option>
                  <option value="all" >Create - Update - Delete</option>
                </select>  
              </div>
              <div class="mb-3">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="active" name="active" checked />
                <label class="form-check-label" for="flexSwitchCheckChecked">Activate</label>
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