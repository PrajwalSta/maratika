@extends('layouts.cmslayout')
@section('title')
Edit TravelInfo
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Travel Information</h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('updatetravelinfo',$travelinfo->id)}}" method="post" enctype="multipart/form-data">
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
                        <label for="query" class="col-form-label">{{__('Travel Query')}}:</label>
                         @if(app()->getLocale()!="us")
                    <br/>{{  $travelinfo->query }}

                        
                    @endif
                      <input type="text" class="form-control" id="" name="query" value="@switch(app()->getLocale())
                      @case('es')
{{ $travelinfo->es_query }}  
                      @break
  
                      @case('de')
{{ $travelinfo->ger_query }}  
                      @break
                      @case('fr')
{{ $travelinfo->fr_query }}
                      @break 
                      @default
{{  $travelinfo->query }}
                  @endswitch">
                      </div>
                    
                      <div class="form-group">
                        <label for="information" class="col-form-label"> {{__('Information')}}:</label>
                          @if(app()->getLocale()!="en")
                   <br/> {!!  $travelinfo->information !!}

                        
                    @endif
                      <textarea type="text" class="form-control" id="information" name="information">
                       @switch(app()->getLocale())
                      @case('es')
                      {{ $travelinfo->es_information }}  
                      @break
  
                      @case('de')
                      {{ $travelinfo->ger_information }}  
                      @break
                      @case('fr')
                      {{ $travelinfo->fr_information }}
                      @break 
                      @default
                      {{  $travelinfo->information }}
                  @endswitch
                  </textarea>
                      </div>
                      
         
                 
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                    <!--<a href="" class="btn btn-danger">Cancel</a>-->

                </form>

            </div>
        </div>
    </div>
</div>
 <script>
       
   $('#information').summernote({
      
       tabsize: 2,
       height: 300
   });

  </script>
    
@endsection
@section('scripts')

    
@endsection
