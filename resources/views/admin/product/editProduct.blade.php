<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
  input:not(:focus) {
    background: none;
  }
  
  </style>
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
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <h4 class="card-title">Edit Product</h4>
             
                <form class="forms-sample" method="post" action="{{route('updateproduct',$product->id)}}"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group" style="color:white;">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$product->product_name}}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Size</label>
                      <select class="form-control" id="exampleSelectGender" name="size" style="color:white;">
                        @foreach ($size as $item)
                        <option value="{{$item->size}}">{{ $item->size }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputPassword4">Quantity</label>
                      <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Quantity" name="quantity" value="{{$product->quantity}}" style="color:white;">
                    </div>
                    <div class="form-group" >
                      <label for="exampleInputPassword4">Price</label>
                      <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Price" name="price" value="{{$product->price}}" style="color:white;">
                    </div>
                    <div class="form-group" >
                      <label for="exampleSelectGender">Category</label>
                      <select class="form-control" id="exampleSelectGender" name="category" style="color:white;">
                        @foreach ($category as $item)
                        <option value="{{$item->category_name}}">{{ $item->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <div class="form-group" >
                      <label>File upload</label> <br>
                      <input type="file" name="image"> 
                      <div style="margin-top: 15px;">
                        <img src="{{ Storage::url($product->image) }}" alt="Product Image" style="width: 100px; height: auto;">
                      </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Color</label>
                      <select class="form-control" id="exampleSelectGender" name="color" style="color:white;">
                          @foreach ($colors as $item)
                              <option value="{{ $item->name }}">{{ $item->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  
                    <div class="form-group">
                      <label for="exampleTextarea1">description</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="description" style="color:white;">{{$product->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
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
