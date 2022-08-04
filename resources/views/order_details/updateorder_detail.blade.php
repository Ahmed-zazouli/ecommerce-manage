@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> Update  User Adress</h4>

    <!-- Basic Layout -->
    <form action={{route('user_addresses.update', $user_address->id) }} method="post">
        @method('put')
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
                  <label for="exampleFormControlSelect1" class="form-label">User</label>
                  <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"  id="user" name="user_id">
                    <option selected value="{{ $user_address->user_id }}">Open this select menu</option>
                    @foreach ($users as $user)
                    <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                  </select>
                 </div>
                
                    
                  <div class="mb-3">
                    <label class="form-label" for="Country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ $user_address->country }}" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="SKU">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $user_address->city }}" />
                  </div>
                 
          
                  <div class="mb-3">
                    <label class="form-label" for="postal_code">Postal Code</label>
                    <input
                      type="text"
                      id="basic-default-phone"
                      class="form-control phone-mask"
                      placeholder="90450"
                      name="postal_code"
                      value="{{  $user_address->postal_code }}"
                    />
                  </div>
                  
                    <div class="mb-3">
                      <label class="form-label" for="basic-default-message">Address</label>
                      <div class="input-group input-group-merge speech-to-text">
                        <textarea class="form-control"
                        placeholder="Address"
                         rows="2" name="address">{{  $user_address->address }} </textarea>
                        <span class="input-group-text">
                          <i class="bx bx-microphone cursor-pointer text-to-speech-toggle"></i>
                        </span>
                      </div>
                     
                    </div>
                  
                  <button type="submit" class="btn btn-primary">Send</button>
               
              </div>
            </div>
          </div>
          <div class="col-xl">
            <div class="card mb-4">
             
              <div class="card-body">
                
                    
                 
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Phone Number 1</label>
                    <div class="input-group input-group-merge">
                      
                      <input
                        type="text"
                        id="telephone1"
                        class="form-control"
                        name="telephone1"
                        placeholder="Phone Number"
                        aria-label="telephone1"
                        aria-describedby="basic-icon-default-company2"
                        value="{{ $user_address->telephone1 }}"
                      />
                      
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Phone Number 2</label>
                    <div class="input-group input-group-merge">
                     
                      <input
                        type="text"
                        id="basic-icon-default-company"
                        class="form-control"
                        name="telephone2"
                        placeholder="Phone Number "
                        aria-label="telephone2"
                        aria-describedby="basic-icon-default-company2"
                        value="{{ $user_address->telephone2 }}"
                      />
                     
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