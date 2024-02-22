@extends('frontend/layouts.master')
@section('title')

@section('content')
<main id="content" class="site-main">
	<!-- Home slider html start -->
	<section class="home-slider-section">
	   <div class="home-slider">
		@foreach($slider as $s)
		  <div class="home-banner-items">
		   <div class="banner-inner-wrap" style="background-image: url('../../uploads/slider/{{ $s->slider_image }}');"></div>
				<div class="banner-content-wrap">
				   <div class="container">
					 <div class="banner-content text-center">
						 <h2></h2>
						<p></p>
					  </div>
				   </div>
				</div>
			 <div class="overlay"></div>
		  </div>
		  @endforeach
		 
	   </div>
	</section>
	<!-- slider html start -->
	<!-- Home search field html start -->
	<div class="trip-search-section shape-search-section">
	   <div class="slider-shape"></div>
	   <div class="container">
		  <div class="trip-search-inner white-bg d-flex">
			 <div class="input-group">
				<label> Search Destination* </label>
				<input type="text" name="s" placeholder="Enter Destination">
			 </div>
			 <div class="input-group">
				<label> Pax Number* </label>
				<input type="text" name="s" placeholder="No.of People">
			 </div>
			 <div class="input-group width-col-3">
				<label> Checkin Date* </label>
				<i class="far fa-calendar"></i>
				<input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
			 </div>
			 <div class="input-group width-col-3">
				<label> Checkout Date* </label>
				<i class="far fa-calendar"></i>
				<input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
			 </div>
			 <div class="input-group width-col-3">
				<label class="screen-reader-text"> Search </label>
				<input type="submit" name="travel-search" value="INQUIRE NOW">
			 </div>
		  </div>
	   </div>
	</div>
	<!-- Home packages section html start -->
    <section class="package-section">
		<div class="container">
		   <div class="section-heading text-center">
			  <div class="row">
				 <div class="col-lg-8 offset-lg-2">
					<h5 class="dash-style">EXPLORE Room</h5>
					
					<h4>Relax in our Hotel Resort</h4>
					<p>Welcome to Maratika Norling Hotel ! Located just 150 meters away from Maratika (Halesi) Cave.</p>
				 </div>
			  </div>
		   </div>
		   <div class="package-inner">
			  <div class="row">
				@foreach($rooms as $room)
				 <div class="col-lg-4 col-md-6">
					<div class="package-wrap">
					   <figure class="feature-image">
						  <a href="{{ route('roomdetails',['title' => $room->title,'id' => $room->id,]) }}" >
							 <img src="../../uploads/offroadtour/{{ $room->tour_image }}" alt="" class="room">
						  </a>
					   </figure>
					   <div class="package-price">
						  <h6>
							 <span>{{ $room->amount }} </span> / per person
						  </h6>
					   </div>
					   <div class="package-content-wrap">
						  <div class="package-meta text-center">
							 <ul>
								<li>
								   <i class="far fa-clock"></i>
								   7D/6N
								</li>
								<li>
								   <i class="fas fa-user-friends"></i>
								   {{$room->days}}
								</li>
								<li>
									<i class="fa-solid fa-hotel"></i>
								   30ft
								</li>
							 </ul>
						  </div>
						  <div class="package-content">
							 <h3>
								<a href="{{ route('roomdetails',['title' => $room->title,'id' => $room->id,]) }}">{{$room->title}}</a>
							 </h3>
							 <p>
								 <a href="{{ route('roomdetails',['title' => $room->title,'id' => $room->id,]) }}">{!!Str::words($room->tour_description, 25, '<br/>Read More...')!!}</a>
							</p>
							 <div class="btn-wrap">
								<a href="{{route('booking')}}" class="button-text width-6">Book Now<i class="fas fa-arrow-right"></i></a>
								
							 </div>
						  </div>
					   </div>
					</div>
				 </div>
				 @endforeach
			  </div>
			  <div class="btn-wrap text-center">
				<a href="{{route('rooms')}}" class="button-primary">VIEW ALL Room</a>
			  </div>
		   </div>
		</div>
	 </section>
	
	<!-- packages html end -->
	<!-- Home callback section html start -->
	<section class="callback-section">
	   <div class="container">
		  <div class="row no-gutters align-items-center">
			 <div class="col-lg-5">
				<div class="callback-img" style="background-image: url('assets/frontend/images/fallback.jpg');">
				   <div class="video-button">
					<video width="475" height="540" controls>
						<source src="{{url('assets/frontend/images/GA7vgRlTxOIm6qEGAIgdH7IlAaBXbmdjAAAF.mp4')}}" type="video/mp4">
						
					  </video>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-7">
				<div class="callback-inner">
				   <div class="section-heading section-heading-white">
					  <h5 class="dash-style">norling Maratika hotel </h5>
					  <h2>Relax in our Hotel Resort</h2>
					  <p>You can enjoy the best trip to halesi mahadev temple and natural beauty around Hotel Maratikanorling.</p>
				   </div>
				   <div class="callback-counter-wrap">
					  <div class="counter-item">
						 <div class="counter-icon">
						   <img src="assets/images/icon1.png" alt="">
						 </div>
						 <div class="counter-content">
							<span class="counter-no">
							   <span class="counter">500</span>K+
							</span>
							<span class="counter-text">
							   Satisfied Clients
							</span>
						 </div>
					  </div>
					  <div class="counter-item">
						 <div class="counter-icon">
						   <img src="assets/images/icon2.png" alt="">
						 </div>
						 <div class="counter-content">
							<span class="counter-no">
							   <span class="counter">250</span>K+
							</span>
							<span class="counter-text">
							   Satisfied Clients
							</span>
						 </div>
					  </div>
					  <div class="counter-item">
						 <div class="counter-icon">
						   <img src="assets/images/icon3.png" alt="">
						 </div>
						 <div class="counter-content">
							<span class="counter-no">
							   <span class="counter">15</span>K+
							</span>
							<span class="counter-text">
							   Satisfied Clients
							</span>
						 </div>
					  </div>
					  <div class="counter-item">
						 <div class="counter-icon">
						   <img src="assets/images/icon4.png" alt="">
						 </div>
						 <div class="counter-content">
							<span class="counter-no">
							   <span class="counter">10</span>K+
							</span>
							<span class="counter-text">
							   Satisfied Clients
							</span>
						 </div>
					  </div>
				   </div>
				   <div class="support-area">
					<div class="support-icon">
					   <img src="assets/images/icon5.png" alt="">
					</div>
					<div class="support-content">
					   <h4>Our 24/7 Emergency Phone Services</h4>
					   <h3>
						  <a href="#">Call: +977 981-3239337</a>
					   </h3>
					</div>
				 </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
	<!-- callback html end -->
	<!-- Home activity section html start -->
	<section class="activity-section">
	   <div class="container">
		  <div class="section-heading text-center">
			 <div class="row">
				<div class="col-lg-8 offset-lg-2">
				   <h3>Our Facilities</h3>
				   
				   <p>Norling Maratika Hotel provides all services you need.</p>
				</div>
			 </div>
		  </div>
		  <div class="activity-inner row">
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon6.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Adventure</a>
					  </h4>
					  <p>15 Destination</p>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon10.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Trekking</a>
					  </h4>
					  <p>12 Destination</p>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon9.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Camp Fire</a>
					  </h4>
					  <p>7 Destination</p>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon8.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Off Road</a>
					  </h4>
					  <p>15 Destination</p>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon7.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Camping</a>
					  </h4>
					  <p>13 Destination</p>
				   </div>
				</div>
			 </div>
			 <div class="col-lg-2 col-md-4 col-sm-6">
				<div class="activity-item">
				   <div class="activity-icon">
					  <a href="#">
						 <img src="{{url('assets/frontend/images/icon11.png')}}" alt="">
					  </a>
				   </div>
				   <div class="activity-content">
					  <h4>
						 <a href="#">Exploring</a>
					  </h4>
					  <p>25 Destination</p>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
	<!-- activity html end -->
		 <!-- Home special section html start -->
		 {{--<section class="special-section">
		  <div class="container">
			 <div class="section-heading text-center">
				<div class="row">
				   <div class="col-lg-8 offset-lg-2">
					  <h5 class="dash-style">TRAVEL OFFER & DISCOUNT</h5>
					  <h2>SPECIAL TRAVEL OFFER</h2>
					  <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
				   </div>
				</div>
			 </div>
			 <div class="special-inner">
				<div class="row">
				   <div class="col-md-6 col-lg-4">
					  <div class="special-item">
						 <figure class="special-img">
							<img href="{{url('travelinfo')}}"src="{{url('assets/frontend/images/img9.jpg')}}" alt="">
						 </figure>
						 <div class="badge-dis">
							<span>
							   <strong>20%</strong>
							   off
							</span>
						 </div>
						 <div class="special-content">
							<div class="meta-cat">
							   <a href="#">CANADA</a>
							</div>
							<h3>
							   <a href="#">Experience the natural beauty of glacier</a>
							</h3>
							<div class="package-price">
							   Price:
							   <del>$1500</del>
							   <ins>$1200</ins>
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="col-md-6 col-lg-4">
					  <div class="special-item">
						 <figure class="special-img">
							<img src="{{url('assets/frontend/images/img10.jpg')}}" alt="">
						 </figure>
						 <div class="badge-dis">
							<span>
							   <strong>15%</strong>
							   off
							</span>
						 </div>
						 <div class="special-content">
							<div class="meta-cat">
							   <a href="#">NEW ZEALAND</a>
							</div>
							<h3>
							   <a href="#">Trekking to the mountain camp site</a>
							</h3>
							<div class="package-price">
							   Price:
							   <del>$1300</del>
							   <ins>$1105</ins>
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="col-md-6 col-lg-4">
					  <div class="special-item">
						 <figure class="special-img">
							<img src="{{url('assets/frontend/images/img11.jpg')}}" alt="">
						 </figure>
						 <div class="badge-dis">
							<span>
							   <strong>15%</strong>
							   off
							</span>
						 </div>
						 <div class="special-content">
							<div class="meta-cat">
							   <a href="#">MALAYSIA</a>
							</div>
							<h3>
							   <a href="#">Sunset view of beautiful lakeside city</a>
							</h3>
							<div class="package-price">
							   Price:
							   <del>$1800</del>
							   <ins>$1476</ins>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </section>--}}
	   <!-- special html end -->
	<!-- Home special section html start -->
	<section class="best-section">
	   <div class="container">
		  <div class="row">
			<div class="row d-md-flex">
			 <div class="col-lg-12">
				<div class="section-heading text-center">
					<h5 class="dash-style">OUR GALLERY</h5>
				 </div>
				<div class="row" >
					@foreach ($gallery as $gallery)
					<div class="col-lg-4">
                  <figure class="gallery-img">
					<a class="rooms" href="{{route('gallery')}}"></a>
					<a>
                    <img src="../../uploads/galleries/{{ $gallery->gallery_image }}" data-lightbox="lightbox-set" alt="" class="gall">
					
				</a>
				</figure>
					</div>
				@endforeach 
			     </div>
		      </div>
			  </div>
			 
	        </div>
	   </div>
	</section>
	<!-- best html end -->
	<!-- Home client section html start -->
	{{--<div class="client-section">
	   <div class="container">
		  <div class="client-wrap client-slider secondary-bg">
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo1.png" alt="">
				</figure>
			 </div>
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo2.png" alt="">
				</figure>
			 </div>
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo3.png" alt="">
				</figure>
			 </div>
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo4.png" alt="">
				</figure>
			 </div>
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo5.png" alt="">
				</figure>
			 </div>
			 <div class="client-item">
				<figure>
				   <img src="assets/images/logo2.png" alt="">
				</figure>
			 </div>
		  </div>
	   </div>
	</div>--}}
	<!-- client html end -->
	
	<!-- Home blog section html start -->
{{--	<section class="blog-section">
	   <div class="container">
		  <div class="section-heading text-center">
			 <div class="row">
				<div class="col-lg-8 offset-lg-2">
				   <h5 class="dash-style">FROM OUR BLOG</h5>
				   <h2>OUR RECENT POSTS</h2>
				   <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
				</div>
			 </div>
		  </div>
		  <div class="row">
			@foreach ($blogs as $blog)
			 <div class="col-md-6 col-lg-4">
				
				<article class="post">
					<figure class="feature-image">
					   <a href="#">
						  <img src="../../uploads/blog/{{ $blog->blog_image }}" alt="">
					   </a>
					</figure>
					<div class="entry-content">
					   <h3>
						  <a href="#">{{ $blog->blogs_title}}</a>
					   </h3>
					   <div class="entry-meta">
						  <span class="byline">
							 <a href="">{{$blog->author_name}}</a>
						  </span>
						  <span class="byline">
							<a href="">  {{Carbon\Carbon::parse($blog->created_at)->format('M j,Y')}}</a>
						 </span>
					   </div>
					</div>
				 </article>
				
				
				
			 </div>
			 @endforeach
		  </div>
	   </div>
	</section> --}}
	 <!-- blog html end -->

	 <!-- Home testimonial section html start -->
	 {{--<div class="testimonial-section" style="background-image: url(assets/images/img23.jpg);">
		<div class="container">
		   <div class="row">
			  <div class="col-lg-10 offset-lg-1">
				 <div class="testimonial-inner testimonial-slider">
					<div class="testimonial-item text-center">
					   <figure class="testimonial-img">
						  <img src="{{url('assets/frontend/images/img20.jpg')}}" alt="">
					   </figure>
					   <div class="testimonial-content">
						  <p>" Dolorum aenean dolorem minima! Voluptatum? Corporis condimentum ac primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod quo, aute facere? Deserunt aliquip, egestas ipsum, eu.Dolorum aenean dolorem minima!? Corporis condi mentum acpri! "</p>
						  <cite>
							 Johny English
							 <span class="company">Travel Agent</span>
						  </cite>
					   </div>
					</div>
					<div class="testimonial-item text-center">
					   <figure class="testimonial-img">
						  <img src="{{url('assets/frontend/images/img21.jpg')}}" alt="">
					   </figure>
					   <div class="testimonial-content">
						  <p>" Dolorum aenean dolorem minima! Voluptatum? Corporis condimentum ac primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod quo, aute facere? Deserunt aliquip, egestas ipsum, eu.Dolorum aenean dolorem minima!? Corporis condi mentum acpri! "</p>
						  <cite>
							 William Housten
							 <span class="company">Travel Agent</span>
						  </cite>
					   </div>
					</div>
					<div class="testimonial-item text-center">
					   <figure class="testimonial-img">
						  <img src="assets/images/img22.jpg" alt="">
					   </figure>
					   <div class="testimonial-content">
						  <p>" Dolorum aenean dolorem minima! Voluptatum? Corporis condimentum ac primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod quo, aute facere? Deserunt aliquip, egestas ipsum, eu.Dolorum aenean dolorem minima!? Corporis condi mentum acpri! "</p>
						  <cite>
							 Alison Wright
							 <span class="company">Travel Guide</span>
						  </cite>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>--}}
	 <!-- testimonial html end -->


@endsection

	