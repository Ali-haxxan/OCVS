<!DOCTYPE html>
<html lang="en">
  @include('Admin/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
{{-- <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/vacine.png')}}" alt="Vaccine" height="60" width="60">
  </div> --}}

      <!-- Navbar -->
      @include('Admin/navbar')
      <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
      @include('Admin/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Home Child's</h1>
          </div>
        </div>
        <div class="row ">
          <div class="col-4">
                <Input type="search" class="form-control form-control-sm" placeholder="Search"> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>Phone No.</th>
                    <th>City</th>
                    <th>Age</th>
                    <th>Staff</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($Childsstaff as $child)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$child->child_name}}</td>
                    <td>{{$child->f_name}}</td>
                    <td>{{$child->f_cnic}}</td>
                    <td>{{$child->gender}}</td>
                    <td>{{$child->number}}</td>
                    <td>{{$child->city}}</td>
                    @if ((now()->diffinDays($child->dob))/7 <= 1)
                    <td>{{floor(now()->diffinDays($child->dob))}} Day's</td>
                    @endif
                    @if ((now()->diffinDays($child->dob))/7 > 1 && (now()->diffinDays($child->dob))/30 <= 1 )
                    <td>{{floor((now()->diffinDays($child->dob))/7)}} Week's</td>
                    @endif
                    @if ((now()->diffinDays($child->dob))/30 > 1 && (now()->diffinDays($child->dob))/365 <= 2 )
                    <td>{{floor((now()->diffinDays($child->dob))/30)}} Month's</td>
                    @endif
                    @if ((now()->diffinDays($child->dob))/365 > 2 )
                    <td>{{floor((now()->diffinDays($child->dob))/365)}} Years's</td>
                    @endif
                    <td>{{$child->staff_name}}</td>
                  </tr>
                  
                      
                  @endforeach
                  
                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('Admin/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('Admin/script')
</body>
</html>
