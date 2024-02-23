
@extends('student.main-layout')


@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h6 class="m-0">logbook</h6>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">logbook</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    
<div class="container-fluid">
    		
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i> fill logbook</button> 
  <button class="btn btn-success"> <i class="fas fa-download"></i> download</button>
   
  <!--modal to fill the log book -->

<!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">fill logbook </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form action="{{route('logbook')}}" method="POST" class="was-validated">
                  @csrf
                  <div class="mb-3">
                    <label for="weekNo" class="form-label">Work Hours </label>
                    <input type="number" class="form-control" id="workhours" name="hours" required >
                    <div class="invalid-feedback">Please Enter the work Hours .</div>
                  </div>
              
                  <div class="mb-3">
                      <label for="weekNo" class="form-label">Week Number</label>
                      <select class="form-select" id="weekNo" name="week" required aria-label="select week number">
                          <option value="">Select Week Number</option>
                          <option value="1">Week 1</option>
                          <option value="2">Week 2</option>
                          <option value="3">Week 3</option>
                          <!-- Add more options as needed -->
                      </select>
                      <div class="invalid-feedback">Please select a week number.</div>
                  </div>
              
                  <div class="mb-3">
                      <label for="activity" class="form-label">Activity Performed / Task</label>
                      <textarea class="form-control " id="activity" name="task" placeholder="Enter activity performed" required></textarea>
                      <div class="invalid-feedback">Please enter the activity performed.</div>
                  </div>

                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
          
              </form>
              
              </div>
              
            </div>
          </div>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @elseif (session()->has('error'))
        <div class="alert alert-warning">
          {{ session()->get('error') }}
        </div>
      @endif

    <div class="container mt-3">
        <div class="accordion" id="horizontalAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOneH" aria-expanded="false" aria-controls="collapseOneH">
                Week 1
              </button>
            </h2>
            <div id="collapseOneH" class="collapse" aria-labelledby="headingOneH" data-parent="#horizontalAccordion">
              <div class="accordion-body">
                @if ($logbookData->count())
                    <ul>
                      @foreach ($logbookData as $logbookEntry)
                        <li>
                          Date: {{ $logbookEntry->created_at->format('Y-m-d') }}
                          <br>
                          Hours: {{ $logbookEntry->hours }}
                          <br>
                          Task: {{ $logbookEntry->task }}
                        </li>
                      @endforeach
                    </ul>
                  @else
                    <p>No logbook entries found.</p>
                  @endif

              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwoH" aria-expanded="false" aria-controls="collapseTwoH">
                Week 2
              </button>
            </h2>
            <div id="collapseTwoH" class="collapse" aria-labelledby="headingTwoH" data-parent="#horizontalAccordion">
              <div class="accordion-body">
                Content for Accordion Item #2 goes here.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThreeH" aria-expanded="false" aria-controls="collapseThreeH">
                Accordion Item #3
              </button>
            </h2>
            <div id="collapseThreeH" class="collapse" aria-labelledby="headingThreeH" data-parent="#horizontalAccordion">
              <div class="accordion-body">
                Content for Accordion Item #3 goes here.
              </div>
            </div>
          </div>
        </div>
      </div>
      
         
          
      

    </div>
    <!-- /.row (main row) -->
@endsection