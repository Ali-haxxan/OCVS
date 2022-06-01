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

  @include('Admin/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>At Birth</h1>
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




                    <?php
                      $i = 1;
                      
                      ?>
                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/7 <= 1)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(1-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+1)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach 
                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/7 > 5 && (now()->diffinDays($child->dob))/7 < 7)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(42-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+42)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach 
                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/7 > 9 && (now()->diffinDays($child->dob))/7 < 11)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(70-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+70)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach 
                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/7 > 13 && (now()->diffinDays($child->dob))/7 < 15)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(98-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+98)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach 
                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/30 > 8 && (now()->diffinDays($child->dob))/30 < 10)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(270-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+270)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach 

                  @foreach ($children as $child)
                    @if ((now()->diffinDays($child->dob))/30 > 14 && (now()->diffinDays($child->dob))/30 < 16)
                      <tr>
                        <span>{{$i++}}-</span><span> {{$child->child_name}} upcomming vaccine date is 
                          @if ($child->dob < Carbon\Carbon::now())
                          <?php 
                          $date = Carbon\Carbon::now()->addDays(450-(now()->diffinDays($child->dob)))->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                          @else
                          <?php 
                          $date = Carbon\Carbon::now()->addDays((now()->diffinDays($child->dob))+450)->format('d-m-Y')
                          ?>
                          <span>{{$date}}</span>
                           @endif  </span><p></p>
                      </tr>
                    @endif 
                  @endforeach


                  

                  
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
