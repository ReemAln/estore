@extends('layouts.app')
   
@section('content')

        <div class="col-lg-4 col-sm-8 col-xs-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
   
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('products.update', $product->id) }}">
        @method('PATCH') 
        @csrf
        <div class="form-group">
            <img src="" alt="{{ $product->image }}"" class="img-thumbnail" alt="...">
        </div>
        

         <div class="form-group">    
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name"  value={{ $product->name }} />
          </div>

          <div class="form-group">
              <label for="specs">Specs</label>
              <input type="textarea" class="form-control" name="specs"  value={{ $product->specs }}/>
          </div>

          <div class="form-group">
              <label for="balance">balance:</label>
              <input type="number" class="form-control" name="balance"  value={{ $product->balance }}/>
          </div>
          <div class="form-group">
              <label for="city">Product Image:</label>
              <input type="file" class="form-control" name="image"  />
          </div>
          <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" name="price"  value={{ $product->first_name }}/>
          </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@endsection