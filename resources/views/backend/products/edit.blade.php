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
            
            @if ($errors->any())
              <div class="card card-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p> 
                
              @endforeach

              </div>
            @endif

            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('products.update', $product->id) }}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                <div class="form-group">
                    <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->image }}" class="img-thumbnail w-25 h-25" alt="...">
                </div>

                <div class="form-group">    
                  <label for="name">Product Name:</label>
                  <input type="text" class="form-control" name="name"  value="{{ $product->name }}" />
              </div>
            
              <div class="form-group">
                  <label for="specs">Specs</label>
                  <textarea class="form-control" rows="5" name="specs" rows="3"  >{{ $product->specs }}</textarea>
                  
              </div>
            
              <div class="form-group">
                  <label for="balance">balance:</label>
                  <input type="number" class="form-control" name="balance"  value="{{ $product->balance }}"/>
              </div>
              <div class="form-group">
                  <label for="city">Product Image:</label>
                  <input type="file" class="form-control" name="image"  />
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="removeImage">
                <label class="form-check-label" for="defaultCheck1">
                  Remove Image
                </label>
              </div>

              <div class="form-group">
                  <label for="price">Price:</label>
                  <input type="number" class="form-control" name="price"  value="{{ $product->price }}" />
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