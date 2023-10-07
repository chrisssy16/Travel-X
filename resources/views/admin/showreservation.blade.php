<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
         
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
      <!-- container-scroller -->
      <div class="container-fluid page-body-wrapper"> 
      <div class="container" style="background-color: #f5f5f5; padding: 20px; border-radius: 10px;">
        <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>User Email</th>
                  <th>Package Name</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Status</th>
                
                  <th>Approved</th>
                  <th>Cancelled</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($data as $showreservation)
  <tr>
    <td>{{ $showreservation->name }}</td>
    <td>{{ $showreservation->email }}</td>
    <td>{{ $showreservation->package }}</td>
    <td>{{ $showreservation->from_date }}</td>
    <td>{{ $showreservation->to_date }}</td>
    
    <td>{{ $showreservation->status }}</td>
    

    <td>
      <a class="btn btn-success" href="{{ url('approved',$showreservation->id)}}">Approved</a>  
    </td>
    <td>
    <a class="btn btn-danger" href="{{ url('canceled',$showreservation)}}">Canceled</a>  
    </td>
  </tr>
@endforeach

              </tbody>
            </table>
</div>
</div>
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>

