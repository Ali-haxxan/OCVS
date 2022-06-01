<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown col-md-4">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">

                <?php
                $i = 1;
                ?>
            @foreach ($children as $child)
              @if ((now()->diffinDays($child->dob))/7 <= 1)
                <tr>
                  <p>{{$i++}}- {{$child->child_name}} upcomming vaccine date is 
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
                     @endif  </p>
                     <div class="dropdown-divider"></div>
                </tr>
              @endif 
            @endforeach 
            @foreach ($children as $child)
              @if ((now()->diffinDays($child->dob))/7 > 5 && (now()->diffinDays($child->dob))/7 < 7)
                <tr>
                  <p>{{$i++}}- {{$child->child_name}} upcomming vaccine date is
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
                     @endif  </p>
                     <div class="dropdown-divider"></div>
                </tr>
              @endif 
            @endforeach 
            @foreach ($children as $child)
              @if ((now()->diffinDays($child->dob))/7 > 9 && (now()->diffinDays($child->dob))/7 < 11)
                <tr>
                  <p>{{$i++}}- {{$child->child_name}} upcomming vaccine date is
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
                     @endif  </p>
                     <div class="dropdown-divider"></div>
                </tr>
              @endif 
            @endforeach 
            @foreach ($children as $child)
              @if ((now()->diffinDays($child->dob))/7 > 13 && (now()->diffinDays($child->dob))/7 < 15)
                <tr>
                  <p>{{$i++}}- {{$child->child_name}} upcomming vaccine date is
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
                     @endif  </p>
                     <div class="dropdown-divider"></div>
                </tr>
              @endif 
            @endforeach 
            @foreach ($children as $child)
              @if ((now()->diffinDays($child->dob))/30 > 8 && (now()->diffinDays($child->dob))/30 < 10)
                <tr>
                  <p>{{$i++}}- {{$child->child_name}} upcomming vaccine date is 
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
                     @endif  </p>
                     <div class="dropdown-divider"></div>
                </tr>
              @endif 
            @endforeach 

            
              </div>
            </div>
            <!-- Message End -->
          </a>
          
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
     
     
      
      <li class="nav-item">
                <!-- Authentication -->
                <a class="btn btn-sm btn-info" href="{{url('/logout')}}" >
                  <i class="nav-icon fas fa-power-off mx-1"></i>Logout</a>
                
            
      </li>
    </ul>
  </nav>