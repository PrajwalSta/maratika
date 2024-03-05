
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/dashboard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/dashboard/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  @yield('header-link')
  
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 

   {{-- fontawesome icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
   <!--for summernoteWUSIWYG-->
  <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- CSS Files -->
  <link href="../../assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../assets/dashboard/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  
  <link rel="stylesheet" href="../../assets/dashboard/css/dataTable.min.css">
   <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    

 
  



<body class="">
  <div class="wrapper ">
     <div class="sidebar" data-color="blue"><!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
      <div class="logo">
        
        <a href="" class="simple-text logo-normal">
          Maratika Hotel
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="{{ 'dashboard'==request()->path() ? 'active':''}}">
            <a href="{{route('dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>{{__('Dashboard')}}</p>
            </a>
          </li>
       
          <li>
            <a href="{{route('cms-gallery')}}">
              <i class="now-ui-icons location_map-big"></i>
              <p>{{__('Gallery')}}</p>
            </a>
          </li>
          <li>
            <a href="{{route('cms-slider')}}">
              <i class="now-ui-icons location_map-big"></i>
              <p>{{__('Sliders')}}</p>
            </a>
          </li>
          <li class="{{ 'offroadtour'==request()->path() ? 'active':''}}">
            <a href="{{route('offroadtour')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Rooms</p>
            </a>
          </li>
        {{-- <li class="{{ 'onroadtour'==request()->path() ? 'active':''}}">
            <a href="{{route('onroadtour')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Onroad Tours</p>
            </a>
          </li>--}}
         
         <li class="{{ 'whyus'==request()->path() ? 'active':''}}">
            <a href="{{route('whyus')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Why Us</p>
            </a>
          </li>
         
         {{-- <li class="{{ 'viewtravelInfo'==request()->path() ? 'active':''}}">
            <a href="{{route('travelinfo')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Travel Information</p>
            </a>
          </li>--}}
           <li class="{{ 'aboutus'==request()->path() ? 'active':''}}">
            <a href="{{route('aboutus')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>About Hotel</p>
            </a>
          </li>
           {{--<li class="{{ 'admin-ambassadors'==request()->path() ? 'active':''}}">
            <a href="{{route('cmsambasadors')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Ambassador</p>
            </a>
          </li>--}}
           <li class="{{ 'ShowContactDetails'==request()->path() ? 'active':''}}">
            <a href="{{route('admin.showcontact')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Contact Us</p>
            </a>
          </li>
          
          {{-- <li class="{{'notice'==request()->path() ? 'active':''}}">
            <a href="{{route('notice')}}">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Notices
              </p>
            </a>--}}
        </li>
       {{-- <li class="{{ 'cms-blogs'==request()->path() ? 'active':''}}">
            <a href="{{route('cms-blogs')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Blog</p>
            </a>
          </li>--}}
        <li class="{{ 'cmsfacility'==request()->path() ? 'active':''}}">
            <a href="{{route('cmsfacility')}}">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Facility</p>
            </a>
          </li>
      {{--  <li class="{{'bookingcontent-section'==request()->path() ? 'active':''}}">
          <a href="{{route('bookingcontent-section')}}">
            <i class="now-ui-icons text_caps-small"></i>
            <p>Sections
            </p>
          </a>
      </li>
         --}}
      <li class="{{ 'role-register'==request()->path() ? 'active':''}}">
        <a href="./role-register">
          <i class="now-ui-icons users_single-02"></i>
          <p>{{__('User Profile')}}</p>
        </a>
      </li>
         
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">{{__('Admin Dashboard')}}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end pr-5" id="navigation">
            
            <ul class="navbar-nav">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> --}}
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('homepage') }}">
                     {{__('Back to HomePage')}}
                 </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
             <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <span class="flag-icon flag-icon-{{app()->getLocale()}}"></span>&nbsp;&nbsp;{{ strtoupper(app()->getLocale()) }}
            </a>

              
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                    @foreach([
                  'us'=>'English',
                  'es'=>'Spanish',
                  
                ] as $langLocale => $langName)
                   <a style="color:#000!important" class="text-align-start" href="{{ url()->current() }}?change_language={{ $langLocale }}"><span class="flag-icon flag-icon-{{$langLocale}}"></span>&nbsp;&nbsp;{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                    <br/><br/>
                @endforeach
                    
                </li>
            
            </ul>
          </div>
        </div>
      </nav>
    
      <!-- End Navbar -->
    <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
      @yield('content')
        
      </div>
     
    </div>
  </div>
  {{-- <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script> --}}
  <!--   Core JS Files   -->
  <script src="../../assets/dashboard/js/core/jquery.min.js"></script>
  <script src="../../assets/dashboard/js/core/popper.min.js"></script>
  <script src="../../assets/dashboard/js/core/bootstrap.min.js"></script>
  <script src="../../assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
  <script src="../../assets/dashboard/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../assets/dashboard/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/dashboard/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
   <script src="../../assets/dashboard/demo/demo.js"></script> 
  <script src="../../assets/dashboard/js/dataTable.min.js"></script>

  
  @yield('scripts')
</body>

</html>