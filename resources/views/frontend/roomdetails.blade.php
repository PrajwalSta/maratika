@extends('frontend/layouts.master')
@section('title')
Room details || Maratika Hotel
    
@endsection
@section('content')

            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
                <div class="inner-baner-container" style="background-image: url(../../uploads/offroadtour/{{ $rooms->tour_image }}); ">
                   <div class="container">
                      <div class="inner-banner-content">
                        
                      </div>
                   </div>
                </div>
                <div class="inner-shape"></div>
             </section>
             <!-- Inner Banner html end-->
             <div class="single-tour-section">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-8">
                         <div class="single-tour-inner">
                            <figure class="feature-image">
                               <img src="../../uploads/offroadtour/{{ $rooms->tour_image }}" alt="" >
                               <div class="package-meta text-center">
                                  <ul>
                                     <li>
                                        <i class="fas fa-user-friends"></i>
                                        <span>{{$rooms->days }}</span> / guest
                                     </li>
                                     <li>
                                        <i class="fas fa-user-friends"></i>
                                        <span>{{$rooms->amount }}</span> / per night
                                     </li>
                                  </ul>
                               </div>
                            </figure>
                            <h3>{!! $rooms->title !!}</h3>
                            <div class="tab-container">
                               <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item">
                                     <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">DESCRIPTION</a>
                                  </li>
                                  <li class="nav-item">
                                     <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">Details</a>
                                  </li>
                                 
                                  
                               </ul>
                               <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                     <div class="overview-content">
                                        <p>{!! $rooms->tour_description !!}</p>
                                        
                                       
                                     </div>
                                  </div>
                                  <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                     <div class="itinerary-content">
                                        <table class="keyinfo">
                                         @foreach($keyinfo as  $keyinfo)
                                           <tr>
                                               <td>
   
                           <td><i class="fa {{ $keyinfo->icon }}" aria-hidden="true"></i>
                              {{ $keyinfo->key_info }}
                         </td>
   
                         <td>
                             
                           <i class="fa-solid fa-wifi"> {{ $keyinfo->key_info_value }}</i>
                            
                
                           </td>
                                         @endforeach
                                         </table>
                                     </div>
                                  </div>
                                  <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                                     <!-- review comment html -->
                                    
                                  </div>
                                 
                               </div>
                            </div>
                            <div class="single-tour-gallery">
                               <h3>GALLERY / PHOTOS</h3>
                               <div class="single-tour-slider">
                                 @foreach ($itinerary as $itinerary)
                                  <div class="single-tour-item">
                                     <figure class="feature-image">
                                        <img src="../../uploads/offroaditinerary/{{ $itinerary->itinerary_image }}" alt="">
                                     </figure>
                                  </div>
                                  @endforeach
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-4">
                         <div class="sidebar">
                            <div class="package-price">
                               <h5 class="price">
                                  <span>{{$rooms->amount }}</span> / per person
                               </h5>
                            </div>
                            <div class="widget-bg booking-form-wrap">
                               <h4 class="bg-title">Booking</h4>
                               <form class="booking-form"method="POST" action="{{route('booked-package')}}" >
                                 @csrf
                                  <div class="row">
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                           <input name="name_booking" type="text" placeholder="Full Name">
                                        </div>
                                     </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                           <input name="email_booking" type="text" placeholder="Email">
                                        </div>
                                     </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                           <input name="phone_booking" type="text" placeholder="Number">
                                        </div>
                                     </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                           <input class="input-date-picker" type="text" name="s" autocomplete="off" readonly="readonly" placeholder="Start-Date">
                                        </div>
                                     </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                           <input class="input-date-picker" type="text" name="s" autocomplete="off" readonly="readonly" placeholder="End-Date">
                                        </div>
                                     </div>
                                     <div class="col-sm-12">
                                        <div class="form-group submit-btn">
                                           
                                           <a href="">
                                             <input  type="submit" name="submit" value="Boook Now">
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </form>
                            </div>
                            <div class="travel-package-content text-center" style="background-image: url(assets/images/img11.jpg);">
                               <h5>MORE PACKAGES</h5>
                               <h3>OTHER TRAVEL PACKAGES</h3>
                               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus.</p>
                               <ul>
                                  <li>
                                     <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Vacation packages</a>
                                  </li>
                                  <li>
                                     <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Honeymoon packages</a>
                                  </li>
                                  <li>
                                     <a href="#"><i class="far fa-arrow-alt-circle-right"></i>New year packages</a>
                                  </li>
                                  <li>
                                     <a href="#"><i class="far fa-arrow-alt-circle-right"></i>Weekend packages</a>
                                  </li>
                               </ul>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <section class="package-section">
                  <div class="container">
                     <div class="section-heading text-center">
                        <div class="row">
                           <div class="col-lg-8 offset-lg-2">
                              <h5 class="dash-style">Similar Room</h5>
                           </div>
                        </div>
                     </div>
                     <div class="package-inner">
                        <div class="row">
                           @foreach($room as $room)
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
               </section>
             </div>
            <!-- subscribe section html start --> 
     @endsection