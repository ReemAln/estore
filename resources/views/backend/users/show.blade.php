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
                <h3 class="card-title">Add new user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('users.update',$user->id) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control required" id="name" name="name" value="{{ $user->name }}" placeholder="Enter username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}"placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirmation">
                  </div>

                  <div class="form-group">
                    <label for="role">User role</label>
                  
                    
                    <select  class="custom-select" aria-label="Default select example" name="role">
                     
                      <option value="Admin" {{ $user->role ==="Admin" ? "selected": "" }} >Admin</option>
                      <option value="Customer" {{ $user->role ==="Customer" ? "selected": "" }} >Customer</option>
                      <option value="Manager" {{ $user->role ==="Manager" ? "selected": "" }} >Manager</option>

                    </select>


                  </div>

  
               

                
                </div>
                <!-- /.card-body -->
                
{{-- 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> --}}


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