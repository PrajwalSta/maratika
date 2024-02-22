@extends('layouts.cmslayout')
@section('title')
Edit OnRoaditinerary
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Itinerary</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-onroaditinerary/{{ $itinerary->id}}/{{$ontourid}}" method="post" enctype="multipart/form-data">
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
                        <br/>
                        @if (app()->getLocale()!=="en")
                        {{$itinerary->itinerary_title}}
                        @endif
                        <input type="text" class="form-control" id="itinerary_title" name="itinerary_title" value='@switch(app()->getLocale())
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
                  @endswitch'>
                       

                    </div>

                      <div class="form-group">
                        <label for="itinerary_description" class="col-form-label">Desctiption:</label>
                        @if (app()->getLocale()!=="en")
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

<script>
  $('#itinerary_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script> 
    
@endsection
@section('scripts')
    
@endsection