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
            <h1>Generate Certificate</h1>
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
                <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"> 
                          <p></p>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR#</th>
                    <th>Child Name</th>
                    <th>Father/Mother Name</th>
                    <th>Father/Mother CNIC</th>
                    <th>Gender</th>
                    <th>Venu</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>01</td>
                    <td>Rehan
                    </td>
                    <td>Razzaq</td>
                    <td> 35202-3435117-2</td>
                    <td>Male</td>
                    <td>Home</td>
                    <td>vaccinated 
                    </td>
                      
                    <td>
                       <button class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">Generate</button>
                  </td>
                  </tr>
                  
                  
                  
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
