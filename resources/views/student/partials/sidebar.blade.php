@php
$current_route=request()->route()->getName();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href=" " class="brand-link">
    <img src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">student Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        {{-- <a href="#" class="d-block">{{auth()->user()->regno}}</a> --}}
      </div>
    </div>

    <!-- SidebarSearch Form -->
   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

         <li class="nav-item">
          <a href="{{route('student.dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('student.place')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Place selection
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('student.arrival-note')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
            <i class="nav-icon fas fa-file-pdf"></i>
            <p>
              Arrival Note
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{route('student.logbook')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Log Book
            </p>
          </a>
        </li>
        {{-- <li class="nav-item {{$current_route=='users.index'?'menu-open':''}}">
          <a href="#" class="nav-link {{$current_route=='users.index'?'active':''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.index')}}" class="nav-link {{$current_route=='users.index'?'active':''}}">
                <i class="far fas fa-user"></i>
                <p>Users</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('users.add')}}" class="nav-link {{$current_route=='users.add'?'active':''}}">
                <i class="far fas fa-user"></i>
                <p>add Users</p>
              </a>
            </li>

          </ul>
        </li> --}}

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>