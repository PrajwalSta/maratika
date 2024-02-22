
@extends('frontend/layouts.master')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@section('title')
Become An Ambasadors

@endsection
@section('header-link')
    
@endsection
@section('body')
<section class="hero-wrap" style="background-image: url('../../assets/img/2.jpg');">
    <div class="overlay"></div>
    <div class="container hero-container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
         <p class="breadcrumbs"><span class="mr-2"><a href="{{route('homepage')}}" style="color:#E3051A">Home
            <i class="fa fa-chevron-right"></i></a></span> <span>Ambasador <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-0 bread">Become An Ambasador</h1>
       </div>
     </div>
   </div>
  </section>
  <div class="section-gap pt-5 ">
        @if(Session::has('ambassadormessage_sent'))
    <div class="alert alert-success" role="alert">
        <script>


            Swal.fire(
      'Thanks For Contacting Us!',
      'We Will Contact You as Soon As Posible!',
      'success'
    )
            </script>
            </div>
            @endif

    <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-12">
                        <div class="heading-39101">
                            <span class="backdrop justify-content-center w-100" style="display: flex;font-size:64px;color:#afaeae;opacity:.5">Become An Ambassador </span>
                            <span class="subtitle-39191">Get a Chance</span>
                            <h3>Become an Ambasador</h3>
                          </div>
                    </div>
                    @foreach ($ambasadorcontents as $ambasadorcontent)
                    @if ($ambasadorcontent->direction=="RTL")
                        <div class="row px-5 align-items-center">
                            @if($ambasadorcontent->image!='')
                            <div class="col-md-6 " style="display: grid;align-items:center;justify-content:center">
                            <div class="heading-39101 mb-5">
                                <p style="color: black">{{ $ambasadorcontent->ambasador_description}}</p>
                            </div>

                            </div>
                            
                            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000" >
                            <img src="../../uploads/ambasador/{{ $ambasadorcontent->image }}" alt="Image" class="img-fluid" style="max-height: 400px">
                            </div>
                            @else
                            <div class="col-md-12 " style="display: grid;align-items:center;justify-content:center">
                                <div class="heading-39101 mb-5">
                                    <p style="color: black">{{ $ambasadorcontent->ambasador_description}}</p>
                                </div>

                            </div>
                            
                            @endif
                        </div>
                    @else
                        <div class="row px-5 align-items-center">
                            <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000" >
                                <img src="../../uploads/ambasador/{{ $ambasadorcontent->image }}" alt="Image" class="img-fluid" style="max-height: 400px">
                                </div>
                            <div class="col-md-6 " style="display: grid;align-items:center;justify-content:center">
                            <div class="heading-39101 mb-5">
                                <p style="color: black">{{ $ambasadorcontent->ambasador_description}}</p>
                            </div>

                            </div>


                        </div>
                    @endif

                    @endforeach

                </div>
                      <div class="row mt-5 pt-3 flex-wrap">
                        @foreach ($ambasadors as $ambasador)
                        <div class="col-md-4 ftco-animate">
                            <div class="project-wrap">
                                <a href="#" class="img" style="background-image: url(../../uploads/ambasador/{{ $ambasador->ambasador_image }});background-repeat: no-repeat;background-size: cover;">
                                </a>
                                <div class="text p-4">
                                    <h3><a href="#">{{$ambasador->ambasador_title}}</a></h3>
                                    <p class="location"> &nbsp;{{$ambasador->ambasador_description}}</p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                      <hr/>
                </div>
    </div>
    </div>
</div>
<hr/>

  <div class="container-fluid">
      <div class="container">
        <form action="{{ route('submitambassador')}}" method="post">
            @csrf
          <div class="row p-3">


                        @foreach ($forms as $form)
                    @if ($form->form_type!="textarea")
                        <div class="col-sm-6 col-12">
                            <label><span style="color:#fa5d3b">* </span>{{ $form->form_name}}: </label><br/>
                            <input type="{{ $form->form_type }}" class="form-control" name="{{  $form->form_name }}" placeholder="{{ $form->form_name }}">
                        </div>
                    @else
                        <div class="col-12 ">
                            <label for="form-field-" class="elementor-field-label"> {{ $form->form_name}}: </label><br/>
                            <textarea class="form-control" rows="4" name="{{  $form->form_name }}"></textarea>
                        </div>

                    @endif

                    @endforeach
                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" value="submit" class="main_btn">
                            Join Me
                            <img src="img/next.png" alt="">
                        </button>
                    </div>
          </div>
        </form>


              {{-- <div class="col-sm-6 col-12">
                  <label><span style="color:#fa5d3b">* </span>Last Name: </label><br/>
                  <input type="text" class="form-control" name="lastname">
              </div>
              <div class="col-sm-6 col-12">
                  <label>Company name</label><br/>
                  <input size="1" type="text" class="form-control" name="company">
              </div>
              <div class="col-sm-6 col-12">
                  <label><span style="color:#fa5d3b">* </span>Address: </label><br/>
                  <input size="1" type="text" class="form-control" name="address">
              </div>
              <div class="col-sm-6 col-12">
                  <label for="form-field-" class="elementor-field-label"><span style="color:#fa5d3b">* </span>City: </label><br/>
                  <input type="text" class="form-control" name="city">
              </div>
              <div class="col-sm-6 col-12">
                  <label for="form-field-" class="elementor-field-label"><span style="color:#fa5d3b">* </span>State:</label><br/>
                  <input type="text" class="form-control" name="state">
              </div>
              <div class="col-sm-6 col-12">
                  <label for="form-field-" class="elementor-field-label"><span style="color:#fa5d3b">* </span>Zip Code:</label><br/>
                  <input type="text" class="form-control" name="code">
              </div>
              <div class="col-sm-6 col-12">
                  <label><span style="color:#fa5d3b">* </span>Country:</label><br/>
                  <input type="text" class="form-control" name="country">
              </div>
              <div class="col-sm-6 col-12">
                  <label><span style="color:#fa5d3b">* </span>Email:  </label><br/>
                  <input size="1" type="text" class="form-control" name="email">
              </div>
              <div class="col-12 ">
                  <label for="form-field-" class="elementor-field-label">Describe your Reasons. Why you want to Partner With Us.  </label><br/>
                  <textarea class="form-control" rows="4" name="describe"></textarea>
              </div>

              <div class="col-12 ">
                  <label for="form-field-" class="elementor-field-label">Your Message</label><br/>
                  <textarea class="form-control" rows="4" name="why"></textarea>
              </div> --}}

          </div>


              <!--<span id="popup-reset" style="float:right; padding:12px 8px; cursor:pointer"><i class="fa fa-refresh"></i></span><div id="popup-captcha" style="float:right"></div>-->


          </div>
      </div>
  </div>

  @endsection
  @section('scripts')

  @endsection
