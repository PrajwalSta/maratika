@extends('layouts.cmslayout')
@section('title')
Edit Why us
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Why US</h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('update-whyus',$whyus->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     @if (app()->getLocale()==="es")
                      <input type="hidden" name="lang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                    
                    <input type="hidden" name="whyusid" value="{{$whyus->id}}">  

                   
                    <div class="form-group">
                        <label for="whyus_title" class="col-form-label">{{__('Whyus_title')}}:</label>
                      <input type="text" class="form-control" id="whyus_title" name="whyus_title" value="
                       @switch(app()->getLocale())
                      @case('es')
                      {{ $whyus->whyus_es_title }}  
                      @break
  
                      @case('de')
                      {{ $whyus->whyus_ger_title }}  
                      @break
                      @case('fr')
                      {{ $whyus->whyus_fr_title }}
                      @break 
                      @default
                      {{  $whyus->whyus_title }}
                  @endswitch">
                      </div>
                    
                      <div class="form-group">
                        <label for="whyus_desription" class="col-form-label"> {{__('Whyus_desription')}}:</label>
                      <textarea type="text" class="form-control" id="whyus_description" name="whyus_description" value="
                      @switch(app()->getLocale())
                                              @case('es')
                                              {!! $whyus->whyus_es_description !!}  
                                              @break
                          
                                              @case('de')
                                              {!! $whyus->whyus_ger_description !!}  
                                              @break
                                              @case('fr')
                                              {!! $whyus->whyus_fr_description !!}
                                              @break 
                                              @default
                                              {{ $whyus->whyus_description }}
                                          @endswitch"> @switch(app()->getLocale())
                                              @case('es')
                                              {!! $whyus->whyus_es_description !!}  
                                              @break
                          
                                              @case('de')
                                              {!! $whyus->whyus_ger_description !!}  
                                              @break
                                              @case('fr')
                                              {!! $whyus->whyus_fr_description !!}
                                              @break 
                                              @default
                                              {{ $whyus->whyus_description }}
                                          @endswitch</textarea>
                      </div>
                      
                         @if (app()->getLocale()==="en")
                    <div class="form-group justify-content-center" style="">
                        <label for="whyus_image" class="col-form-label">WhyUs Image:</label>
                        <br/>
                        <img src="../../uploads/whyus/{{ $whyus->whyus_image }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_whyusimage" value="{{$whyus->whyus_image}}">
                        <input type="file" class="form-control" id="whyus_image" name="whyus_image">
                    </div>
                        @else
                            <p><small>Note: Image can only be changed in US Language which will be default for others.</small></p>
                        @endif
                      
                    
                       

                        
                 
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                    <!--<a href="" class="btn btn-danger">Cancel</a>-->

                </form>

            </div>
        </div>
    </div>
</div>
 <script>
       
   $('#whyus_description').summernote({
      
       tabsize: 2,
       height: 200
   });

  </script>
    
@endsection
@section('scripts')

    
@endsection
