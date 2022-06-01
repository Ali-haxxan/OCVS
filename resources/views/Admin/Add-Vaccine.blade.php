<!DOCTYPE html>
<html lang="en">
  @include('Admin/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Preloader -->
{{-- <div class="preloader flex-column justify-content-center align-items-center">
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
            <h1>Vaccines</h1>
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
                      
            
                    
                  </div>
                  <div class="col-8 text-right">
                    <button type="button" class="btn btn-sm btn-info">
                      <i class="fa fa-plus"></i>
                      {{-- <p> Add New</p> --}}
                    </button>
                    <p> </p>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR#</th>
                    <th>Vaccine Name</th>
                    <th>Type</th>
                    <th>Diseases Prevent</th>
                    <th>Causes</th>
                    <th>Time of Vaccination</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>01</td>
                    <td>OPV-II</td>
                    <td>Drops</td>
                    <td>Polio-Virus</td>
                    <td>Fever</td>
                    <td>At Birth</td>
                    <td>
                      <!-- Call to action buttons -->
                      <ul class="list-inline m-0">
                        
                          <li class="list-inline-item">
                              <button class="btn btn-success btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button><p></p>
                          </li>
                        
                          <li class="list-inline-item">
                              <button class="btn btn-danger btn-sm " type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                          </li>
                        
                      </ul>
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
