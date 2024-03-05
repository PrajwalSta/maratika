@extends('layouts.cmslayout')
@section('title')
About us
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">About us

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
        <div class="content">
          @foreach ($aboutus as $aboutus)
              
         
            <div class="title">
                <div class="about-title">
                  <b>Title :</b>
               
                  @switch(app()->getLocale())
                    @case('es')
                    {{ $aboutus->aboutus_es_title }}  
                    @break

                    @case('de')
                    {{ $aboutus->aboutus_ger_title }}  
                    @break
                    @case('fr')
                    {{ $aboutus->aboutus_fr_title }}
                    @break 
                    @default
                    {{  $aboutus->aboutus_title }}
                 @endswitch
                </div>
                <div class="aboutus-subtitle">
                  <b>Sub-Title :</b>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $aboutus->aboutus_es_subtitle }}  
                      @break
  
                      @case('de')
                      {{ $aboutus->aboutus_ger_subtitle }}  
                      @break
                      @case('fr')
                      {{ $aboutus->aboutus_fr_subtitle }}
                      @break 
                      @default
                      {{  $aboutus->aboutus_subtitle }}
                  @endswitch
                  
                </div>
                <div class="img">
                  <img src="../../uploads/aboutus/{{ $aboutus->aboutus_image }}" alt="" srcset="" height="200px"> 

                </div>
                <div class="aboutus-description">
                  <b>Description :</b><br/>
                  
                      {!!  $aboutus->aboutus_description !!}
               
                </div>

                <div class="img-featured">
                  <img src="../../uploads/aboutus/{{ $aboutus->aboutus_featured_image }}" alt="" srcset="" height="70px"> 

                </div>
            </div>


                        <div class="pull-right">
                          <a href="{{route('edit-aboutus',$aboutus->id)}}" class="btn btn-success">edit</a>

                        </div>
                   
                        @endforeach 
                
          
          </div>
        </div>
      </div>
    </div>
  </div>
    

@endsection