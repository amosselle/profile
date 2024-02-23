@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">places</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">places</li>
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
           places

           <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fas fa-plus"></i> Add place
  </button>
  
  <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add place</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('place.create')}}">
                        @csrf
                    
                        
                    
                        <div class="mb-3">
                            <label for="place_name" class="form-label">Place Name:</label>
                            <input type="text" class="form-control @error('place_name') is-invalid @enderror" id="place_name" name="place_name" value="{{ old('place_name') }}" required>
                            @error('place_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                <option value="institution">institution</option>
                                <option value="company">company</option>
                                <option value="organization">Organization</option>
                                <option value="college"> College</option>
                                </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity:</label>
                            <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity" value="{{ old('capacity') }}">
                            @error('capacity')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch (Optional):</label>
                            <input type="text" class="form-control" id="branch" name="branch" value="{{ old('branch') }}">
                        </div>
                    
                        <div class="mb-3">
                            <label for="area" class="form-label">Area:</label>
                            <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area') }}" required>
                            @error('area')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="region" class="form-label">Region:</label>
                            <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" value="{{ old('region') }}" required>
                            @error('region')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="district" class="form-label">District:</label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ old('district') }}" required>
                            @error('district')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block">register</button>
                    
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
                 @foreach($places as $key => $place)
                    @php
                        $key = $key +1 ;
                    @endphp
                   <tr>
                    <td>{{$key}}</td>
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->category }}</td>
                    <td>{{ $place->capacity }}</td>
                    <td>{{ $place->branch}}</td>
                    <td>{{ $place->area}}</td>
                    <td>{{ $place->region}}</td>
                    <td>{{ $place->district}}</td>
                </tr>
            @endforeach
                 
                </tbody>
                
              </table>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->


    
@endsection