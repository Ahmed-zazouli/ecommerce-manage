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
          <h5 class="">Work Flow</h5>
        </div>
        <div>
          
           
        </div>
      </div>
    </footer>
   
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>id </th>
            <th>Event Name</th>
            <th>Event Table</th>
            <th>User</th>       
            <th >Created_at</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($work_flows as $work_flow)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $work_flow->id }}</strong></td>
            <td>{{ $work_flow->event_name }}</td>
            <td>{{ $work_flow->event_table }}</td>
            <td>{{ $work_flow->user->name }}</td>
           
            <td>{{ $work_flow->created_at }}  
                
            </td> 
                    
                      
           
            
         
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Bootstrap Table with Header Dark -->
@endsection