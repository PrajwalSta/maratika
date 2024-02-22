@extends('layouts.cmslayout')
@section('title')
Edit onroadTour
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit onRoadTour</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-onroadtour/{{ $onroad->id}}" method="post" enctype="multipart/form-data">
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
                        <label for="tour_title" class="col-form-label">onRoadTour Title:</label>
                        <!-- the code is not aligned properly because it gives space to the user in input field-->
                        <input type="text" class="form-control" id="tour_title" name="tour_title" value="@switch(app()->getLocale())
                        @case('es')
{{$onroad->es_title}}
                          @break
                          @case('de')
{{$onroad->ger_title}}
                          @break
                          @case('fr')
{{$onroad->fr_title}}
                          @break 
                          @default
{{ $onroad->title }}
                      @endswitch">
                       
                      </div>
                      <div class="form-group">
                        <label for="tour_subtitle" class="col-form-label">onRoadtour subTitle:</label>
                      <input type="text" class="form-control" id="es_tour_subtitle" name="tour_subtitle" value="@switch(app()->getLocale())
                      @case('es')
{{$onroad->es_sub_title}}
                      @break
  
                      @case('de')
{{$onroad->ger_sub_title}}
                      @break
                      @case('fr')
{{$onroad->fr_sub_title}}
                      @break 
                      @default
{{$onroad->sub_title}}
                      @endswitch">
                      </div>
                      <div class="form-group">
                        <label for="tour_days" class="col-form-label">No. of Days:</label>
                        <input type="text" class="form-control" id="tour_days" name="tour_days" value="{{$onroad->days}}">
                      </div>
                      <div class="form-group">
                        <label for="location" class="col-form-label">Location:</label>
                        <input type="text" class="form-control" id="tour_location" name="location" value="@switch(app()->getLocale())
                            @case('es')
{{$onroad->es_location}}
                            @break
        
                            @case('de')
{{$onroad->ger_location}}
                            @break
                            @case('fr')
{{$onroad->fr_location}}
                            @break 
                            @default
{{$onroad->location}}
                        @endswitch">
                      </div>
                       <div class="form-group">
                        <label for="amount" class="col-form-label">Price of the Tour:</label>
                        <input type="text" class="form-control" id="tour_amount" name="tour_amount" value="@switch(app()->getLocale())
                            @case('es')
{{$onroad->es_amount}}
                            @break
        
                            @case('de')
{{$onroad->ger_amount}}
                            @break
                            @case('fr')
{{$onroad->fr_amount}}
                            @break 
                            @default
{{$onroad->amount}}
                        @endswitch">
                      </div>

                      <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">Image of the Place:</label>
                          <br/>
                          <img src="../../uploads/onroadtour/{{ $onroad->tour_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_tourimage" value="{{$onroad->tour_image}}">
                          <input type="file" class="form-control" id="tour_image" name="tour_image">
                    </div>
                    
                      <div class="form-group">
                        <label for="tour_description" class="col-form-label">Desctiptiono:</label>
                        <textarea type="text" class="form-control" id="tour_description" name="tour_description">
                        @switch(app()->getLocale())
                        @case('es')
                        {{$onroad->es_tour_description}}
                        @break
    
                        @case('de')
                       {{$onroad->ger_tour_description}}
                        @break
                        @case('fr')
                        {{$onroad->fr_tour_description}}
                        @break 
                        @default
                        {{$onroad->tour_description}}
                        @endswitch</textarea>
                        
                       
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/onroadtour" class="btn btn-danger">Cancel</a>

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