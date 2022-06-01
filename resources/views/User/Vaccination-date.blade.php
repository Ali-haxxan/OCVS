<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <?php 
  $i = 1;
  ?> 

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
            <h1>Vaccination Scheduale</h1>
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
                    <th>Gender</th>
                    <th>Vaccines</th>
                    <th>Type</th>
                    <th>Disease Prevent</th>
                    <th>Side Effect's</th>
                    <th>Status</th>
                    <th>Venu</th>
                    <th>Vaccination Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($childs as $child)
                    @if ($child->staff_id != null || $child->center_id != null)
                    @foreach ($vaccines as $vaccine)

                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$child->child_name}}</td>
                      <td>{{$child->f_name}}</td>
                      <td>{{$child->gender}}</td>
                      <td>{{$vaccine->vac_name}}</td>
                      <td>{{$vaccine->vac_type}}</td>
                      <td>{{$vaccine->diseases_prevent}}</td>
                      <td>{{$vaccine->vac_causes}}</td>
                      @foreach ($childVacc as $Chvac)

                          @if ($Chvac->children_id == $child->id && $Chvac->vaccines_id == $vaccine->id)

                            <td>Vaccinated</td>

                            @break
                          @else
                            @if($loop->last)  

                                <td>Not Vaccinated</td>

                            @endif
                          @endif
                          
                      @endforeach


                      <td>{{$child->venue}}</td>
                      {{-- <td>{{$child->dob}}</td> --}}
                      
                      @if ($child->dob < Carbon\Carbon::now())
                      <td>{{Carbon\Carbon::now()->addDays($vaccine->vaccination_time-(now()->diffinDays($child->dob)))->format('d-m-Y')}}</td>
                      @else
                      <td>{{Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+$vaccine->vaccination_time)->format('d-m-Y')}}</td>
                      @endif
                        
                      {{-- @if ((now()->diffinDays($child->dob))/7 > 1)
                        @if (($vaccine->vaccination_time) > 1)
                        <td> Not Asap!</td>
                        @endif --}}
                      {{-- <td>{{ Carbon\Carbon::now()->addDays(7)->format('Y-m-d')}}</td>  --}}
                      {{-- @endif  --}}

                      
                      
                    {{-- @if ((now()->diffinDays($child->dob))/7 > 1 && (now()->diffinDays($child->dob))/28 < 1 )
                    <td>{{floor((now()->diffinDays($child->dob))/7)}} Week's</td>
                    @endif
                    @if ((now()->diffinDays($child->dob))/28 > 1 && (now()->diffinDays($child->dob))/365 < 1 )
                    <td>{{floor((now()->diffinDays($child->dob))/28)}} Month's</td>
                    @endif
                    @if ((now()->diffinDays($child->dob))/365 > 1 )
                    <td>{{floor((now()->diffinDays($child->dob))/365)}} Years's</td>
                    @endif --}}
                      
                    </tr>
                    @endforeach 
                    @endif
                    
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
