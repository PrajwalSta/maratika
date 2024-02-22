@extends('frontend/layouts.master')

@section('title')
Contact Us

@endsection

@section('content')

    <!-- Inner Banner html start-->
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url('assets/frontend/images/contact.jpg');">
           <div class="container">
              <div class="inner-banner-content">
                 <h1 class="inner-title">Contact us</h1>
              </div>
           </div>
        </div>
        <div class="inner-shape"></div>
     </section>
     <!-- Inner Banner html end-->
     <!-- contact form html start -->
     <div class="contact-page-section">
        <div class="contact-form-inner">
           <div class="container">
              <div class="row">
               
                 <div class="col-md-6">
                    <div class="contact-from-wrap">
                        
                       <div class="section-heading">
                          <h5 class="dash-style">GET IN TOUCH</h5>
                          <h2>CONTACT US TO GET MORE INFO</h2>
                          <p>Please leave any your query and we will get back to you as soon as possible. Thank you.</p>
                          
                       </div>
                       <form class="contact-from "action={{route('contactsumbit')}} method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                          <p>
                             <input type="text" name="name" placeholder="Your Name*">
                          </p>
                          <p>
                             <input type="email" name="email" placeholder="Your Email*">
                          </p>
                          <p>
                             <textarea rows="8" placeholder="Your Message*"></textarea>
                          </p>
                          <p>
                             <input type="submit" name="submit" value="SUBMIT MESSAGE">
                          </p>
                       </form>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <h3>Need help ?? Feel free to contact us !</h3>
                    <p>Penatibus numquam? Non? Aliqua tempore est deserunt sequi itaque, nascetur, consequuntur conubianigp, explicabo? Primis convallis ullam. Egestas deserunt eius molestias app incididunt.</p>
                    <p>Nostra doloribus blandit et semper ultrices, quibusdam dignissimos! Netus recusandae, rerum cupidatat. Perferendis aptent wisi.</p>
                    <div class="contact-detail-wrap">
                        @foreach ($contactdetails as $contactdetail)
                       <div class="details-list">
                          <ul>
                             <li>
                                <span class="icon">
                                   <i class="fas fa-map-signs"></i>
                                </span>
                                <div class="details-content">
                                   <h4>{{ $contactdetail->title }}</h4>
                                   <span>{!!$contactdetail->details!!}</span>
                                </div>
                             </li>
                          </ul>
                       </div>
                      
                       @endforeach
                       <div class="contct-social social-links">
                        <h3>Follow us on social media..</h3>
                        <ul>
                           <li><a href="https://www.facebook.com/maratikanorling/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                        {{-- <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>--}}
                        <li><a href="https://www.instagram.com/explore/locations/104546152086132/maratika-norling-hotel/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                           <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="map-section">
            <h4><b>Maratika Hotel (Halesi,Khotang)</b></h4>
           
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d113563.48916107105!2d86.54181123839595!3d27.192166914990878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39e935d677f72d59%3A0x820d8f33e95f7259!2sDiktel%20Sadak%2C%20Mahadevsthan%2056200!3m2!1d27.192190999999998!2d86.6242127!5e0!3m2!1sen!2snp!4v1708498000357!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
     </div>
     <!-- contact form html end -->
    @endsection
