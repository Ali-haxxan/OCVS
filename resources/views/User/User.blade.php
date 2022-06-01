<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<body class="hold-transition sidebar-mini">
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
            <h1>Register your Child</h1>
            
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
              <div class="result col-4">
                      @if (Session::get('success'))
                      <div id="message" class="alert alert-success">
                          {{Session::get('success')}}
                          
                      </div>
                          
                      @endif
                      @if (Session::get('fail'))
                      <div id="message" class="alert alert-danger col-4">
                          {{Session::get('fail')}}
                      </div>
                          
                      @endif
                  </div>
                 <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div> 
                <form action="{{url('child-create',$LoggeduserInfo->id)}}" method="POST">
                  @csrf
                  
                    <div class="form-group">
                      
                  
                    <div class="row">
                      <label class="col-4">Child Name:</label><p></p>
                      <label class="col-6 mx-4">Gender:</label><p></p>
                        <input type="text" name="name" class="form-control form-control-sm col-4" required/>
                        <p> </p>
                        
                        <select class=" form-control form-control-sm col-4 mx-4" name="gender" required>
                          <option> Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div><p></p>

                    <div class="row">
                      <label class="col-4">Father Name:</label><p></p>
                      <label class="col-6 mx-4">Father CNIC:</label><p></p>
                        <input type="text" name="fname" class="form-control form-control-sm col-4" required/>
                        
                        
                        <input type="text" name="fcnic"class="form-control form-control-sm col-4 mx-4" required/>
                        
                    </div><p></p> 
                        
                    
                        
                    

                    <div class="row">
                      <label class="col-4">Mother Name:</label><p></p>
                      <label class="col-6 mx-4">Mother CNIC:</label><p></p>
                        <input type="text" name="mname" class="form-control form-control-sm col-4" required/>
                        
                        
                        <input type="text" name="mcnic" class="form-control form-control-sm col-4 mx-4" required/>
                        
                    </div><p></p> 

                    
                    
                    <div class="row">
                      <label class="col-4">Date of Birth:</label><p></p>
                      <label class="col-6 mx-4">Vaccination Venu:</label><p></p>
                        {{-- <input type="text" class="form-control form-control-sm col-4"/> --}}
                          <div class="input-group date col-4" id="reservationdate" data-target-input="nearest">
                            <input type="date"  class="form-control form-control-sm " name="date" data-target="#reservationdate" required/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        
                        <select class=" form-control form-control-sm col-4 mx-4" name="venue" required>
                          <option> Select Venu</option>
                          <option value="Home">Home</option>
                          <option value="Center">Center</option>
                        </select>
                        
                    </div><p></p>
                    <div class="row">
                      <label class="col-4">City:</label><p></p>
                      <label class="col-6 mx-4">Address:</label><p></p>
                        <input type="text" name="city" class="form-control form-control-sm col-4" required/>
                        
                        
                        <input type="text" name="address" class="form-control form-control-sm col-4 mx-4" required/>
                        
                    </div><p></p>

                    <div class="row ">
                      <label class="col-10" >Phone No.</label><p></p>
                      <div class="input-group col-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" name="phone_number" class="form-control form-control-sm " data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Phone Number..." required>
                      </div>
                        
                        
                    </div><p></p>

                    {{-- <div class="row col-4">
                      <label class="col-4">Phone No.</label>
    
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="phone_number" class="form-control" data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Phone Number...">
                      </div>
                      <!-- /.input group -->
                    </div><p></p> --}}
                    <button type="submit" class="btn btn-primary">Register</button>
                  
                  </div>
                </form>  
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

