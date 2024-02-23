@extends('student.main-layout')


@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6 class="m-0">Place selection</h6>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">place selection</li>
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

        
        @if (session()->has('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif (session()->has('error'))
          <div class="alert alert-warning">
            {{ session()->get('error') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        
           
            <table id="table" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                    <th scope="col" width="9%">#</th>
                    <th scope="col" >place Name</th>
                    <th scope="col">Category</th>
                    <th scope="col" width="10%">Capacity</th>
                    <th scope="col"> Branch</th>
                    <th scope="col">Area</th>
                    <th scope="col">Region</th>
                    <th scope="col">District</th>
                </tr>
                </thead>
              <tbody>

                <form action="{{ route('saveSelectedPlace') }}" method="POST">
                  @csrf
                @foreach($places as $key =>$place)

                   @php
                       $key = $key + 1;
                   @endphp
                <tr>
                    <th scope="row">
                      
                      <div class="row">
                        <div class="col"><!-- Plus icon button to toggle the hidden button -->
                          <button class="toggle-btn text-center mr-2"><i class="fas fa-plus-circle"></i></button>{{ $key }}
                          <!-- Hidden button to show/hide -->
                     
                          <button class="hidden-button text-center float-mid btn btn-primary" type="submit" name="selectedPlace" value="{{ $place->id }}" style="display: none;">Select</button>

                     
                        </div>

                      </div>
                    </th>
                    <td>{{ $place->place_name }}
                      <input type="hidden" name="place_ids[]" value="{{ $place->id }}">

                    </td>
                    <td>{{ $place->category }}</td>
                    <td>{{ $place->capacity }}</td>
                    <td>{{ $place->branch}}</td>
                    <td>{{ $place->area}}</td>
                    <td>{{ $place->region}}</td>
                    <td>{{ $place->district}}</td>
                    
                </tr>
            @endforeach

                </form>
        </tbody>
       
    </table>
    {{-- <div class="d-flex">
      {!! $places->links() !!}
  </div> --}}
    	</div>
    </div>
    <!-- /.row (main row) -->
@endsection