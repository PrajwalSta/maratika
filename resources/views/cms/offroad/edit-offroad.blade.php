@extends('layouts.cmslayout')
@section('title')
Edit Room
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Room</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-offroadtour/{{ $offroad->id}}" method="post" enctype="multipart/form-data">
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
                        <label for="tour_title" class="col-form-label">Room Title:</label>
                        @if (app()->getLocale()!=="us")
                            <br/>{{$offroad->title}}
                        @endif
                             <input type="text" class="form-control" id="tour_title" name="tour_title" value="@switch(app()->getLocale())
                      @case('es')
{{$offroad->es_title}}
                      @break
                      @case('de')
{{$offroad->ger_title}}
                      @break
                      @case('fr')
{{$offroad->fr_title}}
                      @break 
                      @default
{{$offroad->title}}
                      @endswitch">
                       
                      </div>
                     
                      </div>
                      @if(app()->getLocale()==="en")
                      <div class="form-group">
                        <label for="tour_days" class="col-form-label">No people:</label>
                        <input type="text" class="form-control" id="tour_days" name="tour_days" value="{{$offroad->days}}">
                      </div>
                      @endif
                      
                       <div class="form-group">
                        <label for="amount" class="col-form-label">Price of the Room:</label>
                        @if (app()->getLocale()!=="en")
                           <br/> {{$offroad->amount}}
                        @endif
                        <input type="text" class="form-control" id="amount" name="amount" value="@switch(app()->getLocale())
                        @case('es')
{{$offroad->es_amount}}
                        @break
    
                        @case('de')
{{$offroad->ger_amount}}
                        @break
                        @case('fr')
{{$offroad->fr_amount}}
                        @break 
                        @default
{{$offroad->amount}}
                        @endswitch">
                      </div>
                      @if (app()->getLocale()==="en")
                      <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">Image of the Place:</label>
                          <br/>
                          <img src="../../uploads/offroadtour/{{ $offroad->tour_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_tourimage" value="{{$offroad->tour_image}}">
                          <input type="file" class="form-control" id="tour_image" name="tour_image">
                    </div>
                    @endif
                      <div class="form-group">
                        <label for="tour_description" class="col-form-label">Desctiptiono:</label>
                        
                        @if (app()->getLocale()!=="en")
                            <br/>{{$offroad->tour_description}}
                        @endif
                        <textarea type="text" class="form-control" id="tour_description" name="tour_description"> 
                        @switch(app()->getLocale())
                            @case('es')
                            {{$offroad->es_tour_description}}
                            @break
        
                            @case('de')
                            {{$offroad->ger_tour_description}}
                            @break
                            @case('fr')
                            {{$offroad->fr_tour_description}}
                            @break 
                            @default
                            {{$offroad->tour_description}}
                        @endswitch
                        </textarea>
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/offroadtour" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
     <script>
  $('#tour_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script> 
@endsection
@section('scripts')
    
@endsection