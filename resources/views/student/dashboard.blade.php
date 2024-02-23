
@extends('student.main-layout')


@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6 class="m-0">Dashboard</h6>
      </div><!-- /.col -->
      <div class="col-sm-6">
        {{-- <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol> --}}
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    
<div class="container-fluid">
    		

    <div class="container-fluid  mb-3    expanded service-bar button-group">
        <button class="btn btn-link clear btn-lg" type="button" data-toggle="collapse" data-target="#ArchitecturalDesign" aria-expanded="true" aria-controls="collapseOne">
         Architectural Design 
        </button>
        <button class="btn btn-link btn-lg" type="button" data-toggle="collapse" data-target="#InteriorDesign" aria-expanded="true" aria-controls="collapseOne">
        Interior Design
        </button>
        <button class="btn btn-link btn-lg" type="button" data-toggle="collapse" data-target="#UrbanDesign" aria-expanded="true" aria-controls="collapseOne">
        Urban Design  
        </button>
        
    </div>

    <div class="accordion container-fluid" id="accordionExample">
 
        <div id="ArchitecturalDesign" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
         <div class="card-body shadow-sm bg-white">
            @if (Auth::guard('student')->check())       
            <div class=" bg-white  shadow-sm">
                <div class="container ">
                    <h5 class="mt-4">Welcome, {{ Auth::guard('student')->user()->first_name }} {{ Auth::guard('student')->user()->last_name }}</h5>

                <p class="text-bold">about me:</p>
                <p>Full Name: {{ Auth::guard('student')->user()->first_name }} {{ Auth::guard('student')->user()->last_name }}</p>
                <p>RegNo: {{ Auth::guard('student')->user()->regno }} </p>
                <p>Gender: {{ Auth::guard('student')->user()->gender }} </p>
                <p>Phone: {{ Auth::guard('student')->user()->phone }} </p>
                <p>Email: {{ Auth::guard('student')->user()->email }} </p>
                <p>Program: {{ Auth::guard('student')->user()->program }} </p>
                </div>
            </div>
            
        @else
            <p>No student Details Now !!!!!!</p>
        @endif
          
         </div>
        </div>
   
     
   
        <div id="InteriorDesign" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
         <div class="card-body shadow-sm">
            <div class="row">
               <p>hello interior</p>
            </div> 
         </div>
        </div>
   
    
   
        <div id="UrbanDesign" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
         <div class="card-body">
              
           </div>
         </div>
   
   </div>
   
      

    
    <!--offer section area end-->
</div>
            

     
         
         
          
      

    	</div>
    </div>
    <!-- /.row (main row) -->
@endsection