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
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulation!</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                
                <div class="col-lg-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h1 class="card-title">List Products</h4>
                        
                        </p>
                        <div class="table-responsive">
                          <table class="table table-bordered table-contextual">
                            <thead class="thead-light text-center">
                              <tr>
                                <th> # </th>
                                <th> Product Name </th>
                                <th> Description	</th>
                                <th> Category</th>
                                <th> Quantity</th>
                                <th> Price</th>
                                <th> Image</th>
                                <th> Size</th>
                                <th> Color</th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr class="text-light">
                                        <td> {{$item->id}} </td>
                                        <td> {{ Str::limit($item->product_name, 25, '...') }}</td>
                                        <td>{{ Str::limit($item->description, 25, '...') }}</td>
                                        <td>{{$item->category}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                          @if ($item->image)
                                              <img src="{{ Storage::url($item->image) }}" alt="Product Image" style="width: 100px; height: auto;">
                                          @else
                                              No Image
                                          @endif
                                        </td>
                                        <td>{{$item->size}}</td>
                                        <td>{{$item->color}}</td>
                                        <td>
                                           <div class="d-flex justify-end" style="gap: 1.4rem">
                                            <a href="{{route('editproduct', $item->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('deleteproduct', $item->id)}}" method="post">
                                              @csrf
                                              @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                           </div>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
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
