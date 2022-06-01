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
              <h1>Health Centers</h1>
              {{-- {{$cities}} --}}
            </div>
          </div>
          
        </div><!-- /.container-fluid -->
      </section>
  
                                        {{-- Modal --}}

    <!-- Add Center  Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddModalCenterTitle">New Health Center</h5>
            <button type="button" class="close close_add" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
        
            <ul id="saveform_errlist"></ul>
            

            <div class="form-group mb-3">

              

                <label for="">Health Center Name:</label>
                <input type="text" required class="name form-control" placeholder="Name...">
            </div>
            <div class="form-group mb-3">
                <label for="">City:</label>
                <input type="text" required class="city form-control" placeholder="City...">
            </div>
            <div class="form-group mb-3">
                <label for="">Tehsil:</label>
                <input type="text" required class="tehsil form-control" placeholder="Tehsil">
            </div>
            <div class="form-group mb-3">
                <label for="">Phone No.</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="" name="phone_number" class="number form-control " data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Phone Number..." required>
                  </div>
              </div>
            <div class="form-group mb-3">
                <label for="">Timing:</label>
                <input type="text" required class="timing form-control" placeholder="09:00 AM - 06:00 PM">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close_add" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary addModel">Save</button>
        </div>
        </div>
      </div>
    </div>
         
    
         <!--End - Add Center  Modal -->
    
    
    

    
         {{-- Edit Modal --}}
    
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModalCenterTitle">Edit Health Center</h5>
                <button type="button" class="close close_edit" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
            
                <ul id="updateform_errlist"></ul>
                <input type="hidden" id="edit_center_id" >
                <div class="form-group mb-3">
                    <label for="">Health Center Name:</label>
                    <input type="text" id="edit_name" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">City:</label>
                    <input type="text" id="edit_city" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Tehsil:</label>
                    <input type="text" id="edit_tehsil" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No.</label>
                    <input type="text" id="edit_number" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Timing:</label>
                    <input type="text" id="edit_timing" required class="form-control">
                </div>
  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_edit" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_center">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    
    {{-- Edn- Edit Modal --}}
    
    
    {{-- Delete Modal --}}
    
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalCenterTitle">Delete Health Center</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Confirm to Delete Center ?</h4>
            <input type="hidden" id="center_id">
          </div>
          <div class="modal-footer">
            
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary delete_center">Yes Delete</button>
          
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
                      <button type="button" class="btn btn-sm btn-info mx-2" data-toggle="modal"
                      data-target="#AddModal">
                        <i class="fa fa-plus"></i>
                      </button>
                      <p> </p>
                    </div>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>SR#</th>
                      <th>Health Center</th>
                      <th>City</th>
                      <th>Tehsil</th>
                      <th>Phone No</th>
                      <th>Timings</th>
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

    fetchcenter();

    function fetchcenter() {
      $.ajax({
        type: "GET",
        url: "/admin/fetch-center",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            var i = 1;
             $.each(response.center, function (key, item) {
                 $('tbody').append('<tr>\
                     <td>'+ i +'</td>\
                     <td>'+ item.center_name +'</td>\
                     <td>'+ item.center_city +'</td>\
                     <td>'+ item.center_tehsil +'</td>\
                     <td>'+ item.center_ph_number +'</td>\
                     <td>'+ item.center_timing +'</td>\
                     <td><button class="btn btn-success btn-sm mx-2 editbtn" value="'+ item.id +'" type="button"  title="Edit"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm deletebtn" value="'+ item.id +'" type="button" title="Delete"><i class="fa fa-trash"></i></button></td>\
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
                'city': $('.city').val(),
                'tehsil': $('.tehsil').val(),
                'number': $('.number').val(),
                'timing': $('.timing').val(),
            }
            // console.log(data)
            $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
              }); 

            $.ajax({
               type: "POST",
               url: "/admin/add-center",
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
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message)
                  $('#saveform_errlist').html("");
                  $('#saveform_errlist').removeClass('alert alert-danger');;
                  $('#AddModal').modal('hide');
                  $('#AddModal').find('input').val('');
                  $("#success_message" ).fadeOut(5000);
                  fetchcenter();
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
            var center_id = $(this).val();
            // console.log(center_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/edit-center/" + center_id,
                success: function (response) {
                  // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                      
                        // console.log(response.center.city);
                        $('#edit_center_id').val(center_id);
                        $('#edit_name').val(response.center.center_name);
                        $('#edit_city').val(response.center.center_city);
                        $('#edit_tehsil').val(response.center.center_tehsil);
                        $('#edit_number').val(response.center.center_ph_number);
                        $('#edit_timing').val(response.center.center_timing);
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        //  End Open Edit Model to Edit Staff



        // Update Edit Model and save to database
        
        $(document).on('click', '.update_center', function (e) {
            e.preventDefault();

            $(this).text('Updating...');
            var id = $('#edit_center_id').val();
            // console.log(id)

            var data = {
                'name': $('#edit_name').val(),
                'city': $('#edit_city').val(),
                'tehsil': $('#edit_tehsil').val(),
                'number': $('#edit_number').val(),
                'timing': $('#edit_timing').val(),  
            }
            // console.log(data)
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "put",
                url: "/admin/update-center/" +id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                      $('#updateform_errlist').html("");
                      $('#updateform_errlist').addClass('alert alert-danger');{
                      $.each(response.errors, function (key, err_value) {
                      $('#updateform_errlist').append('<li>' + err_value + '</li>');  });
                      $('.update_center').text('Update');
                      }

                        // $('.update_center').text('Update');
                    } 
                    else if(response.status == 404){
                        $('#updateform_errlist').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.update_center').text('Update');

                    }
                    else {
                        $('#updateform_errlist').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        // $('#editModal').find('input').val('');
                        $('.update_center').text('Update');
                        $('#editModal').modal('hide');
                    }
                    $("#success_message" ).fadeOut(5000);
                    fetchcenter();
                }
            });

        });

        //  End Update Edit Model and save to database



        //  Calling Delete Model and delete from database 
        
        $(document).on('click','.deletebtn', function (e) {
          e.preventDefault();
            var center_id = $(this).val();
            // console.log(center_id);
            $('#center_id').val(center_id);
            $('#deleteModal').modal('show');
        });
        $(document).on('click','.delete_center', function (e) {
          e.preventDefault();
          $(this).text('Deleting...');
          var center_id = $('#center_id').val();

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({
            type: "delete",
            url: "/admin/delete-center/" + center_id,
            success: function (response) {
              // console.log(response);
                
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#deleteModal').modal('hide');
              $('.delete_center').text('Yes Delete');
              $("#success_message").fadeOut(5000);
                fetchcenter();

            }
          });

        });

        //  End Calling Delete Model and delete from database

        // $("#success_message" ).fadeOut(5000);
});
</script>

@include('Admin/script')
</body>
</html>
