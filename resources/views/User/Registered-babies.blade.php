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
                    <input type="hidden" id="edit_child_id" >
                    <div class="form-group mb-3">
                        <label for="">Child Name:</label>
                        <input type="text" id="edit_name" name="name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Gender:</label>
                        <select class=" form-control" id="edit_gender" name="gender">
                          <option selected> Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Father Name:</label>
                        <input type="text" id="edit_fname" name="name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Father CNIC:</label>
                        <input type="text" id="edit_fcnic" name="name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Mother Name:</label>
                        <input type="text" id="edit_mname" name="name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Mother CNIC:</label>
                        <input type="text" id="edit_mcnic" name="name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Date of Birth:</label>
                          <input type="date" id="edit_date" class="form-control" name="date" data-target="#reservationdate"/>
                          
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Vaccination Venu:</label>
                        <select class=" form-control" id="edit_venu" name="venue">
                          <option selected> Select Venu</option>
                          <option value="Home">Home</option>
                          <option value="Center">Center</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">City:</label>
                        <input type="text" id="edit_city" required class="course form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Address:</label>
                        <input type="text" id="edit_address" required class="email form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone No.</label>
                        <input type="text" id="edit_number" required class="phone form-control">
                    </div>
      
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close_edit" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_child">Save changes</button>
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
              <h5 class="modal-title" id="deleteModalCenterTitle">Delete Registered Child</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>Confirm to Delete Registered Child ?</h4>
              <input type="hidden" id="child_id">
            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_child">Yes Delete</button>
            
            </div>
          </div>
        </div>
      </div>
      {{-- End - Delete Modal --}}
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Registered Childs</h1>
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
                <div class="col-4" id="success_message"></div>
                <div class="row ">
                  <div class="col-4">
                        <Input type="search" class="form-control form-control-sm" placeholder="Search"><p></p> 
                  </div>
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr#</th>
                    <th>Child Name</th>
                    <th>Father Name</th>
                    <th>Father CNIC</th>
                    <th>Gender</th>
                    <th>age</th>
                    <th>Contact No.</th>
                    <th>Action</th>
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
  @include('User/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {


    // Show Table Body Part 

    fetchChild();

    function fetchChild() {
      var i = 0;
    $.ajax({
      type: "GET",
      url: "/fetch-child",
      dataType: "json",
      success: function (response) {
          // console.log(response);
          
          $('tbody').html("");
          var i = 0;
           $.each(response.child, function (key, item) {
            var date2 = item.dob;

            var date1 = (new Date()).toISOString().split('T')[0]
            const diffInMs   = new Date(date1) - new Date(date2)
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            var age;
            var string;
              if (diffInDays/7 <= 1){
                age1 = diffInDays;
                age = Math.round(age1); 
                string = 'Days';
              }
              
                    
              if (diffInDays/7 > 1 && diffInDays/30 <= 1 ){
                age1 = diffInDays/7; 
                age = Math.round(age1);
                string = 'Weeks';
              }
                 
              if (diffInDays/30 > 1 && diffInDays/365 <= 2 ){
                age1 = diffInDays/30; 
                age = Math.round(age1);
                string = 'Months';
              }
                 
                    
              if (diffInDays/365 > 2 ){
                
                age1 = diffInDays/365; 
                age = Math.round(age1);
                string = 'Years';
              }
             
                   
            
            // console.log(diffInDays)
               $('tbody').append('<tr>\
                   <td>'+ (i+1) +'</td>\
                   <td>'+ item.child_name +'</td>\
                   <td>'+ item.f_name +'</td>\
                   <td>'+ item.f_cnic +'</td>\
                   <td>'+ item.gender +'</td>\
                   <td>'+ age +' '+string +'</td>\
                   <td>'+ item.number +'</td>\
                   <td><button class="btn btn-success btn-sm mx-2 editbtn" value="'+ item.id +'" type="button"  title="Edit"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm mx-2 deletebtn" value="'+ item.id +'" type="button" title="Delete"><i class="fa fa-trash"></i></button></td>\
               </tr>');
                i++;
             });
           }
    });
    }

    //  End Show Table Body Part


    // Start Edit Model Close Button

    $(document).on('click','.close_edit', function () { 
                  $('#updateform_errlist').html("");
                  $('#updateform_errlist').removeClass('alert alert-danger');
    });

  // End Edit Model Close Button


  // Open Edit Model to Edit Staff


  $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var child_id = $(this).val();
            // console.log(staff_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/edit-child/" + child_id,
                success: function (response) {
                  // console.log(response.child.gender);

                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } 
                    else {
                        $('#edit_child_id').val(child_id);
                        $('#edit_name').val(response.child.child_name);
                        $('#edit_gender').val(response.child.gender);
                        $('#edit_fname').val(response.child.f_name);
                        $('#edit_fcnic').val(response.child.f_cnic);
                        $('#edit_mname').val(response.child.m_name);
                        $('#edit_mcnic').val(response.child.m_cnic);
                        $('#edit_date').val(response.child.dob);
                        $('#edit_venu').val(response.child.venue);
                        $('#edit_city').val(response.child.city);
                        $('#edit_address').val(response.child.address);
                        $('#edit_number').val(response.child.number);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        //  End Open Edit Model to Edit Staff


        


        // Update Edit Model and save to database
        
        $(document).on('click', '.update_child', function (e) {
            e.preventDefault();

            $(this).text('Updating...');
            var id = $('#edit_child_id').val();
            // console.log(id)

            var data = {
                'name': $('#edit_name').val(),
                'gender': $('#edit_gender').val(),
                'fname': $('#edit_fname').val(),
                'fcnic': $('#edit_fcnic').val(), 
                'mname': $('#edit_mname').val(), 
                'mcnic': $('#edit_mcnic').val(), 
                'date': $('#edit_date').val(), 
                'venu': $('#edit_venu').val(), 
                'city': $('#edit_city').val(), 
                'address': $('#edit_address').val(), 
                'number': $('#edit_number').val(),  
            }
            // console.log(data)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

              $.ajax({
                type: "POST",
                url: "/update-child/" + id,
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
                          $('.update_child').text('Update');
                          }
                        
                            // $('.update_staff').text('Update');
                        } 
                        else if(response.status == 404){
                            $('#updateform_errlist').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.update_child').text('Update');
                        
                        }
                        else {
                            $('#updateform_errlist').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            // $('#editModal').find('input').val('');
                            $('.update_child').text('Update');
                            $('#editModal').modal('hide');
                            fetchChild();
                        }
                    }
              });

        });
        //  End Update Edit Model and save to database

         //  Calling Delete Model and delete from database 
        
         $(document).on('click','.deletebtn', function (e) {
          e.preventDefault();
            var child_id = $(this).val();
            // console.log(vaccine_id);
            $('#child_id').val(child_id);
            $('#deleteModal').modal('show');
        });
        $(document).on('click','.delete_child', function (e) {
          e.preventDefault();
          $(this).text('Deleting...');
          var child_id = $('#child_id').val();

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({
            type: "POST",
            url: "/delete-child/" + child_id,
            success: function (response) {
              // console.log(response);
              // $('#success_message').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#deleteModal').modal('hide');
              $('.delete_child').text('Yes Delete');
              $("#success_message").fadeOut(5000);
              fetchChild();
            }
          });

        });

        //  End Calling Delete Model and delete from database

});


</script>
@include('User/script')
</body>
</html>
