@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">students</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Students</li>
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
    		students 


            <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">#</th>
                    <th class="th-sm">First Name</th>
                    <th class="th-sm">last Name</th>
                    <th class="th-sm">middle Name</th>
                    <th class="th-sm">Regno </th>
                    <th class="th-sm">Email </th>
                    <th class="th-sm">Phone </th>
                    <th class="th-sm"> Gender</th>
                    <th class="th-sm"> Program</th>
                    <th class="th-sm"> Yos</th>
                    
                  </tr>
                </thead>
                <tbody>
                   
                 @foreach ($student as $key => $student)
                     @php
                         $key = $key + 1;
                     @endphp

                     <tr>
                        <td>{{$key}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->middle_name}}</td>
                        <td>{{$student->regno}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->college->name}}</td>
                        <td>{{$student->yos}}</td>

                     </tr>
                 @endforeach
                  
                </tbody>
                
              </table>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->


    
@endsection