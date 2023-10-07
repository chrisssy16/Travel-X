<x-app-layout>
</x-app-layout>
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
      <div class="container-fluid page-body-wrapper">
        <div class="container" style="background-color: #f5f5f5; padding: 20px; border-radius: 10px;">
          @if (session()->has('message'))
          <div class="alert alert-success mb-3">
              <button type="button" class="close" data-dismiss="alert"></button>
              {{ session()->get('message') }}
          </div>
          @endif

          <table class="table table-striped">
            <thead>
              <tr>
                <th>Destination</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>EDIT</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $toursites)
              <tr>
                <td>{{ $toursites->destination }}</td>
                <td>{{ $toursites->description }}</td>
                <td><img src="{{ asset('toursitesimage/' . $toursites->image) }}" alt="Toursite Image" style="max-width: 100px;"></td>
                <td>{{ $toursites->price }}</td>
                <td>
                  <a href="{{ url('updatetoursite/'.$toursites->id) }}" class="btn btn-primary">Update</a>
                  <a href="{{ url('deletetoursite/'.$toursites->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('admin.script')
    </body>
</html>
