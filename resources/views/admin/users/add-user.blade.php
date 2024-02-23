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
    <div class="row ">
    	<div class="container shadow-sm col-md-3 mb-3 bg-light">
    		Add Users 
          
    	</div>

    	<div class="container  bg-light shadow-sm col-md-8 mb-3">

          @if (session()->has('success'))
              <div class="alert alert-success">
                  {{ session()->get('success') }}
              </div>
          @endif

        <form method="post" action="{{route('submit_form')}}">
          @csrf
      
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      
          <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      
          <div class="mb-3">
              <label for="password-confirm" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
          </div>
      
          <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin" value="1" checked>
              <label class="form-check-label" for="is_admin">Admin Account</label>
          </div>
      
          <button type="submit" class="btn btn-primary btn-block mb-2">Register</button>
      </form>
      
      </div>
        
    </div>
    <!-- /.row (main row) -->
@endsection