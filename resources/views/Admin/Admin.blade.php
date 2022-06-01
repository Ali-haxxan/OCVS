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
            <h1>Medical Staff</h1>
            
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>




                                        {{-- Modal --}}

    <!-- Add  Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalCenterTitle">New Medical Staff</h5>
        <button type="button" class="close close_add" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
              <ul id="saveform_errlist"></ul>

              <div class="form-group mb-3">
                  <label for="">Full Name:</label>
                  <input type="text" required class="name form-control" placeholder="Name...">
              </div>
              <div class="form-group mb-3">
                  <label for="">CNIC:</label>
                  <input type="text" required class="cnic form-control" placeholder="3520212345678">
              </div>
              <div class="form-group mb-3">
                  <label for="">Phone No.</label>
                  <input type="text" required class="number form-control" placeholder="03001234567">
              </div>
              <div class="form-group mb-3">
                  <label for="">City:</label>
                  <input type="text" required class="city form-control" placeholder="City...">
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_add" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary addModel">Save</button>
      </div>
    </div>
  </div>
</div>
     

     <!--End - Add  Modal -->



     {{-- Edit Modal --}}

     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalCenterTitle">Edit Medical Staff</h5>
            <button type="button" class="close close_edit" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
                  <ul id="updateform_errlist"></ul>
                  <input type="hidden" id="edit_staff_id" >
                  <div class="form-group mb-3">
                      <label for="">Full Name:</label>
                      <input type="text" id="edit_name" required class="name form-control">
                  </div>
                  <div class="form-group mb-3">
                      <label for="">CNIC:</label>
                      <input type="text" id="edit_cnic" required class="course form-control">
                  </div>
                  <div class="form-group mb-3">
                      <label for="">Phone No.</label>
                      <input type="text" id="edit_number" required class="email form-control">
                  </div>
                  <div class="form-group mb-3">
                      <label for="">City:</label>
                      <input type="text" id="edit_city" required class="phone form-control">
                  </div>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close_edit" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary update_staff">Save changes</button>
          </div>
        </div>
      </div>
    </div>

{{-- End- Edit Modal --}}


{{-- Delete Modal --}}

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalCenterTitle">Delete Medical Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Confirm to Delete Medical Staff ?</h4>
        <input type="hidden" id="staff_id">
      </div>
      <div class="modal-footer">
        
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary delete_staff">Yes Delete</button>
      
      </div>
    </div>
  </div>
</div>
{{-- End - Delete Modal --}}



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-4" id="success_message"></div>
                <div class="row ">
          
            
                  <div class="col-4">
                    
                      
                        <Input type="search" class="form-control form-control-sm" placeholder="Search">
                      
            
                    
                  </div>
                  <div class="col-8 text-right">
                    <button type="button" data-toggle="modal"
                    data-target="#AddModal" class="btn btn-sm btn-info">
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
                    <th>Name</th>
                    <th>CNIC</th>
                    <th>Phone No.</th>
                    <th>City</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  
                  
                  
                  </tbody>
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
                

                            {{-- jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function () {


      // Show Table Body Part 

    fetchstaff();

    function fetchstaff() {
      $.ajax({
        type: "GET",
        url: "/admin/fetch-staff",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            var i=1;
             $.each(response.staff, function (key, item) {
                 $('tbody').append('<tr>\
                     <td>'+ i +'</td>\
                     <td>'+ item.staff_name +'</td>\
                     <td>'+ item.staff_cnic +'</td>\
                     <td>'+ item.staff_ph_number +'</td>\
                     <td>'+ item.staff_city +'</td>\
                     <td><button class="btn btn-success btn-sm mx-2 editbtn" value="'+ item.id  +'" type="button"  title="Edit"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm deletebtn" value="'+ item.id  +'" type="button" title="Delete"><i class="fa fa-trash"></i></button></td>\
                 </tr>');
                 i++;
               });
             }
      });
    }

    //  End Show Table Body Part



    //  Create Model Part ans store to database

  $(document).on('click','.addModel',function (e) {
    e.preventDefault();

    var data = {
                'name': $('.name').val(),
                'cnic': $('.cnic').val(),
                'number': $('.number').val(),
                'city': $('.city').val(),
            }
            
            $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
              }); 

            $.ajax({
               type: "POST",
               url: "/admin/add-staff",
               data: data,
               dataType: "json",
               success: function (response) {
                  //  console.log(response);
                if(response.status == 400){
                    $('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass('alert alert-danger');{
                      $.each(response.errors, function (key, err_value) {
                    $('#saveform_errlist').append('<li>' + err_value + '</li>');    
                    });
                    }
                    
                }
                else{
                  $('#saveform_errlist').html("");
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#AddModal').modal('hide');
                  $('#saveform_errlist').html("");
                  $('#saveform_errlist').removeClass('alert alert-danger');
                  $('#AddModal').find('input').val('');
                  $("#success_message").fadeOut(5000);
                  fetchstaff();
                }

               }
           });

  });

  //  End Create Model Part ans store to database


    // Start Add Model Close Button

    $(document).on('click','.close_add', function () {
                  $('#saveform_errlist').html("");
                  $('#saveform_errlist').removeClass('alert alert-danger');
                  $('#AddModal').find('input').val('');
    });

  // End Add Model Close Button


  // Start Edit Model Close Button

  $(document).on('click','.close_edit', function () { 
                  $('#updateform_errlist').html("");
                  $('#updateform_errlist').removeClass('alert alert-danger');
    });

  // End Edit Model Close Button


  // Open Edit Model to Edit Staff


  $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var staff_id = $(this).val();
            // console.log(staff_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/edit-staff/" + staff_id,
                success: function (response) {
                  // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {

                      
                      
                        $('#edit_staff_id').val(staff_id);
                        $('#edit_name').val(response.staff.staff_name);
                        $('#edit_cnic').val(response.staff.staff_cnic);
                        $('#edit_number').val(response.staff.staff_ph_number);
                        $('#edit_city').val(response.staff.staff_city);
                     
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        //  End Open Edit Model to Edit Staff



        // Update Edit Model and save to database
        
        $(document).on('click', '.update_staff', function (e) {
            e.preventDefault();

            $(this).text('Updating...');
            var id = $('#edit_staff_id').val();
            // alert(id);

            var data = {
                'name': $('#edit_name').val(),
                'cnic': $('#edit_cnic').val(),
                'number': $('#edit_number').val(),
                'city': $('#edit_city').val(),  
            }
            // console.log(data)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/admin/update-staff/" +id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {

                      $('#updateform_errlist').html("");
                      $('#updateform_errlist').addClass('alert alert-danger');{
                      $.each(response.errors, function (key, err_value) {
                      $('#updateform_errlist').append('<li>' + err_value + '</li>');    
                      });
                      $('.update_staff').text('Update');
                      }

                        // $('.update_staff').text('Update');
                    } 
                    else if(response.status == 404){
                        $('#updateform_errlist').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.update_staff').text('Update');

                    }
                    else {
                        $('#updateform_errlist').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        // $('#editModal').find('input').val('');
                        $('.update_staff').text('Update');
                        $('#editModal').modal('hide');
                        $("#success_message").fadeOut(5000);
                        fetchstaff();
                    }
                }
            });

        });

        //  End Update Edit Model and save to database



        //  Calling Delete Model and delete from database 
        
        $(document).on('click','.deletebtn', function (e) {
          e.preventDefault();
            var staff_id = $(this).val();
            // console.log(staff_id);
            $('#staff_id').val(staff_id);
            $('#deleteModal').modal('show');
        });
        $(document).on('click','.delete_staff', function (e) {
          e.preventDefault();
          $(this).text('Deleting...');
          var staff_id = $('#staff_id').val();

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({
            type: "delete",
            url: "/admin/delete-staff/" +staff_id,
            success: function (response) {
              // console.log(response);
              $('#success_message').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#deleteModal').modal('hide');
              $('.delete_staff').text('Yes Delete');
              $("#success_message").fadeOut(5000);
              fetchstaff();
            }
          });

        });

        //  End Calling Delete Model and delete from database


});



</script>
@include('Admin/script')
</body>
</html>
