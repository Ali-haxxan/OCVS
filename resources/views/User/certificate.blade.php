<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCVS</title>
    <link rel="icon" href="{{asset('dist/img/vacine.png')}}" />
    <link  rel="stylesheet" media="print" type="text/css">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>

    </style>
  </head>
  <body>
    
    <div class="content-wrapper  position-relative">
      
      <!-- Content Header (Page header) -->
      <section class="content-header my-3">
        <div class="container-fluid">
          <div class="row d-flex justify-content-center">
            <div class="col-10 ">
              <div class="text-center">

                <h1>Child Vaccination Certificate</h1>
              </div>
              
            </div>
          </div>
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content position-relative">
        <div class="container-fluid">
          <div class="row d-flex justify-content-center my-3">
            <div class="col-12">
              
  
              <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body ">
                
                   
                  
                  @foreach ($childinfo as $item)
                    <div class="form-group ">
                        
                      <div class="row">
                        <label class="col-2"><b>Child Name:</b></label><label class="col-4">{{$item->child_name}}</label>
                        <label class="col-2 "><b>Gender:</b></label><label class="col-4">{{$item->gender}}</label>
                      </div>
  
                      <div class="row">
                        <label class="col-2"><b>Father Name:</b></label><label class="col-4">{{$item->f_name}}</label>
                        <label class="col-2 "><b>Father CNIC:</b></label><label class="col-4">{{$item->f_cnic}}</label>
                      </div>
                          
                      <div class="row">
                        <label class="col-2"><b>Mother Name:</b></label><label class="col-4">{{$item->m_name}}</label>
                        <label class="col-2 "><b>Mother CNIC:</b></label><label class="col-4">{{$item->m_cnic}}</label>
                      </div>
  
                      <div class="row">
                        <label class="col-2"><b>Date of Birth:</b></label><label class="col-4">{{\Carbon\Carbon::parse($item->dob)->format('d/m/Y')}}</label>
                        <label class="col-2 "><b>Vaccination Venu:</b></label><label class="col-4">{{$item->venue}}</label>
                      </div>

                      <div class="row">
                        <label class="col-2"><b>City:</b></label><label class="col-4">{{$item->city}}</label>
                        <label class="col-2"><b>Address:</b></label><label class="col-4">{{$item->address}}</label>
                      </div>
  
                      <div class="row ">
                        <label class="col-2" ><b>Phone No.</b></label><label class="col-4">{{$item->number}}</label>
                      </div>
                    
                    </div>
                  @endforeach
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <div class=" d-flex justify-content-center position-absolute">
            <img class="col-2 opacity-50" src="{{asset('vacine.png')}}" alt="vaccine logo" height="300" width="360">
          </div>
          <div class="row my-3 d-flex justify-content-center position-relative">
            <div class="col-12 position-relative">
              
    
              <div class="card position-relative">
                
                <!-- /.card-header -->
                <div class="card-body position-relative">
                
                   
                  
                  
                    
                  <table class="table table-hover position-relative table-striped">
                    <thead>
                        <tr>
                          <th>Sr#</th>
                          <th>Vaccine Name</th>
                          <th>Disease Prevent</th>
                          <th>Vaccinated Date</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($certificateinfo as $items)
                              
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$items->vac_name}}</td>
                            <td>{{$items->diseases_prevent}}</td>
                            <td>{{\Carbon\Carbon::parse($items->chva_updated_at)->format('d/m/Y') }}</td>
                            
                          </tr>
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
          <label class="mx-2 my-4"><b>Issuance Date: </b></label><label class="col-2">{{now()->toDateString()}}</label>
        </div>
        <!-- /.container-fluid -->
      </section>
      
      <!-- /.content -->

      
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
      window.addEventListener("load", window.print());
    </script>
  </body>
</html>
