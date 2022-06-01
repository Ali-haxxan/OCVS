<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  @include('User/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('User/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1> vaccination Venu and Staff </h1>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            {{-- @foreach ($children as $childs) --}}
            @if ($homeChild != null)
                {{-- {{$children}} --}}
            
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <h1>Vaccination Staff</h1>
                <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>Staff Name</th>
                    <th>CNIC</th>
                    <th>Phone Number</th>
                    <th>City</th>
                    <th>Address</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($hchildren as $childs)
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$childs->child_name}}</td>
                    <td>{{$childs->f_name}}</td>
                    <td>{{$childs->f_cnic}}</td>
                    <td>{{$childs->gender}}</td>
                    <td>{{$childs->staff_name}}</td>
                    <td>{{$childs->staff_cnic}}</td>
                    <td>{{$childs->staff_ph_number}}</td>
                    <td>{{$childs->staff_city}}</td> 
                    <td>{{$childs->address}}</td>
                  </tr>
                      
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @else
            @if ($centerChild = null && $homeChild = null)
            <div class="card">
              <div class="card-body">
                <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div>
                <h2>No Venue Center and Staff available</h2>
              </div>
            </div> 
            @endif
            
            @endif

            

            {{-- Center Form --}}

            @if ($centerChild != null)
                {{-- {{$children}} --}}
            
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <h1>Vaccination Center</h1>
                <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>Center</th>
                    <th>City</th>
                    <th>Tehsil</th>
                    <th>Phone Number</th>
                    <th>Timings</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($Cchildren as $child)
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$child->child_name}}</td>
                    <td>{{$child->f_name}}</td>
                    <td>{{$child->f_cnic}}</td>
                    <td>{{$child->gender}}</td>
                    <td>{{$child->center_name}}</td>
                    <td>{{$child->center_city}}</td>
                    <td>{{$child->center_tehsil}}</td>
                    <td>{{$child->center_ph_number}}</td>
                    <td>{{$child->center_timing}}</td> 
                  </tr>
                      
                  @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            @endif
            {{-- @endforeach --}}
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
  @include('User/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('User/script')
</body>
</html>
