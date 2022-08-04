@extends('backend.layouts.app')
 
@section('content')

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid  mt-5">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
 
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
              </div>
              <!-- /.card-body -->
            </div> 
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div><a href="{{ route('products.create') }}" class="btn btn-primary">Add new product</a></div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>                    
                    <th>Price</th>
                    <th>Balance</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

            @foreach ($products as $key=>$product)

                      
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->balance }}</td>
                    <td>
                      
                      <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                        <a href="{{ route('products.show',$product) }}" class="btn btn-sm btn-outline-primary" target="_blank"> <i class="fa fa-eye"></i ></a>

        
                        <a href="{{ route('products.edit',$product) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-pen"></i></i ></a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i ></button> 
                    </form>

                  

                   
                    
                    
                    
                    
                    
                    

                    </td>
                    
                  </tr>
            @endforeach


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>                    
                    <th>Price</th>
                    <th>Balance</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <script>


    function sendDeleteForm() {
        document.getElementById("deleteForm").submit();
    }
</script>









@endsection