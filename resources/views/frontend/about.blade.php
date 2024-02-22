@extends('frontend/layouts.master')
@section('title')
About US || Maratika Hotel
    
@endsection

@section('content')


    <!--================ Start banner section =================-->
    <section class="inner-banner-wrap">
      <div class="inner-baner-container" style="background-image: url('assets/frontend/images/about.jpg');">
         <div class="container">
            <div class="inner-banner-content">
               <h1 class="inner-title">About us</h1>
            </div>
         </div>
      </div>
      <div class="inner-shape"></div>
   </section>
    <!--================ End banner section =================-->

    <!--================About US Area =================-->
    <section class="about-section about-page-section">
      <div class="about-service-wrap">
         <div class="container">
            <div class="section-heading">
               <div class="row align-items-end">
                @foreach ($aboutus as $aboutus)
               
                  <div class="col-lg-3">
                     <h5 class="dash-style">{{  $aboutus->aboutus_title }}</h5>
                     <div>
                        <img src="../../uploads/aboutus/{{$aboutus->aboutus_image }}" alt=""class="aboutimg"> 
                     </div>
                  </div>
                  <div class="col-lg-9">
                     <div class="section-disc">
                       
                        <p>{!!Str::words( $aboutus->aboutus_description, 150, '.')!!}</p>
                        
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="about-service-container">
               <div class="row">
                  @foreach ($whyus as $why)
                  <div class="col-lg-4">
                     <div class="about-service">
                        <div class="about-service-icon">
                           <img src="../../uploads/whyus/{{$why->whyus_image }}" alt="">
                        </div>
                        <div class="about-service-content">
                           <h4>{{$why->whyus_title}}</h4>
                           <p>{!!$why->whyus_description!!}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="about-video-wrap" style="background-image: url(assets/images/img25.jpg);">
               <div class="video-button">
                  <video width="1140" height="520" controls>
                     <source src="{{url('assets/frontend/images/GA7vgRlTxOIm6qEGAIgdH7IlAaBXbmdjAAAF.mp4')}}" type="video/mp4">
                     
                    </video>
               </div>
            </div>
         </div>
      </div>
      <!-- client section html start -->
   {{--  <div class="client-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="section-heading text-center">
                     <h5 class="dash-style">OUR ASSOCAITES</h5>
                     <h2>PARTNER'S AND CLIENTS</h2>
                     <p>Mollit voluptatem perspiciatis convallis elementum corporis quo veritatis aliquid blandit, blandit torquent, odit placeat. Adipiscing repudiandae eius cursus? Nostrum magnis maxime curae placeat.</p>
                  </div>
               </div>
            </div>
            <div class="client-wrap client-slider">
               <div class="client-item">
                  <figure>
                     <img src="{{url('assets/frontend/images/logo7.png')}}" alt="">
                  </figure>
               </div>
               <div class="client-item">
                  <figure>
                     <img src="assets/images/logo8.png" alt="">
                  </figure>
               </div>
               <div class="client-item">
                  <figure>
                     <img src="assets/images/logo9.png" alt="">
                  </figure>
               </div>
               <div class="client-item">
                  <figure>
                     <img src="assets/images/logo10.png" alt="">
                  </figure>
               </div>
               <div class="client-item">
                  <figure>
                     <img src="assets/images/logo11.png" alt="">
                  </figure>
               </div>
               <div class="client-item">
                  <figure>
                     <img src="assets/images/logo8.png" alt="">
                  </figure>
               </div>
            </div>
         </div>
      </div>--}}
      <!-- client html end -->
      <!-- callback section html start -->
      <div class="fullwidth-callback" style="background-image: url('assets/frontend/images/fallback.jpg');">
         <div class="container">
            <div class="section-heading section-heading-white text-center">
               <div class="row">
                  <div class="col-lg-8 offset-lg-2">
                     <h5 class="dash-style">CALLBACK FOR MORE</h5>
                     <h2>norling Maratika hotel</h2>
                     <p>You can enjoy the best trip to halesi mahadev temple and natural beauty around Hotel Maratikanorling.</p>
                  </div>
               </div>
            </div>
            <div class="callback-counter-wrap">
               <div class="counter-item">
                  <div class="counter-item-inner">
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
               </div>
               <div class="counter-item">
                  <div class="counter-item-inner">
                     <div class="counter-icon">
                       <img src="assets/images/icon2.png" alt="">
                     </div>
                     <div class="counter-content">
                        <span class="counter-no">
                           <span class="counter">250</span>K+
                        </span>
                        <span class="counter-text">
                           Awards Achieve
                        </span>
                     </div>
                  </div>
               </div>
               <div class="counter-item">
                  <div class="counter-item-inner">
                     <div class="counter-icon">
                       <img src="assets/images/icon3.png" alt="">
                     </div>
                     <div class="counter-content">
                        <span class="counter-no">
                           <span class="counter">15</span>K+
                        </span>
                        <span class="counter-text">
                           Active Members
                        </span>
                     </div>
                  </div>
               </div>
               <div class="counter-item">
                  <div class="counter-item-inner">
                     <div class="counter-icon">
                       <img src="assets/images/icon4.png" alt="">
                     </div>
                     <div class="counter-content">
                        <span class="counter-no">
                           <span class="counter">10</span>K+
                        </span>
                        <span class="counter-text">
                           Tour Destnation
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- callback html end -->
   </section>
   <!-- about html end -->
      @endsection