@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
    	<div class="container-fluid">
    		Users 



            <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Name
              
                    </th>
                    <th class="th-sm">Email
              
                    </th>
                    <th class="th-sm">position
              
                    </th>
                    <th class="th-sm">Age
              
                    </th>
                    <th class="th-sm">Start date
              
                    </th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <!-- Display user information -->
         
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>61</td>
                        <td>{{ $user->created_at }}</td>
                        
                      </tr>
                      @endforeach
                 
                  
                 
                 
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name
                    </th>
                    <th>Email
                    </th>
                    <th>position
                    </th>
                    <th>Age
                    </th>
                    <th>Start date
                    </th>
                    
                  </tr>
                </tfoot>
              </table>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->


    
@endsection