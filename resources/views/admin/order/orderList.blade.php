<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .input-group .form-control {
    border-radius: 5px 0 0 5px;
}

.input-group .btn {
    border-radius: 0 5px 5px 0;
    margin-left: -1px;
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
                        <h1 class="card-title">List Order</h4>
                          
                            <div class="input-group mb-3">
                                <form action="{{ url('search') }}" method="get" class="w-100 d-flex">
                                    @csrf
                                    <input type="text" name="search_bar" class="form-control" placeholder="Search..." >
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </div>
                            
                            
                            
                            

                        <div class="table-responsive">
                          <table class="table table-bordered table-contextual">
                            <thead class="thead-light text-center">
                              <tr>
                                <th> Customer Name</th>
                                <th> Email </th>
                                <th> Product name </th>
                                <th> Quantity </th>
                                <th> Price </th>
                                <th> Size </th>
                                <th> Color </th>
                                <th> Category </th>
                                <th> Image </th>
                                <th> Payment Status </th>
                                <th> Delivery Status </th>
                                <th> Action </th>
                                <th> PDF</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($order as $item)
                                    <tr class="text-light">
                                        <td> {{$item->name}} </td>
                                        <td> {{$item->email}}</td>
                                        <td> {{$item->product_name}}</td>
                                        <td> {{$item->quantity}}</td>
                                        <td> {{$item->price}}</td>
                                        <td> {{$item->size}}</td>
                                        <td> {{$item->color}}</td>
                                        <td> {{$item->category}}</td>
                                        <td>  
                                            @if ($item->image)
                                            <img src="{{ Storage::url($item->image) }}" alt="Product Image" style="width: 100px; height: auto;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td style="color: {{ $item->payment_status == 'Paid' ? 'green' : 'white' }};">
                                            {{ $item->payment_status }}
                                        </td>
                                        <td style="color: {{ $item->delivery_status == 'Delivered' ? 'green' : 'white' }};">
                                            {{ $item->delivery_status }}
                                        </td>
                                        <td>
                                            <div style="display: flex; flex-direction: column; gap: 1rem">
                                                <a href="{{route('delivered', $item->id)}}" class="btn btn-primary">Delivered</a>
                                                <a href="{{route('payment', $item->id)}}" class="btn btn-info">Payment</a>
                                            </div>
                                        </td>
                                        <td>  
                                            <a href="{{route('print_pdf', $item->id)}}" class="btn btn-danger">PDF</a>
                                        </td>
                                        {{-- <td>a
                                           <div class="d-flex justify-end" style="gap: 1.4rem">
                                            <a href="{{route('editcategory', $item->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('deletecategory', $item->id)}}" method="post">
                                              @csrf
                                              @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                           </div>   
                                        </td> --}}
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
