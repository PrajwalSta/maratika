@extends('layouts.cmslayout')
@section('title')
Edit itinerary
    
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/mr2osvcpmkdy2ki6yhtrr24x3tkxu6113jaz4p1uewp3adzs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#itinerary_description'
  });
  </script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Itinerary</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-itinerary/{{ $itinerary->id}}/{{$offtourid}}" method="post" enctype="multipart/form-data">
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
                        <label for="itinerary_title" class="col-form-label">itinerary DayTitle:</label>
                         @if (app()->getLocale()!=="us")
                        <br/>{{$itinerary->itinerary_title}}
                        @endif
                         <input type="text" class="form-control" id="itinerary_title" name="itinerary_title" value="@switch(app()->getLocale())
                      @case('es')
{{$itinerary->es_itinerary_title}}
                      @break
                      @case('de')
{{$itinerary->ger_itinerary_title}}
                      @break
                      @case('fr')
{{$itinerary->fr_itinerary_title}}
                      @break 
                      @default
{{$itinerary->itinerary_title}}
                  @endswitch">
                        
    
                    </div>

                      <div class="form-group">
                        <label for="itinerary_description" class="col-form-label">Desctiption:</label>
                         @if (app()->getLocale()!=="us")
                       {!! $itinerary->itinerary_description !!}
                        @endif
                        
                        <textarea class="form-control" id="itinerary_description" name="itinerary_description">
                            @switch(app()->getLocale())
                            @case('es')
                              {{$itinerary->es_itinerary_description}}
                            @break
                            @case('de')
                              {{$itinerary->ger_itinerary_description}}
                            @break
                            @case('fr')
                             {{$itinerary->fr_itinerary_description}}
                          @break 
                            @default
                             {{$itinerary->itinerary_description}}
                              @endswitch
                          </textarea>
                       
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <!--<a href="" class="btn btn-danger">Cancel</a>-->

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection