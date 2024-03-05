@extends('frontend/layouts.master')

@section('title')
Booking || maratika hotel
    
@endsection

@section('content')
<!--================ Start banner section =================-->
<section class="inner-banner-wrap">
   <div class="inner-baner-container" style="background-image: url('assets/frontend/images/gallery.jpg');">
      <div class="container">
         <div class="inner-banner-content">
            <h1 class="inner-title">Booking</h1>
         </div>
      </div>
   </div>
   <div class="inner-shape"></div>
</section>
<!--================ End banner section =================-->
<div class="step-section booking-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 right-sidebar">
            <!-- step one form html start -->
            <div class="booking-form-wrap">
               <form action="{{route('save_info')}}" method="post">
                  @csrf
                  <div class="booking-content">
                     <div class="form-title">
                        <span>1</span>
                        <h3>Your Details</h3>
                     </div>
                       
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Full name*</label>
                                 <input type="text" class="form-control" name="firstname">
                              </div>
                           </div>
                        
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Email*</label>
                                 <input type="email" class="form-control" name="email">
                              </div>
                           </div>
                     
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label>Phone*</label>
                                 <input type="text" class="form-control" name="phone">
                              </div>
                           </div>
                        </div>
                     
                  </div>
                  <div class="booking-content">
                     <div class="form-title">
                        <span>3</span>
                        <h3> Address</h3>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label>Country*</label>
                              <input type="text" name="country">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label>State*</label>
                              <input type="text" name="state_booking">
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label>City*</label>
                              <input type="text" name="city_booking">
                           </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Additional Information</label>
                              <textarea rows="6" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                           </div>
                        </div>
                     </div>
                     <!--End row -->
                  </div>
                  <div class="form-policy">
                     
                     <input type="submit" class="button-primary">
                  </div>

               </form>
             
            </div>
        
            <!-- step one form html end -->
         </div>
         <div class="col-lg-4">
            <aside class="sidebar">
               <div class="widget-bg widget-table-summary">
                  <h4 class="bg-title">Summary</h4>
                  <table>
                     <tbody>
                        <tr>
                           <td>
                              <strong>Packages cost </strong>
                           </td>
                           <td class="text-right">
                              $300
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <strong>Dedicated tour guide</strong>
                           </td>
                           <td class="text-right">
                              $34
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <strong>Insurance</strong>
                           </td>
                           <td class="text-right">
                              $34
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <strong>tax</strong>
                           </td>
                           <td class="text-right">
                              13%
                           </td>
                        </tr>
                        <tr class="total">
                           <td>
                              <strong>Total cost</strong>
                           </td>
                           <td class="text-right">
                              <strong>$368</strong>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="widget-bg widget-support-wrap">
                  <div class="icon">
                     <i class="fas fa-phone-volume"></i>
                  </div>
                  <div class="support-content">
                     <h5>HELP AND SUPPORT</h5>
                     <a href="telto:12345678" class="phone">+11 234 889 00</a>
                     <small>Monday to Friday 9.00am - 7.30pm</small>
                  </div>
               </div>
            </aside>
         </div>
      </div>
   </div>
</div>

@endsection


