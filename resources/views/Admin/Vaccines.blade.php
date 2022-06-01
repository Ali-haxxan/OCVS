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
            <h1>Vaccines</h1>
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
            <h5 class="modal-title" id="AddModalCenterTitle">New Vaccine</h5>
            <button type="button" class="close close_add" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
                  <ul id="saveform_errlist"></ul>
    
                  <div class="form-group mb-3">
                      <label for="">Vaccine Name:</label>
                      <input type="text" required class="name form-control" placeholder="Vaccine Name...">
                  </div>
                  <div class="form-group mb-3">
                      <label for="">Type of Vaccine:</label>
                      <select class="form-control" id="selBox" class="type form-control"> 
                        <option id="blank_type"></option>
                        <option value="Oral">Oral</option>
                        <option value="Injection">Injection</option>
                      </select>
                  </div>
                  <div class="form-group mb-3">
                      <label for="">Diseases Prevent:</label>
                      <input type="text" required class="diseases_prevent form-control" placeholder="Diseases Prevent...">
                  </div>
                  <div class="form-group mb-3">
                      <label for="">Side Effects:</label>
                      <input type="text" required class="causes form-control" placeholder="Side Effects...">
                  </div>
                  <div class="form-group mb-3">
                    <label for="">Select--Age--In:</label>
                    <select class="form-control" id="Time" class="type form-control"> 
                      <option id="blank_time"></option>
                      <option value="Days">Days</option>
                      <option value="Weeks">Weeks</option>
                      <option value="Months">Months</option>
                    </select><p></p>
                    <input type="text" required class="vaccination_time form-control" placeholder="Define Days, Weeks or Months for Vaccination... ">
                </div>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close_add" data-dismiss="modal">Close</button>
            <button type="button" class="savebtn btn btn-primary">Save</button>
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
                <h5 class="modal-title" id="editModalCenterTitle">Edit Vaccine</h5>
                <button type="button" class="close close_edit" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                    <ul id="updateform_errlist"></ul>
                    <input type="hidden" id="edit_vaccine_id" >
                      <div class="form-group mb-3">
                        <label for="">Vaccine Name:</label>
                        <input type="text" id="edit_name" required class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Type:</label>
                        <select class="form-control" id="editSelBox"> 
                          <option value="Oral">Oral</option>
                          <option value="Injection">Injection</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Diseases Prevent:</label>
                        <input type="text" id="edit_diseases_prevent" required class="diseases_prevent form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Side Effects:</label>
                        <input type="text" id="edit_causes" required class="causes form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label for="">Age of Vaccination:</label>
                      <select class="form-control" id="edit_time" class="type form-control"> 
                        <option value="Days">Days</option>
                        <option value="Weeks">Weeks</option>
                        <option value="Months">Months</option>
                      </select><p></p>
                      <input type="text" id="edit_vaccination_time" required class="vaccination_time form-control">
                  </div>
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close_edit" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_vaccine">Save changes</button>
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
            <h5 class="modal-title" id="deleteModalCenterTitle">Delete Vaccine</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4>Confirm to Delete Vaccine ?</h4>
            <input type="hidden" id="vaccine_id">
          </div>
          <div class="modal-footer">
            
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary delete_vaccine">Yes Delete</button>
          
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
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddModal">
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
                    <th>Vaccine Name</th>
                    <th>Type</th>
                    <th>Diseases Prevent</th>
                    <th>Side Effects</th>
                    <th>Age of Vaccination</th>
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
          </div><p></p>
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

    fetchvaccine();

    function fetchvaccine() {
      $.ajax({
        type: "GET",
        url: "/admin/fetch-vaccine",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            
          $('tbody').html("");
          var i=1;
            $.each(response.vaccine, function (key, item) { 

              var date2 = item.vaccination_time;
              // console.log(date2)
            
            var age;
            var string;
              if (date2/7 < 1){
                age1 = date2;
                age = Math.floor(age1); 
                string = 'Days';
              }
              
                    
              if (date2/7 > 1 && date2/30 < 8 ){
                age1 = date2/7; 
                age = Math.round(age1);
                string = 'Weeks';
              }
                 
              if (date2/30 > 8 && date2/365 < 2 ){
                age1 = date2/30; 
                age = Math.round(age1);
                string = 'Months';
              }
                 
                    
              if (date2/365 > 2 ){
                
                age1 = date2/365; 
                age = Math.round(age1);
                string = 'Years';
              }
              
                $('tbody').append('<tr>\
                   <td>'+ i +'</td>\
                   <td>'+ item.vac_name +'</td>\
                   <td>'+ item.vac_type +'</td>\
                   <td>'+ item.diseases_prevent +'</td>\
                   <td>'+ item.vac_causes + '</td>\
                   <td>'+ age +' '+string +'</td>\
                   <td><button class="btn btn-success btn-sm mx-2 my-1 editbtn" value="'+ item.id +'" type="button"  title="Edit"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm mx-2 deletebtn" value="'+ item.id +'" type="button" title="Delete"><i class="fa fa-trash"></i></button></td>\
                   </tr>');
                   i++;
             });
           }
      });
    }

    //  End Show Table Body Part

            

    //  Create Model Part and store to database

  $(document).on('click','.savebtn',function (e) {
    e.preventDefault();

    

    var data = {
                'name': $('.name').val(),
                'type': $('#selBox').val(),
                'diseases_prevent': $('.diseases_prevent').val(),
                'causes': $('.causes').val(),
                'time_type': $('#Time').val(),
                'vaccination_time': $('.vaccination_time').val(),
            }
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                type: "POST",
                url: "/admin/add-vaccine",
                data: data,
                dataType: "json",
                success: function (response) {
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
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#AddModal').modal('hide');
                  $('#AddModal').find('input').val('');
                  $('#selBox').val('#blank_type');
                  $('#Time').val('#blank_time');
                  $("#success_message").fadeOut(5000);
                  fetchvaccine();
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
                  $('#selBox').val('#blank_type');
                  $('#Time').val('#blank_time');
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
            var vaccine_id = $(this).val();
            // console.log(vaccine_id);
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/edit-vaccine/" + vaccine_id,
                success: function (response) {
                  // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        // console.log(response.vaccine.name);
                        $('#edit_vaccine_id').val(vaccine_id);
                        $('#edit_name').val(response.vaccine.vac_name);
                        $('#editSelBox').val(response.vaccine.vac_type);  
                        $('#edit_diseases_prevent').val(response.vaccine.diseases_prevent);
                        $('#edit_causes').val(response.vaccine.vac_causes);
                        $('#edit_time').val(response.vaccine.time_in);
                        $('#edit_vaccination_time').val(response.vaccine.vaccination_time);
                    }
                }
            });
            $('.close_edit').find('input').val('');

        });

        //  End Edit Model to Edit Staff



        // Update Edit Model and save to database
        
        $(document).on('click', '.update_vaccine', function (e) {
            e.preventDefault();

            $(this).text('Updating...');
            var id = $('#edit_vaccine_id').val();
            // console.log(id)
            var data = {
                'name': $('#edit_name').val(),
                'type': $('#editSelBox').val(),
                'diseases_prevent': $('#edit_diseases_prevent').val(),
                'causes': $('#edit_causes').val(),
                'time_in': $('#edit_time').val(),
                'vaccination_time': $('#edit_vaccination_time').val(),  
            }
            // console.log(data)
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              type: "put",
              url: "/admin/update-vaccine/" +id,
              data: data,
              dataType: "json",
              success: function (response) {
                // console.log(response)
                if (response.status == 400) {
                $('#updateform_errlist').html("");
                $('#updateform_errlist').addClass('alert alert-danger');{
                $.each(response.errors, function (key, err_value) {
                $('#updateform_errlist').append('<li>' + err_value + '</li>');  });
                $('.update_vaccine').text('Save changes');
                }
                
                  // $('.update_center').text('Update');
                } 
                else if(response.status == 404){
                  $('#updateform_errlist').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('.update_vaccine').text('Save changes');
                
                }
                else {
                  $('#updateform_errlist').html("");
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  // $('#editModal').find('input').val('');
                  $('.update_vaccine').text('Save changes');
                  $('#editModal').modal('hide');
                  $("#success_message").fadeOut(5000);
                  fetchvaccine();
                }
              }
            });
        });

        //  End Update Edit Model and save to database



        //  Calling Delete Model and delete from database 
        
        $(document).on('click','.deletebtn', function (e) {
          e.preventDefault();
            var vaccine_id = $(this).val();
            // console.log(vaccine_id);
            $('#vaccine_id').val(vaccine_id);
            $('#deleteModal').modal('show');
        });
        $(document).on('click','.delete_vaccine', function (e) {
          e.preventDefault();
          $(this).text('Deleting...');
          var vaccine_id = $('#vaccine_id').val();

          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({
            type: "delete",
            url: "/admin/delete-vaccine/" + vaccine_id,
            success: function (response) {
              // console.log(response);
              // $('#success_message').html("");
              $('#success_message').addClass('alert alert-success');
              $('#success_message').text(response.message);
              $('#deleteModal').modal('hide');
              $('.delete_vaccine').text('Yes Delete');
              $("#success_message").fadeOut(5000);
              fetchvaccine();
            }
          });

        });

        //  End Calling Delete Model and delete from database


});
</script>  

@include('Admin/script')
</body>
</html>
