@extends('frontend/layouts.master')
@section('title')
Gallery-Details
    
@endsection
<!-- for lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

@section('header-link')
<style>
        .ekko-lightbox-container>div.ekko-lightbox-item{
                position: relative!important;
                z-index: 99999!important;
        }
        </style>
{{-- for light box --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    
@endsection
@section('body')

<!-- banner================================baner====================== -->
<div class="container-fluid" style="color: white;">
<div class="row">
  <div class="col-12 abt-banner">
    <span class="black-mask">

    </span>

     <div class="banner-txt align-items-center justify-content-center d-flex flex-wrap">
      <div class="banner-head">
            <h2 class="text-center justify-content-center">Gallery-Details</h2>
       </div>
      

      </div>
  </div>
</div>
</div>
<div class="container-fluid" style="background-color: #eeeeee;">
  <h6 class="p-3">Home >Gallery <span class="highlight">Details</span></h6>
</div>


<!-- for about us content -->
<div class="container-fluid p-4">
    <div class="row" style="">
      <h2 class="col-12  highlight justify-content-center">Photo Gallery</h2>
      
          
   
      @foreach (json_decode($gallery->more_gallery_image) as $galler)
              <div class="col-11 ml-3 mr-3 m-sm-0 col-sm-4 mt-1 mt-sm-0 p-1 life-card">
                <div class="overlay">
                      
                        <div class="text">
                                <a href="../../uploads/galleries/{{ $galler}}"  data-toggle="lightbox" data-max-width="400" style="font-size:14px;color:white">
                              <b style="font-size:30px;"><i class="fa fa-search-plus" aria-hidden="true"></i></b></a>
                        </div>
                            
                                
                </div>
                <img src="../../uploads/galleries/{{ $galler}}" alt="" srcset="" class="card-img-top life-img">
              

                </div>
        @endforeach
        

                       
                      
    </div>

        <div class="row mt-4 justify-content-center">
        <h3 style="font-weight:bold;letter-spacing:3" class="text-capitalize" >{{$gallery->galleryTitle}}</h3>
        </div>
        <div class="row m-4">
                <p>{{$gallery->description}}</p>

        </div>
    
        
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js" integrity="sha512-/9ltsw0ddogPoOQZkl7U3lRYyviG0gfrvhvNZuITPo3W5aPkXGtyJPnsAI8Kro+kVOXZ0YqbLI8B44f/7Tal/w==" crossorigin="anonymous"></script>
@endsection