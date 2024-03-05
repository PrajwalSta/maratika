@extends('frontend/layouts.master')
@section('title')
Room details || Maratika Hotel
    
@endsection
@section('content')
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url('assets/frontend/images/rooms.jpg');">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Ours Room</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <section class="package-offer-wrap">
               <!-- special section html start -->
               <div class="special-section">
                  <div class="container">
                     <div class="special-inner">
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
								<a href="#">{{$room->title}}</a>
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
                        </div>
                     </div>
                  </div>
               </div>
            </section>

@endsection