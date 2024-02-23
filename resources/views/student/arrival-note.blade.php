
@extends('student.main-layout')


@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6 class="m-0">Arrival-note</h6>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Arrival-note</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->

    
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-upload"> upload arrival note</i></button>
        
          <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('student.arrival-note')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" name="file">
                          </div>
                    

                        <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn  btn-primary" type="submit">Upload</button>
                    </form>
                    
                </div>
               
            </div>
            </div>
        </div>
        <!--End of the modal-->


  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
    	<div class="container-fluid">
    		

            <table id="table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                      <th scope="col" width="9%">#</th>
                      <th scope="col" >Student Name</th>
                      <th scope="col">Registration</th>
                      <th scope="col">Place</th>
                      <th scope="col">Area</th>
                      <th scope="col">Region</th>
                      <th scope="col">District</th>
                      <th scope="col">Phone</th>
                  </tr>
                  </thead>
                <tbody>
                      

                    @foreach($areas as $key => $area)
                    @php
                        $key = $key +1 ;
                    @endphp
                   <tr>
                    <td>
                      <button class="toggle-btn text-center mr-2"><i class="fas fa-plus-circle"></i></button>
                      {{$key}}     <!-- Hidden button to show/hide -->
                      <button class="hidden-button text-center btn btn-primary" style="display: none;"> download </button>
                       
                    </td>
                    <td>{{$area->student->first_name}} {{$area->student->last_name}}</td>
                    <td>{{ $area->student->regno }}</td>
                    <td>{{ $area->place->place_name }}</td>
                    <td>{{ $area->place->area}}</td>
                    <td>{{ $area->place->region}}</td>
                    <td>{{ $area->place->district}}</td>
                    <td>{{ $area->student->phone}}</td>
                </tr>
            @endforeach
             
          </tbody>
         
      </table>
      

    	</div>
    </div>
    <!-- /.row (main row) -->
@endsection