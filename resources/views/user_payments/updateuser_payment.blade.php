@extends('menu')
@section('content')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products/</span> Update  Store Categorie</h4>

    <!-- Basic Layout -->
    <form action={{route('user_payments.update', $user_payment->id) }} method="POST">
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
              <option value="{{ $user_payment->user->id }}" selected>Open this select menu</option>
              @foreach ($users as $user)
              <option value={{ $user->id }}>{{ $user->name }}</option>
              @endforeach
            </select>
           </div>
           <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Payment type</label>
            <select class="form-select" id="payment_type" aria-label="Default select example"   name="payment_type">
              <option value="{{ $user_payment->payment_type }}" selected>Open this select menu</option>
              <option value="Direct debits">Direct debits</option>
              <option value="Bank transfers">Bank transfers</option>
              <option value="Mobile payments">Mobile payments</option>
              <option value="Buy now, pay later">Buy now, pay later</option>
              <option value="E-wallets">E-wallets</option>
            
            </select>
           </div>

           <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">provider</label>
            <select class="form-select" id="provider" aria-label="Default select example"   name="provider">
              <option value="{{ $user_payment->provider }}" selected>Open this select menu</option>
              <option value="Visa">Visa</option>
              <option value="Visa Retired">Visa Retired</option>
              <option value="Discover Card">Discover Card</option>
              <option value="MasterCard">MasterCard</option>
              <option value="American Express">American Express</option>
            
            </select>
           </div>
             
            <div class="mb-3">
              <label class="form-label" for="postal_code">Account nomber</label>
              <input
              value="{{ $user_payment->account_no }}"
                type="number"
                id="basic-default-phone"
                class="form-control phone-mask"
                placeholder="9045xxxxxxxx"
                name="account_no"
              />
            </div>

            <div class="mb-3">
              <label class="form-label" for="postal_code">Expiry date</label>
              <input
              value="{{ $user_payment->expiry_date }}"
                type="date"
                id="basic-default-phone"
                class="form-control phone-mask"
                placeholder="90450xxxxxxxxxxxxxxx"
                name="expiry_date"
              />
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