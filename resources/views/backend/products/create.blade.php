@extends('backend.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid  mt-5">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-xs-12 col-lg-6">
 
            <div class="card card-danger">
            @foreach ($errors->all() as $error)
           <p class="alert alert-danger">{{ $error }}</p> 
              
            @endforeach

            </div>


            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="form-group">    
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
      
                <div class="form-group">
                    <label for="specs">Specs</label>
                    <textarea class="form-control" rows="3" name="specs" rows="3"  ></textarea>
                    
                </div>
      
                <div class="form-group">
                    <label for="city">Product Image:</label>
                    <input type="file" class="form-control" name="image"/>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" name="price"/>
                </div>
                <div class="form-group">
                  <label for="opening_balance">opening balance:</label>
                  <input type="number" class="form-control" name="opening_balance"/>
              </div>
               
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            


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
@endsection