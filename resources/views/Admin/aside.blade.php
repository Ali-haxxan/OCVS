<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/medical-staff')}}" class="brand-link">
      <img src="{{asset('dist/img/vacine.png')}}" alt="Vaccine" class="brand-image img-circle elevation-3" style="opacity: .8">
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
          <a href="#" class="d-block"><div>{{$LoggedadminInfo->name}}</div></a>
        </div>
      </div>
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{url('admin/medical-staff')}}" class="nav-link {{ request()->is('admin/medical-staff') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Medical Staff
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/centers')}}" class="nav-link {{ request()->is('admin/centers') ? 'active' : ''}}">
            <i class="nav-icon fas fa-hospital-alt"></i>
              <p>
                  Health Centers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/vaccines')}}" class="nav-link {{ request()->is('admin/vaccines') ? 'active' : ''}}">
            <i class="nav-icon fas fa-syringe"></i>
              <p>
                  Vaccines
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url('/admin/home-requests')}}" class="nav-link {{ request()->is('admin/home-requests') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>Home Requests</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/center-requests')}}" class="nav-link {{ request()->is('admin/center-requests') ? 'active' : ''}}">
              <i class="nav-icon fas fa-hospital-alt"></i>
              <p>Center Requests</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/at-birth')|| request()->is('admin/6th-week')|| request()->is('admin/10th-week')|| request()->is('admin/14th-week')|| request()->is('admin/9th-month')|| request()->is('admin/15th-month') ? 'menu-open' : ''}}"> 

            <a href="{{url('')}}" class="nav-link {{ request()->is('admin/at-birth')|| request()->is('admin/6th-week')|| request()->is('admin/10th-week')|| request()->is('admin/14th-week')|| request()->is('admin/9th-month')|| request()->is('admin/15th-month') ? 'active menu-open' : ''}}">

              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Schedule Vaccine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/at-birth')}}" class="nav-link {{ request()->is('admin/at-birth') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>At Birth</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/6th-week')}}" class="nav-link {{ request()->is('admin/6th-week') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>6th Weeks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/10th-week')}}" class="nav-link {{ request()->is('admin/10th-week') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>10th Weeks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/14th-week')}}" class="nav-link {{ request()->is('admin/14th-week') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>14th Weeks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/9th-month')}}" class="nav-link {{ request()->is('admin/9th-month') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>9th Months</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/15th-month')}}" class="nav-link {{ request()->is('admin/15th-month') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>15th Months</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/home-child') || request()->is('admin/center-child')? 'menu-open' : ''}}">
            
            <a href="{{url('')}}" class="nav-link {{ request()->is('admin/home-child') || request()->is('admin/center-child')? 'active menu-open' : ''}}">
              <i class="nav-icon fas fa-child"></i>
              <p>
               All Child's
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/home-child')}}" class="nav-link {{ request()->is('admin/home-child') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="fas fa fa-home"></i>
                  <p>Home Child's
                     
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/center-child')}}" class="nav-link {{ request()->is('admin/center-child') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="fas fa fa-hospital-alt"></i>
                  <p>Center Child's
                     
                  </p>
                </a>
              </li>
            </ul>
          </li>




          


          
          <li class="nav-item">
            <a href="{{url('/admin/user-feedback')}}" class="nav-link {{ request()->is('admin/user-feedback') ? 'active' : ''}}">
              
              
              <i class="nav-icon fas fa-comments"></i>
              <p>
               User's Feedback
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/admin/generate-reports')}}" class="nav-link {{ request()->is('admin/generate-reports') ? 'active' : ''}}">
              
              <!-- <i class="nav-icon fa fa-line-chart"></i> -->
              <i class="nav-icon fas fa-flag-checkered"></i>
              <!-- <i class="fas fa-file-chart-line"></i> -->
              <p>
               Generate Reports
              </p>
            </a>
          </li>
        </ul>
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>