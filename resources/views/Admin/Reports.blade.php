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
            <h1>Reports</h1>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            {{-- <div class="card"> --}}
              
              <!-- /.card-header -->
              {{-- <div class="card-body"> --}}
                <div class="card px-5 py-5">
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                  <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);
              
                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['Month', 'No. of Childs'],
                        <?php echo $currentmonth_count ?>
                      ]);
              
                      var options = {
                        chart: {
                          title: 'Monthly Report',
                          subtitle: 'vaccinated childs Per Month:',
                        }
                      };
              
                      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
              
                      chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>
                  <div id="columnchart_material" style="width: Auto; height: 500px;"></div>
                </div>
                <div class="card px-5 py-5">
                  <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(draw2Chart);
              
                    function draw2Chart() {
                      var data = google.visualization.arrayToDataTable([
                        ['Year', 'No. of Childs'],
                        <?php echo $yearwise_count ?>
                      ]);
              
                      var options = {
                        chart: {
                          title: 'Yearly Report',
                          subtitle: 'vaccinated Childs Per Year:',
                        }
                      };
              
                      var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));
              
                      chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>
                  <div id="columnchart_material2" style="width: Auto; height: 500px;"></div>
                </div>
              {{-- </div> --}}
              <!-- /.card-body -->
            {{-- </div> --}}
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
  @include('Admin.footer')

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
