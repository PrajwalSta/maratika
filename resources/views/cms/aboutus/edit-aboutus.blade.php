@extends('layouts.cmslayout')
@section('title')
Edit About Us
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit About Us </h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('update-aboutus',$aboutus->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     @if (app()->getLocale()==="es")
                      <input type="hidden" name="eslang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                   
                    <div class="form-group">
                        <label for="aboutus_title" class="col-form-label">{{__('AboutUs Title')}}:</label>
                      <input type="text" class="form-control" id="aboutus_title" name="aboutus_title" value="@switch(app()->getLocale())
                      @case('es')
    {!! $aboutus->aboutus_es_title !!}  
                      @break
                    
                      @case('de')
{!! $aboutus->aboutus_ger_title !!}  
                      @break
                      @case('fr')
{!! $aboutus->aboutus_fr_title !!}
                      @break 
                      @default
{{ $aboutus->aboutus_title }}
                    @endswitch">

                      </div>

                      <div class="form-group">
                        <label for="aboutus_image" class="col-form-label">Aboutus Image:</label>
                        <img src="../../uploads/aboutus/{{ $aboutus->aboutus_image }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_aboutusimage" value="{{$aboutus->aboutus_image}}">
                        <input type="file" class="form-control" id="aboutus_image" name="aboutus_image">
                      </div>
                      <div class="form-group">
                                <label for="aboutus_desription" class="col-form-label"> {{__('aboutus_desription')}}:</label>

                          <textarea type="text" class="form-control" id="aboutus_description" name="aboutus_description" value="
@switch(app()->getLocale())
                        @case('es')
                        {!! $aboutus->aboutus_es_description !!}  
                        @break
    
                        @case('de')
                        {!! $aboutus->aboutus_ger_description !!}  
                        @break
                        @case('fr')
                        {!! $aboutus->aboutus_fr_description !!}
                        @break 
                        @default
                        {{ $aboutus->aboutus_description }}
                    @endswitch"> @switch(app()->getLocale())
                        @case('es')
                        {!! $aboutus->aboutus_es_description !!}  
                        @break
    
                        @case('de')
                        {!! $aboutus->aboutus_ger_description !!}  
                        @break
                        @case('fr')
                        {!! $aboutus->aboutus_fr_description !!}
                        @break 
                        @default
                        {{ $aboutus->aboutus_description }}
                    @endswitch</textarea>
                     
                      </div>
                         @if (app()->getLocale()==="us")

                      <div class="form-group justify-content-center" style="">
                        <label for="aboutus_image" class="col-form-label">Aboutus Image:</label>
                        <br/>
                        <img src="../../uploads/aboutus/{{ $aboutus->aboutus_image }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_aboutusimage" value="{{$aboutus->aboutus_image}}">
                        <input type="file" class="form-control" id="aboutus_image" name="aboutus_image">
                  </div>
                  {{-- for aboutus featured image --}}
                  <div class="form-group justify-content-center" style="">
                    <label for="aboutus_image" class="col-form-label">Aboutus Featured Image:</label>
                    <br/>
                    <img src="../../uploads/aboutus/{{ $aboutus->aboutus_featured_image }}" alt="" srcset="" height="70px"> 
                    <br/><br/>
                    <input type="hidden" name="edit_featured_aboutusimage" value="{{$aboutus->aboutus_featured_image}}">
                    <input type="file" class="form-control" id="aboutus_featured_image" name="aboutus_featured_image">
              </div>
              @endif
                    
                       
                        
                 
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                    <!--<a href="" class="btn btn-danger">Cancel</a>-->

                </form>

            </div>
        </div>
    </div>
</div>
<script>
       
   $('#aboutus_description').summernote({
      
       tabsize: 2,
       height: 300
   });

  </script>
    
@endsection
@section('scripts')
    
@endsection
