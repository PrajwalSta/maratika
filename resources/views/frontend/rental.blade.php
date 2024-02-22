@extends('frontend/layouts.master')
@section('title')
Rent Bike || OffroadNepal
    
@endsection
@section('header-link')
<style>
    p{
        color:#777777!important;
        font-weight:200;
    }
</style>
@endsection
@section('body')

    <!--================ Start banner section =================-->
    <section class="hero-wrap" style="background-image: url('../../assets/img/about.jpg');">
        <div class="overlay"></div>
        <div class="container hero-container">
          <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
             <p class="breadcrumbs"><span class="mr-2"><a href="route{{'homepage'}}" style="color:#E3051A">{{__('Home')}} <i class="fa fa-chevron-right"></i></a></span> <span>{{__('Rental')}}<i class="fa fa-chevron-right"></i></span></p>
             <h1 class="mb-0 bread"><b>{{__('Rent a Bike')}}</b></h1>
           </div>
         </div>
       </div>
      </section>
    <!--================ End banner section =================-->
     @if(Session::has('message_sent'))
            <div class="alert alert-success" role="alert">
                <script> 
        
        
                    Swal.fire(
              'Your Bike has been Rented Successfully',
              'We Will Contact You as Soon As Posible!',
              'success'
            )
                    </script>
                    </div>
                    @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title text-center w-100" id="exampleModalLabel"><b>{{__('Rent a Bike')}}</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('booked-bike')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="name">{{__('Name')}}</label>
                            <input id="name" name="name" type="text" placeholder="" class="form-control" required>
                        </div>
                    </div>
                   <div class="col-12 d-flex flex-wrap" style="padding:0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="Age">{{__('Age')}}</label>
                            <input id="Age" name="Age" type="number" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="email">{{__('Email')}}</label>
                            <input id="email" type="text" name="email" placeholder="" class="form-control" required>
                        </div>
                    </div>
                  </div>
                    <div class="col-12 d-flex flex-wrap" style="padding:0">
                      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">{{__('Phone')}}</label>
                            <input id="phone" type="text" name="phone" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label" for="address">{{__('Address')}}</label>
                            <input id="address" type="text" name="address" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                          <label class="control-label" for="phone">{{__('Date of Booking:')}}</label>
                          <input id="boking" type="date" name="dbooking"  class="form-control" required>
                      </div>
                  </div>
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                          <label class="control-label" for="country">{{__('Number of Days')}}</label>
                          <input id="days" type="number" name="days" onchange="calculate()" placeholder="" class="form-control" required>
                      </div>
                  </div>
                  <br/>
                  <span>{{__('Amount')}}: &euro;<span class="percost" data-price=""></span>/{{__('day')}}</span>
                   <h3><b>{{__('Your Total')}}:&nbsp;&nbsp;&nbsp;&euro;<b class="totalamt"></b> </h3>
                   <script>
                     function rent(event){
                      var percost=document.querySelector('.percost');
                      percost.innerHTML=event.target.dataset.price;
                       document.querySelector('.percost').dataset.price= event.target.dataset.price;
                      
                      console.log(percost)
                      
    
                      
                     }
                     function calculate(){
                      var price=document.querySelector('.percost').dataset.price;
                      console.log(price);
                      var days=document.getElementById('days').value;
                    var totalcost=document.querySelector('.totalamt');
                    totalAmt=parseInt(price)*days;
                    totalcost.innerHTML=totalAmt;
                     }
                   
                   
                      
                    
                    </script>
                    

                      <div class="modal-footer p-4">
                        <input type="submit"  class="main_btn w-60 " style="color:#fff;background-color: #E3051A">
                                           
                                            {{-- <img src="../../assets/img/next.png" alt=""> --}}
                                           
                                        </a>
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>

    <!--================About US Area =================-->
    <div class="site-section py-5">
        <div class="container">
             @foreach ($rental as $rental)
               @if ($rental->direction==="LTL")

          <div class="row align-items-center">
               <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000" >
                  <img src="../../uploads/rental/{{$rental->rental_image}}" alt="" srcset="" style="max-height: 300px"> 
            </div>
            <div class="col-md-6 " style="display: grid;align-items:center;justify-content:center">
              <div class="heading-39101 mb-5">
                
                <span class="backdrop mt-5"> @switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_backtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_backtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_backtitle }}
                              @break 
                              @default
                              {{  $rental->rental_backtitle }}
                          @endswitch</span>
                <span class="subtitle-39191"  style="font-size: 24px;"> @switch(app()->getLocale())
                            @case('es')
                            {{ $rental->rental_es_title }}  
                            @break
        
                            @case('de')
                            {{ $rental->rental_ger_title }}  
                            @break
                            @case('fr')
                            {{ $rental->rental_fr_title }}
                            @break 
                            @default
                            {{  $rental->rental_title }}
                         @endswitch</span>
                <h3>@switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_subtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_subtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_subtitle }}
                              @break 
                              @default
                              {{  $rental->rental_subtitle }}
                          @endswitch</h3>
                <br/>
                <style>
                  span {
  content: "\2713";
  font-weight: bolder;
  font-size: 18px;
}
                </style>
                
                <p>
                     @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_description !!}  
                      @break
  
                      @case('de')
                      {!! $rental->rental_ger_description !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_description !!}
                      @break 
                      @default
                      {!!  $rental->rental_description !!}
                  @endswitch
                </p>
                 <a href="#" class="main_btn" onclick="rent(event)" id="rent" style="" data-toggle="modal" data-target="#exampleModal" data-price="65">
											{{__('Rent Now')}}
											<img src="../../assets/img/next.png" alt="">
										</a>
                   
                
                 
                
              </div>
            
            </div>
            
           
          </div>
          @endif
           @if ($rental->direction==="RTL")

          <div class="row align-items-center">
              
            <div class="col-md-6 " style="display: grid;align-items:center;justify-content:center">
              <div class="heading-39101 mb-5">
                
                <span class="backdrop mt-5"> @switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_backtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_backtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_backtitle }}
                              @break 
                              @default
                              {{  $rental->rental_backtitle }}
                          @endswitch</span>
                <span class="subtitle-39191"  style="font-size: 24px;"> @switch(app()->getLocale())
                            @case('es')
                            {{ $rental->rental_es_title }}  
                            @break
        
                            @case('de')
                            {{ $rental->rental_ger_title }}  
                            @break
                            @case('fr')
                            {{ $rental->rental_fr_title }}
                            @break 
                            @default
                            {{  $rental->rental_title }}
                         @endswitch</span>
                <h3>@switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_subtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_subtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_subtitle }}
                              @break 
                              @default
                              {{  $rental->rental_subtitle }}
                          @endswitch</h3>
                <br/>
                <style>
                  span {
  content: "\2713";
  font-weight: bolder;
  font-size: 18px;
}
                </style>
                <p>
                     @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_description !!}  
                      @break
  
                      @case('de')
                      {!! $rental->rental_ger_description !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_description !!}
                      @break 
                      @default
                      {!!  $rental->rental_description !!}
                  @endswitch
                </p>
                 <a href="#" class="main_btn" onclick="rent(event)" id="rent" style="" data-toggle="modal" data-target="#exampleModal" data-price="65">
											{{__('Rent Now')}}
											<img src="../../assets/img/next.png" alt="">
										</a>
                   
                
                 
                
              </div>
            
            </div>
            
            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000" >
                  <img src="../../uploads/rental/{{$rental->rental_image}}" alt="" srcset="" style="max-height: 300px"> 
            </div>
          </div>
          @endif
           @endforeach
          
        
        </div>
      </div>
  

      @endsection
      @section('scripts')
  
      @endsection