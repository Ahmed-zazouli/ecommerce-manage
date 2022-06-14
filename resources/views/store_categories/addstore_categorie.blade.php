@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Store category</h4>

    <!-- Basic Layout -->
    <form action={{route('store_categories.store') }} method="POST">
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
                <label class="form-label" for="basic-default-fullname">Store Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder=" " />
              </div>
               <div class="mb-3">
                  <label class="form-label" for="basic-default-message">Description</label>
                  <div class="input-group input-group-merge speech-to-text">
                    <textarea class="form-control"
                     placeholder="How do you Describe The Product?"
                     rows="2" name="description"> </textarea>
                    <span class="input-group-text">
                      <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                    </span>
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