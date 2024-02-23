@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0">places selected</h4>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">places selected</li>
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
           places selected

           <!-- Button trigger modal -->
<!-- Button trigger modal -->


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
                        <th scope="col" width="9%">#</th>
                        <th scope="col">student Name</th>
                        <th scope="col">RegNo</th>
                        <th scope="col" >place Name</th>
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
                    <td>{{$key}}</td>
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