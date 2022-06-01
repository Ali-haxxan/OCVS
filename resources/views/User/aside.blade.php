<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('dist/img/vacine.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">OCVS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/person.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><div>{{$LoggeduserInfo->name}}</div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('/register-baby')}}" class="nav-link {{ request()->is('register-baby') ? 'active' : ''}}">
              <i class="nav-icon fas fa-registered"></i>
              <p>
                Register Your Child
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{url('/registered-babies')}}" class="nav-link {{ request()->is('registered-babies') ? 'active' : ''}}">
            <i class="nav-icon fas fa-registered"></i>
              <p>
                  Registered Child's
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/vaccination-vanue')}}" class="nav-link {{ request()->is('vaccination-vanue') ? 'active' : ''}}">
            <i class="nav-icon fa fa-map-marker" aria-hidden="true"></i>
              <p>
                  Vaccination Vanue
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/vaccination-date')}}" class="nav-link {{ request()->is('vaccination-date') ? 'active' : ''}}">
            <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Vaccination Date
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{url('/feedback')}}" class="nav-link {{ request()->is('feedback') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Feedback
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/get-certificate')}}" class="nav-link {{ request()->is('get-certificate') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-certificate"></i>
              <p>
               Get Certificate
              </p>
            </a>
          </li>
          
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>