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
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
    <div class="container" style="background-color: #f5f5f5; padding: 20px; border-radius: 10px;">

        @if (session()->has('message'))
        <div class="alert alert-success mb-3">
            <button type="button" class="close" data-dismiss="alert"></button>
            {{ session()->get('message') }}
        </div>
        @endif

        <form action="{{ url('upload_toursite') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="destination" style="color: black;">Destination:</label>
                <input type="text" class="form-control" id="destination" name="destination" required placeholder="Enter destination" style="color: black;">
            </div>
            <div class="form-group">
                <label for="description" style="color: black;">Description:</label>
                <input type="text" class="form-control" id="description" name="description" required placeholder="Enter description" style="color: black;">
            </div>
            <div class="form-group">
                <label for="image" style="color: black;">Image:</label>
                <input type="file" class="form-control" id="image" name="file" accept="image/*" required style="color: black;">
            </div>

            <div class="form-group">
                <label for="price" style="color: black;">Price:</label>
                <input type="number" class="form-control" id="price" name="price" required placeholder="Enter price" style="color: black;">
            </div>
            <button type="submit" class="btn btn-primary" style="color: black;">Add Toursite</button>
        </form>
    </div>
</div>
      <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>    