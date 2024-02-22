@extends('frontend/layouts.master')
@section('title')
Sponsor Help
    
@endsection
@section('header-link')

@endsection
@section('body')
    
    <div class="hero-wrap" style="background-image: url('../../assets/images/help.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Sponsor help</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Your Little Contribution Makes a lot</h1>
          </div>
        </div>
      </div>
    </div>

    <section>
      <div class="container">
        <div class="row p-5">
          <div class="col-md-10 col-md-offset-1">
            <h4 class="text-uppercase mb-5">How to Support us !!</h4>
            <div class="line-bottom mb-20"></div>
            <p class="maxwidth600">By sponsoring the Children of Sagarmatha project for a monthly amount of 25 USD / 50 USD / 75 USD or more depending on your circumstances.</p>
            <blockquote>For more informations, please contact the Swiss Organization Sagarmatha:<a href="http://www.sagarmathasuisse.ch/" target="_blank"> www.sagarmathasuisse.ch</a> by making a donation.</blockquote><br>
            <h4 class="text-uppercase mb-5"><u>For any enquiry</u></h4>
            <form id="donation-form" class="donation-form" >
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter Name" name="donate_name" id="donate_name" required="" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" placeholder="Enter Email" name="donate_email"  id="donate_email" class="form-control" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-20">
                    <label>Donation Amount</label>
                    <div class="radio">
                      <label class="radio-inline">
                        <input type="radio" value="20" name="donate_amount">
                        20 USD</label>
                      <label class="radio-inline">
                        <input type="radio" value="50" name="donate_amount">
                        50 USD</label>
                      <label class="radio-inline">
                        <input type="radio" value="100" name="donate_amount">
                        100 USD</label>
                      <label class="radio-inline">
                        <input type="radio" value="200" name="donate_amount">
                        200 USD</label>
                      <label class="radio-inline">
                        <input type="radio" value="500" name="donate_amount">
                        500 USD</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-20">
                    <label>Donation Type</label>
                    <div class="radio">
                      <label class="radio-inline">
                        <input type="radio" value="One Time" name="donate_type">
                        One Time</label>
                      <label class="radio-inline">
                        <input type="radio" value="Weekly" name="donate_type">
                        Weekly</label>
                      <label class="radio-inline">
                        <input type="radio" value="Monthly" name="donate_type">
                        Monthly</label>
                      <label class="radio-inline">
                        <input type="radio" value="Yearly" name="donate_type">
                        Yearly</label>
                      <label class="radio-inline">
                        <input type="radio" value="Lifetime" name="donate_type">
                        Lifetime</label>
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>I Want to Donate for</label>
                    <select class="form-control" name="donate_for">
                      <option>educate children</option>
                      <option>Summer Camps</option>
                      <option>Give Clean Water</option>
                      <option>Ensuring better life</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Your Valuable message</label>
                <textarea rows="5" placeholder="Enter Message" id="donate_message" name="donate_message" required class="form-control"></textarea>
              </div>
              <br/>
              <div class="form-group">
                <button data-loading-text="Please wait..." class="btn btn-colored btn-rounded btn-orange pl-30 pr-30" type="submit">Donate Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    

    @endsection
    @section('scripts')

    @endsection