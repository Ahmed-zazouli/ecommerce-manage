@extends('menu')
@section('content')

     <!-- Profile -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Users/</span> My Profile</h4>
       
         
    <div class="row">
     
      <div class="col-xl-5 col-lg-5 col-md-5">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"></h5>
            <small class="text-muted float-end"></small>
          </div>
          <div class="card-body">
            
            <small class="text-muted text-uppercase">About</small>
            <ul class="list-unstyled mb-4 mt-3">
             <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">Full name :</span> <span>{{ $user->name }}</span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Role:</span> <span>{{ $user_type->type }}</span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>{{ $user_address->country}}</span></li>
             <li class="d-flex align-items-center mb-3"><i class='bx bx-buildings'></i><span class="fw-semibold mx-2">City:</span> <span>{{ $user_address->city}}</span></li>
             <li class="d-flex align-items-center mb-3"><i class='bx bx-buildings'></i><span class="fw-semibold mx-2">Joined At :</span> <span>{{ date('d-m-Y', strtotime( $user->created_at)) }}</span></li>
             
           </ul>
           <small class="text-muted text-uppercase">Contacts</small>
           <ul class="list-unstyled mb-4 mt-3">
             <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> {{ $user_address->telephone1}}/{{ $user_address->telephone2}}<span></span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Address:</span> <span>{{ $user_address->address}}</span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-map"></i><span class="fw-semibold mx-2">Postal Code:</span> <span>{{ $user_address->postal_code}}</span></li>
             <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>{{ $user->email }}</span></li>
           </ul>
           
            
           
          </div>
        </div>
      </div>
      <div class="col-xl-7 col-lg-7 col-md-7">
        <div class="card mb-4">
          <h5 class="card-header">{{ $user->name }} Activity </h5>
          <div class="card-body">
           
            
                
              <!-- Dismissible Alerts -->
                   @foreach ($work_flows as $work_flow )
                     
                  
                    <div class="alert  alert-dismissible
                          @if ($work_flow->event_name == 'create')
                            alert-primary                         
                          @elseif ($work_flow->event_name == 'update')
                            alert-success
                          @else
                            alert-danger
                          @endif
                                " role="alert">
                      {{ $work_flow->event_name }} in table {{ $work_flow->event_table }} At  {{ $work_flow->created_at }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach                   

                   

                   
                 
              <!--/ Dismissible Alerts -->
            
          </div>
        </div>
      </div>
     
    </div>
  
  </div>

@endsection



{{-- <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
<div class="card mb-4">

 <div class="card-body">
    <small class="text-muted text-uppercase">About</small>
     <ul class="list-unstyled mb-4 mt-3">
      <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-semibold mx-2">{{ $user->full_name }}</span> <span>John Doe</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span class="fw-semibold mx-2">Status:</span> <span>Active</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="fw-semibold mx-2">Role:</span> <span>Developer</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-flag"></i><span class="fw-semibold mx-2">Country:</span> <span>USA</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-detail"></i><span class="fw-semibold mx-2">Languages:</span> <span>English</span></li>
    </ul>
    <small class="text-muted text-uppercase">Contacts</small>
    <ul class="list-unstyled mb-4 mt-3">
      <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="fw-semibold mx-2">Contact:</span> <span>(123) 456-7890</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-chat"></i><span class="fw-semibold mx-2">Skype:</span> <span>john.doe</span></li>
      <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="fw-semibold mx-2">Email:</span> <span>{{ $user->email }}</span></li>
    </ul>
    <small class="text-muted text-uppercase">Teams</small>
    <ul class="list-unstyled mt-3 mb-0">
      <li class="d-flex align-items-center mb-3"><i class="bx bxl-github text-primary me-2"></i>
        <div class="d-flex flex-wrap"><span class="fw-semibold me-2">Backend Developer</span><span>(126 Members)</span></div>
      </li>
      <li class="d-flex align-items-center"><i class="bx bxl-react text-info me-2"></i>
        <div class="d-flex flex-wrap"><span class="fw-semibold me-2">React Developer</span><span>(98 Members)</span></div>
      </li>
    </ul>
  </div>
</div>
</div> --}}

  
   
  