@extends('layouts.cmslayout')
@section('title')
Maratika  Dashboard
    
@endsection
@section('content')
<style>
    .card.green {
        margin-right: 5%;
        color: white;
        background: rgb(33,68,196);
background: linear-gradient(180deg, rgba(33,68,196,1) 33%, rgba(64,96,198,1) 60%, rgba(66,115,212,1) 72%);
}
a:hover{
  text-decoration: none!important;
}
</style>

  {{-- end of Modal fORM --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">General Overview

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        {{-- fetched data from google analytics --}}
        <div class="card-body d-flex flex-wrap justify-items-around">
          <a href="#">
            <div class="card  green col-lg-11 d-flex justify-content-center mb-sm-4 ftco-animate">
              <div class="card-header">
                  <h2>Total Visitors</h2>
              </div>
              <div class="card-body">
                <h2 class="text-center">{{ $totalvisitors}}</h2>

                
              </div>
              
            </div>
          </a>
           <a href="#">
            <div class="card  green col-lg-11 d-flex justify-content-center mb-sm-4 ftco-animate">
              <div class="card-header">
                  <h2>Total PageViews</h2>
              </div>
              <div class="card-body">
                <h2 class="text-center">{{ $totalpageViews }}</h2>

                
              </div>
              
            </div>
          </a> 
        </div>
        
        <div class="card-body d-flex flex-wrap justify-items-around">
  
           {{-- <a href="./cms-gallery">
              <div class="card  green col-lg-11 d-flex justify-content-center mb-sm-4 ftco-animate ">
                <div class="card-header">
                    <h2>Total OnRoadTours</h2>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{ count($onroad) }}</h2>
                </div>
                
              </div>
            </a>--}}
            <a href="./cms-projects">
              <div class="card  green col-lg-11 d-flex justify-content-center mb-sm-4 ftco-animate">
                <div class="card-header">
                    <h2>Total Rooms</h2>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{ count($offroad) }}</h2>
                </div>
                
              </div>
            </a>
            <a href="./role-register">
              <div class="card  green col-lg-11 d-flex justify-content-center mb-sm-4 ftco-animate">
                <div class="card-header">
                    <h2>Total Users</h2>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{ count($user) }}</h2>
                </div>
                
              </div>
            </a>

        </div>
        
      </div>
    </div>
  </div>
     <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>

@endsection