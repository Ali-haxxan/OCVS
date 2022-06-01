<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{asset('dist/img/vacine.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OCVS</title>
    <link rel="stylesheet" href="{{asset('Styles/bootstrap-3.1.1/css/bootstrap.min.css')}}">
    

</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-4 col-md-offset-4 ">
            <a class="mx-2" href="#">
                <img src="{{asset('dist/img/vacine.png')}}"  alt="logo"  style="width: 100px; height: 100px;margin-top:45px; margin-left:35%;">
                
            </a>
            <div >
                <h1 style="margin-left:33%;">Signup</h1>
                <p></p>
                <hr>
                <form action="{{route('user.create')}}" method="POST">
                    @csrf
                    <div class="result">
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                            
                        @endif
                        @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                            
                        @endif
                    </div>
                    

                      <div class="form-group">
                        {{-- <div class="col-md-6 mb-4 pb-2"> --}}
        
                          {{-- <div class="form-outline"> --}}
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" value="{{ old('name')}}">
                            <span class="text-danger">@error('name'){{ $message}}@enderror</span>
                          {{-- </div> --}}
        
                        {{-- </div> --}}
                        
                      </div>
                        

                   
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email')}}" >
                        <span class="text-danger">@error('email'){{ $message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" >
                        <span class="text-danger">@error('password'){{ $message}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>  
                    </div>
                    
                    <a href="{{url('/')}}">Already have account!</a>
                </form>
            </div>
        </div>
        </div>
    </div>


</body>
</html>