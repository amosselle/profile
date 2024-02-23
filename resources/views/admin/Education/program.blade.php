@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">program</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">program</li>
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
           program

           <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fas fa-plus"></i> Add program
  </button>
  
  <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add University</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('program.create') }}">
                        @csrf
                    
                        <div class="form-group">
                            <label for="departiment_name">departiment Name:</label>
                            <select id="dept_name" name="dept_id" class="form-control" required>
                                <option value="">Select departiment</option>
                                @foreach($dept as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="location">program Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="abbreviation">Abbreviation:</label>
                            <input type="text" id="abbreviation" name="abbreviation" class="form-control" required>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Register program</button>
                    </form>
                    
                    
                </div>
                
            </div>
            </div>
        </div>

  {{-- end of the modal --}}

          <div class="container">
            @if (session()->has('success'))
                      <div class="alert alert-success">
                          {{ session()->get('success') }}
                      </div>
                  @endif
          </div>

            <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">#</th>
                    <th class="th-sm">program Name</th>
                    <th class="th-sm">program abbreviation</th>
                    <th class="th-sm">departiment Name</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($program as $key=> $program)
                        @php
                            $key = $key + 1; // Set $key to start from 1
                        @endphp

                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$program->name}}</td>
                            <td>{{$program->abbreviation}}</td>
                            <td>{{$program->dept_id}}</td>
                            {{-- <td>{{$program->dept->name}}</td> --}}
                        </tr>
                    @endforeach    
                 
                </tbody>
                
              </table>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->


    
@endsection