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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div>
          
        <h2 class="title">Feedback</h2>
        <div class="form-group">
          <form action="{{url('user-feedback',$LoggeduserInfo->id)}}" method="POST">
            @csrf
              <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="10" required></textarea><p></p>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        
        
        </div>
       
        
      </div><!-- /.container-fluid -->
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

@include('User/script')
</body>
</html>
