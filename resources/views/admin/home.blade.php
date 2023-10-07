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
       
      </div>
      <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
 @include('admin.navbar')
        <!-- partial -->
        @include('admin.body')    
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')    
    <!-- End custom js for this page -->
  </body>
</html>