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
            <h1>Get Certificate</h1>
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
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SR#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ChildsInfo as $item)
                    <tr>
                      {{-- <td>{{$loop->iteration}}</td> --}}
                      <td>{{$item->id}}</td>
                      <td>{{$item->child_name}}</td>
                      <td>{{$item->f_name}}</td>
                      <td>{{$item->f_cnic}}</td>
                      <td>{{$item->gender}}</td>
                      <td>
                        <!-- Call to action buttons --> 
                       <form action="{{url('/certificate',$item->id)}}" target="_blank" method="POST">
                        @csrf
                          <button class="btn btn-success btn-sm"  type="submit" data-toggle="tooltip" data-placement="top" title="Generate Certificate">Certificate</button></a>
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

@include('User/script')
</body>
</html>
