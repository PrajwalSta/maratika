@extends('frontend/layouts.master')

@section('content')
<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/images/inner-banner.jpg);">
       <div class="container">
          <div class="inner-banner-content">
             <h1 class="inner-title">Booking</h1>
          </div>
       </div>
    </div>
    <div class="inner-shape"></div>
 </section>
<div class="container">
    <h2 class="text-center" style="padding-bottom: 40px; font-family:Impact;">Select Your Payment</h2><br/>

   <div class="row" style="cursor: pointer">
       <div class="col-lg-6 col-12" style="display: flex; justify-content:center; padding-bottom:40px">
           <img src="https://esewa.com.np/common/images/esewa-logo.png" width="" class="img-thumbnail" style="padding:10px" id="esewa-logo"/>
       </div>
       {{-- <div class="col-lg-4 col-12" style="display: flex; justify-content:center;padding-bottom:40px"><img src="https://d7vw40z4bofef.cloudfront.net/static/2.69.07-web19/images/khalti-logo.svg"  width="40%" class="img-thumbnail" style="padding:10px" id="khalti-logo"></div> --}}
       {{-- <div class="col-lg-3 col-md-3" style="display: flex; justify-content:center;padding-bottom:40px"> <img src="https://www.imepay.com.np/wp-content/themes/WPSTARTER/pagoda_s/img/logo/ime-red.png"  width="40%" class="img-thumbnail" style="padding: 10px" id="ime-logo"/></div> --}}
       <div class="col-lg-4 col-md-4" style="display: flex; justify-content:center;padding-bottom:40px"> <img src="http://cdn.onlinewebfonts.com/svg/img_462170.png"  width="40%" class="img-thumbnail" style="padding: 10px" id="cod"/></div>
   </div>

   <div class="text-center"><button class="btn btn-success" id="select">Proceed To Payment</button></div><br/><br/><br/>

   <form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewa-form">
    <input value="{{$booking->total}}" name="tAmt" type="hidden">
    <input value="{{$booking->total}}" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="{{$booking->id}}" name="pid" type="hidden">
    <input value="{{route('esewa.success')}}" type="hidden" name="su">
    <input value="{{route('esewa.fail')}}" type="hidden" name="fu">
</form>

   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   <script>
      var $images = $('img');
      console.log($images);
      var id;
       $images.click(function () {
           $images.removeClass('highlight');
           $(this).addClass('highlight');
           id=$(this).attr('id');
       });

       $('#select').click(function(e){
           if(id=='cod'){
               e.preventDefault();
               $('#cod-form').submit();
           }

           if(id=='esewa-logo'){
               e.preventDefault();
               $('#esewa-form').submit();
           }


       });
  </script>
  @endsection
