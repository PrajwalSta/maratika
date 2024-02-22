<!doctype html>
<html lang="en">
	<!-----------------------Header Area----------------------->
   <head>
       <!-- Required meta tags -->
	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
	   <!-- favicon -->
	   <link rel="icon" type="image/png" href="assets/images/favicon.png">
	   <!-- Bootstrap CSS -->
	   <link rel="stylesheet" href="{{URL::asset('assets/frontend/vendors/bootstrap/css/bootstrap.min.css')}}"media="all">
	   <!-- Fonts Awesome CSS -->
	   <link rel="stylesheet" href="{{URL::asset('assets/frontend/vendors/fontawesome/css/all.min.css')}}">
	   <!-- jquery-ui css -->
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/vendors/jquery-ui/jquery-ui.min.css')}}">
	   <!-- modal video css -->
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/vendors/modal-video/modal-video.min.css')}}">
	   <!-- light box css -->
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/vendors/lightbox/dist/css/lightbox.min.css')}}">
	   <!-- slick slider css -->
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/vendors/slick/slick.css')}}">
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/vendors/slick/slick-theme.css')}}">
	   <!-- google fonts -->
	   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
	   <!-- Custom CSS -->
	 
	   <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/frontend/style.css')}}">
	   <title>Maratika Hotel </title>
   </head>
   <body class="home">
      <div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="{{url('assets/frontend/images/loader1.gif')}}" alt="">
         </div>
      </div>
      <div id="page" class="full-page">
         <header id="masthead" class="site-header header-primary">
            <!-- header html start -->
            <div class="top-header">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-8 d-none d-lg-block">
						
                        <div class="header-contact-info">
							
                           <ul>
                              <li>
                                 <a href="#"><i class="fas fa-phone-alt"></i> +977 981-3239337</a>
                              </li>
                              <li>
                                 <a href="norlinghalesi@gmail.com"><i class="fas fa-envelope"></i> norlinghalesi@gmail.com</a>
                              </li>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i> Halesi Khotang,Nepal,56206
                              </li>
                           </ul>
						   
                        </div>
						
                     </div>
                     <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                        <div class="header-social social-links">
                           <ul>
                              <li><a href="https://www.facebook.com/maratikanorling/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                            {{-- <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>--}}
                              <li><a href="https://www.instagram.com/explore/locations/104546152086132/maratika-norling-hotel/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                        <div class="header-search-icon">
                           <button class="search-icon">
                              <i class="fas fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bottom-header">
               <div class="container d-flex justify-content-between align-items-center">
                  <div class="site-identity">
                     <h1 class="site-title">
                        <a href="{{('/')}}">
                           <img src="{{url('assets/frontend/images/maratika-logo.png')}}" alt="logo">
                        </a>
                     </h1>
                  </div>
                  <div class="main-navigation d-none d-lg-block">
                     <nav id="navigation" class="navigation">
                      
							<ul>
								<li class="nav-item {{ '/'==request()->path() ? 'active':''}}"><a href="{{ route('homepage') }}" class="nav-link">{{__('Home') }}</a></li>
								<li class="nav-item {{ 'rooms'==request()->path() ? 'active':''}}"><a href="{{ route('rooms') }}" class="nav-link">{{ __('Room') }}</a></li>
								<li class="nav-item {{ 'gallery'==request()->path() ? 'active':''}}"><a href="{{ route('gallery') }}" class="nav-link">{{ __('Gallery') }}</a></li>
								<li class="nav-item {{ 'about'==request()->path() ? 'active':''}}"><a href="{{ route('about') }}" class="nav-link">{{ __('about') }}</a></li>
								
								{{--<li class="nav-item {{ 'blogs'==request()->path() ? 'active':''}}"><a href="{{ route('blogs') }}" class="nav-link">{{ __('Blog') }}</a></li>--}}
								<li class="nav-item {{ 'contact'==request()->path() ? 'active':''}}"><a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a></li>
									
							</ul>
			
                     </nav>
                  </div>
                  <div class="header-btn">
                     <a href="{{route('booking')}}" class="button-primary">BOOK NOW</a>
                  </div>
               </div>
            </div>
            <div class="mobile-menu-container"></div>
         </header>
		 <!-----------------------End Header Area----------------------->
	
		 
		 @yield('content')
		 <!-----------------------Footer Area----------------------->
		 <footer id="colophon" class="site-footer footer-primary">
			<div class="top-footer">
			   <div class="container">
				  <div class="row">
					 <div class="col-lg-3 col-md-6">
						<aside class="widget widget_text">
						   <h3 class="widget-title">
							  About Us
						   </h3>
						  
						   <div class="textwidget widget-text">
							<p>{{__('Hotel Maratikanorling is located in Mahadevsthan, Tuwachung. It is surrounded by a hill and culture-based environment. You can enjoy the best trip to halesi mahadev temple and natural beauty around Hotel Maratikanorling.')}}</p>
						   </div>
						   
						</aside>
					 </div>
					 <div class="col-lg-3 col-md-6">
						<aside class="widget widget_text">
						   <h3 class="widget-title">CONTACT INFORMATION</h3>
						   <div class="textwidget widget-text">
							
							<ul>
							   <li>
								  <a href="#">
									 <i class="fas fa-phone-alt"></i>
									 +977 981-3239337
								  </a>
							   </li>
							   <li>
								  <a href="norlinghalesi@gmail.com">
									 <i class="fas fa-envelope"></i>
									 norlinghalesi@gmail.com
								  </a>
							   </li>
							   <li>
								  <i class="fas fa-map-marker-alt"></i>
								  Halesi Khotang, Nepal,56206
							   </li>
							</ul>
						 </div>
						</aside>
					 </div>
					<div class="col-lg-3 col-md-6">
						<aside class="widget widget_text">
							
								<h6 class="widget-title">Quick_link</h6>
								<div class="textwidget widget-text">
									<ul>
										<li><a href="{{ route('homepage') }}">{{('Home')}}</a></li>
										<li><a href="{{ route('about') }}">{{('About')}}</a></li>
										<li><a href="{{ route('rooms') }}">{{('Room')}}</a></li>
										<li><a href="{{ route('gallery') }}">{{('Gallery')}} </a></li>
										<li><a href="{{ route('contact') }}">{{('Contact')}}</a></li>
									</ul>
								</div>
							
						</aside>
					 </div>
					 <div class="col-lg-3 col-md-6">
						<aside class="widget widget_newslatter">
						   <h3 class="widget-title">SUBSCRIBE US</h3>
						   <div class="widget-text">
							  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						   </div>
						   <form class="newslatter-form">
							  <input type="email" name="s" placeholder="Your Email..">
							  <input type="submit" name="s" value="SUBSCRIBE NOW">
						   </form>
						</aside>
					 </div>
				  </div>
			   </div>
			</div>
			<div class="buttom-footer">
			   <div class="container">
				  <div class="row align-items-center">
					 <div class="col-md-5">
						<div class="footer-menu">
						   <ul>
							  <li>
								 <a href="#">Privacy Policy</a>
							  </li>
							  <li>
								 <a href="#">Term & Condition</a>
							  </li>
							  <li>
								 <a href="#">FAQ</a>
							  </li>
						   </ul>
						</div>
					 </div>
					 <div class="col-md-2 text-center">
						<div class="footer-logo">
						   <a href="{{url('/')}}"><img src="{{url('assets/frontend/images/maratika-logo.png')}}"width=80px; alt=""></a>
						</div>
					 </div>
					 <div class="col-md-5">
						<div class="copy-right text-right">Copyright © 2024 Maratika. All rights reserveds</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </footer>
		 <a id="backTotop" href="#" class="to-top-icon">
			<i class="fas fa-chevron-up"></i>
		 </a>
		 <!-- custom search field html -->
			<div class="header-search-form">
			   <div class="container">
				  <div class="header-search-container">
					 <form class="search-form" role="search" method="get" >
						<input type="text" name="s" placeholder="Enter your text...">
					 </form>
					 <a href="#" class="search-close">
						<i class="fas fa-times"></i>
					 </a>
				  </div>
			   </div>
			</div>
		 <!-- header html end -->
	  </div>
   
	  <!-- JavaScript -->
	  <script src="{{URL::asset('assets/frontend/js/jquery.js')}}"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/modal-video/jquery-modal-video.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/masonry/masonry.pkgd.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/lightbox/dist/js/lightbox.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/vendors/slick/slick.min.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/js/jquery.slicknav.js')}}"></script>
	  <script src="{{URL::asset('assets/frontend/js/custom.min.js')}}"></script>
   </body>
   </html>
		 <!-----------------------Footer Area----------------------->
	