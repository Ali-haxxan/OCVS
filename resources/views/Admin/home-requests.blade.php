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
            <h1>Home Requests</h1>
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
                <div class="row ">
          
            
                  <div class="col-4">
                    
                      
                        <Input type="search" class="form-control form-control-sm" placeholder="Search">
                      
                          <p></p>
                    
                  </div>
                  <p></p>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>Contact No.</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Medical Staff</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($children as $child)
                    
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$child->child_name}}</td>
                      <td>{{$child->f_name}}</td>
                      <td>{{$child->f_cnic}}</td>
                      <td>{{$child->gender}}</td>
                      <td>{{$child->number}}</td>
                      <td>{{$child->city}}</td>
                      <td>{{$child->address}}</td>
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
                      {{-- <td>{{now()->diffinDays($child->dob)}}</td> --}}
                      
                      <td>
                        <form action="{{url('/admin/staff-proceded',$child->id)}}" method="post">
                          @csrf
                          <select class="custom-select mb-3" name="staff" required>
                            <option selected> select Staff</option>
                            @foreach ($medicalstaff as $staff)
                            <option value="{{$staff->id}}">{{$staff->staff_name}} | {{$staff->staff_city}}</option>
                            @endforeach 
                          </select>
                      </td>
                      </td> 
                      <td>
                            <button type="submit" class="btn btn-success " type="button" >Proceed</button> 
                          </form>          
                    </td>
                    </tr>
                  
                      
                  @endforeach
                  
                  </tfoot>
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
