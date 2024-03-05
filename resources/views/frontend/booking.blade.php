@extends('frontend/layouts.master')

@section('title')
Booking ||Maratika

@endsection

@if(Session::has('message_sent'))
<div class="alert alert-success" role="alert">
    <script>


        Swal.fire(
  'Your Booking has been sent Successfully',
  'We Will Contact You as Soon As Posible!',
  'success'
)
        </script>
        </div>
        @endif

@section('content')
<!--================ Start banner section =================-->
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
 <!-- Inner Banner html end-->
 <div class="step-section booking-section">
    <div class="container">
       <div class="step-link-wrap">
          <div class="step-item active">
             Your cart
             <a href="#" class="step-icon"></a>
          </div>
          <div class="step-item active">
             Your Details
             <a href="#" class="step-icon"></a>
          </div>
          <div class="step-item">
             Finish
             <a href="#" class="step-icon"></a>
          </div>
       </div>
       <div class="row">

          <div class="col-lg-8 right-sidebar">

            <form action="{{route('proceed-payment')}}" method="post">
                @csrf
             <!-- step one form html start -->
             <div class="booking-form-wrap">
               @if (1)
               <div class="booking-content">
                <div class="form-title">
                   <span>1</span>
                   <h3>Your Details</h3>
                </div>
                <div class="row">
                   <div class="col-sm-6">
                      <div class="form-group">
                         <label>First name*</label>
                         <input type="text" class="form-control" name="full_name" required>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                         <label>Email*</label>
                         <input type="email" class="form-control" name="email" required>
                      </div>
                   </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                         <label>Phone*</label>
                         <input type="text" class="form-control" name="contact" required>
                      </div>
                   </div>
                   <div class="col-sm-6">
                    <div class="form-group">
                       <label>Date of Booking*</label>
                       <input type="date" class="form-control" name="date" required>
                    </div>
                 </div>

                 <div class="col-sm-6">
                    <div class="form-group">
                       <label>Number of Person*</label>
                       <input type="number" class="form-control" name="number_of_person" id="number_of_person" onchange="calculate()" required>
                    </div>
                 </div>
                </div>
             </div>
               @endif


                <div class="booking-content">
                   <div class="form-title">
                      <span>2</span>
                      <h3>Address</h3>
                   </div>
                   <div class="row">
                      <div class="col-sm-12">
                         <div class="form-group">
                            <label>Country*</label>
                            <input type="text" name="country" required>
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-sm-6">
                         <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" required>
                         </div>
                      </div>
                         <div class="col-md-3 col-sm-6">
                            <div class="form-group">
                               <label>Postal code*</label>
                               <input type="text" name="postal_code" required>
                            </div>
                         </div>

                      <div class="col-md-12 col-sm-12">
                         <div class="form-group">
                            <label>Additional Information</label>
                            <textarea rows="6" placeholder="Any Prior Information" name="info"></textarea>
                         </div>
                      </div>
                      <input type="hidden" value="{{$room_detail->id}}" name="room_id"/>
                      <input type="hidden" value="{{$room_detail->amount}}" name="amount"/>

                   </div>
                   <!--End row -->
                </div>
                <div class="form-policy">
                   <h3>Cancellation policy</h3>
                   <div class="form-group">
                      <label class="checkbox-list">
                         <input type="checkbox" name="s">
                         <span class="custom-checkbox"></span>
                         I accept terms and conditions and general policy.
                      </label>
                   </div>
                   <input type="submit" class="button-primary" value="Save & Proceed">
                </div>
             </div>
    </form>
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
                               <strong>Room type </strong>
                            </td>
                            <td class="text-right">
                               {{$room_detail->title}}
                            </td>
                         </tr>
                         <tr>
                            <td>
                                <strong>Number of Person</strong>
                             </td>
                             <td class="text-right">
                                    <span class="totalperson">1</span>
                             </td>
                         </tr>

                         <tr>
                            <td>
                               <strong>Room cost </strong><br/>
                               {{__('Your Total')}}:&nbsp;&nbsp;&nbsp;&euro;
                            </td>

                            <td class="text-right">
                                <span><span class="percost" data-price="{{ $room_detail->amount }}"></span>{{ $room_detail->amount }}/person</span><br/>
                                Rs.<b><b class="totalamt"></b>



                            </td>
                         </tr>
                         <tr>
                            <td>
                               <strong>Your Name</strong>
                            </td>
                            <td class="text-right">
                                <?php echo Cookie::get('name')?>
                            </td>
                         </tr>
                         <tr>
                            <td>
                               <strong>Email</strong>
                            </td>
                            <td class="text-right">
                                <?php echo Cookie::get('email')?>
                            </td>
                         </tr>
                         <tr>
                            <td>
                               <strong>Contact Number</strong>
                            </td>
                            <td class="text-right">
                                <?php echo Cookie::get('contact')?>
                            </td>
                         </tr>
                         <tr class="total">
                            <td>
                               <strong>Total cost</strong>
                            </td>
                            <td class="text-right">
                               <strong class="finalcost"></strong>
                            </td>
                         </tr>
                      </tbody>
                   </table>
                </div>
                <script>
                    function calculate(){
                        var percost=document.querySelector('.percost').dataset.price;
                        var number_of_person=document.getElementById('number_of_person').value;
                        var totalcost=document.querySelector('.totalamt');
                        var totalcostwithVat=document.querySelector('.finalcost');
                        var totalperson=document.querySelector('.totalperson');
                        totalAmt=parseInt(percost)*number_of_person;
                        totalperson.innerHTML=number_of_person;
                        totalcost.innerHTML=totalAmt;
                        totalcostwithVat.innerHTML=totalAmt;

                        }
                   </script>
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
