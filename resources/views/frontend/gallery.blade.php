@extends('frontend/layouts.master')
@section('title')
Gallery || Maratika Hotel
    
@endsection
@section('content')






    <!--================ Start banner section =================-->
    <section class="inner-banner-wrap">
      <div class="inner-baner-container" style="background-image: url('assets/frontend/images/gallery.jpg');">
         <div class="container">
            <div class="inner-banner-content">
               <h1 class="inner-title">Gallery</h1>
            </div>
         </div>
      </div>
      <div class="inner-shape"></div>
   </section>
    <!--================ End banner section =================-->
    <div class="gallery-section">
      <div class="container">
         <div class="gallery-outer-wrap">
            <div class="gallery-inner-wrap gallery-container grid">
               @foreach ($gallery as $gallery)
               <div class="single-gallery grid-item">
                 
                     <figure class="gallery-img">
                        <img src="../../uploads/galleries/{{ $gallery->gallery_image }}" alt="" class="gall">
                        <div class="gallery-title">
                           <h3>
                              <a href="../../uploads/galleries/{{ $gallery->gallery_image }}" data-lightbox="lightbox-set">
                                 {{ $gallery->galleryTitle }}
                              </a>
                           </h3>
                        </div>
                     </figure>
                    
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
 @endsection