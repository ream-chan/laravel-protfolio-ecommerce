<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Category</h4>
              
                <form class="forms-sample" action="{{route('storecategory')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputName1">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="exampleInputName1" placeholder="Enter Name Category">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
              </div>
            </div>
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
    @include('admin.js')
  </body>
</html>
