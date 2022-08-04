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
                <h3 class="card-title">Users Data Table</h3>
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
                <h3 class="card-title">Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div><a href="{{ route('users.create') }}" class="btn btn-primary">Add new user</a></div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 

            @foreach ($allUsers as $key=>$user)

                      
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        
                      <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                        <a href="{{ route('users.show',$user) }}" class="btn btn-sm btn-outline-primary" target="_blank"> <i class="fa fa-eye"></i ></a>

        
                        <a href="{{ route('users.edit',$user) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-pen"></i></i ></a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i ></button> 
                    </form>
                      
                      
                      
                      
{{--                       
                      <a href="{{ route('users.edit',$user) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ route('users.destroy',$user) }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                    
                  </tr>
            @endforeach


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
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
@endsection