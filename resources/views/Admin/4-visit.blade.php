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
            <h1>14th Weeks</h1>
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
                          <p> </p>
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
                    <th>Contact No.</th>
                    <th>Vaccines</th>
                    <th>Venu</th>
                    <th>Age</th>
                    <th>Status</th>
                    <th>Mark As</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $i = 1;
                      
                      ?>

                    @foreach ($children as $child)
                    
                    @if ((now()->diffinDays($child->dob))/7 > 13 && (now()->diffinDays($child->dob))/7 < 15)
                    
                    @foreach ($Vaccines as $Vaccine)
                    
                    
                     
                    
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$child->child_name}}</td>
                      <td>{{$child->f_name}}</td>
                      <td>{{$child->f_cnic}}</td>
                      <td>{{$child->gender}}</td>
                      <td>{{$child->number}}</td>
                      <td>{{$Vaccine->vac_name}}</td>
                      <td>{{$child->venue}}</td>
                      
                      @if ((now()->diffinDays($child->dob))/7 <= 1)
                      <td>{{floor(now()->diffinDays($child->dob))}} Day's</td>
                      @endif
                       @if ((now()->diffinDays($child->dob))/7 > 1 && (now()->diffinDays($child->dob))/30 <= 1 )
                      <td>{{floor((now()->diffinDays($child->dob))/7)}} Week's</td>
                      @endif
                      @if ((now()->diffinDays($child->dob))/30 > 1 && (now()->diffinDays($child->dob))/365 <= 1 )
                      <td>{{floor((now()->diffinDays($child->dob))/30)}} Month's</td>
                      @endif
                      @if ((now()->diffinDays($child->dob))/365 > 2 )
                      <td>{{floor((now()->diffinDays($child->dob))/365)}} Years's</td>
                      @endif 
                      
                      @foreach ($childVacc as $Chvac)
                      @if ($Chvac->children_id == $child->id && $Chvac->vaccines_id == $Vaccine->id)
                      <td>Vaccinated</td>
                      <td>
                        <form action="{{url('/admin/child-unvaccinated4',$Chvac->id)}}" method="post">
                          @csrf
                            <button class="btn btn-danger btn-sm mx-2" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">Not Vaccinated</button>
                        
                          </form>          
                    </td> 
                      @break
                      @else
                      @if($loop->last)
                      {{-- @if ($Chvac->children_id != $child->id && $Chvac->vaccines_id != $Vaccine->id && $Chvac->children_id == $child->id && $Chvac->vaccines_id == $Vaccine->id) --}}
                          
                          
                          <td>Not Vaccinated</td>
                          <td>
                            <form action="{{url('/admin/child-vaccinated4',$child->id)}}" method="post">
                              @csrf
                                
                                  <input type="hidden" name="vaccId" value="{{$Vaccine->id}}">
                                    <button class="btn btn-success btn-sm mx-2" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">Vaccinated</button>
                                
                              </form>          
                          </td>

                          {{-- @endif --}}
                      @endif
                      @endif
                          
                      

                      @endforeach
                      {{-- <td>Not Vaccinated</td>
                      <td>
                        <form action="{{url('/admin/child-vaccinated1',$child->id)}}" method="post">
                          @csrf
                            
                              <input type="hidden" name="vaccId" value="{{$Vaccine->id}}">
                                <button class="btn btn-success btn-sm mx-2 my-2" type="submit" data-toggle="tooltip" data-placement="top" title="Edit">Vaccinated</button>
                            
                          </form>          
                      </td> --}}
                      
                    </tr>
                    
                    @endforeach
                    @endif 
                  @endforeach


                  {{-- <tr>
                    <td>01</td>
                    <td>Rehan</td>
                    <td>Razzaq</td>
                    <td> 35202-3435117-2</td>
                    <td>Male</td>
                    <td>0300-0000000</td>
                    <td>OPV-1(O), Rotavirus-1(O), Pneumoccal-1(Inj), Pentavalent-1(Inj)</td>
                    <td>Home</td>
                    <td></td>
                      
                    <td>
                      <!-- Call to action buttons -->
                      <ul class="list-inline m-0">
                          
                          <li class="list-inline-item">
                              <button class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit">Vaccinated</button>
                          </li>
                          <p></p>
                          <li class="list-inline-item">
                              <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete">Unvaccinated</button>
                          </li>
                      </ul>
                  </td>
                  </tr> --}}
                  
                  
                  
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
