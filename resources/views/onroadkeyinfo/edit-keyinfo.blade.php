@extends('layouts.cmslayout')
@section('title')
Edit itinerary
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit OnroadKey Info</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-Onroadkeyinfo/{{ $keyinfo->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     @if (app()->getLocale()==="es")
                      <input type="hidden" name="lang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                    <div class="form-group">
                      <label for="key_info" class="col-form-label">Key Information:</label>
                     
                      <input type="text" class="form-control" id="key_info" name="key_info" value=" @switch(app()->getLocale())
                      @case('es')
                      {{$keyinfo->es_key_info}} 
                      @break
  
                      @case('de')
                      {{$keyinfo->ger_key_info}}  
                      @break
                      @case('fr')
                      {{$keyinfo->fr_key_info}}
                      @break 
                      @default
                      {{$keyinfo->key_info}}
                  @endswitch">

                        
                    </div>
                  
                    <div class="form-group">
                        <label for="key_info_value" class="col-form-label">Key Info. Value:</label>
                       
                        <input type="string" class="form-control" id="key_info_value" name="key_info_value" value=" @switch(app()->getLocale())
                      @case('es')
                      {{$keyinfo->es_key_info_value}} 
                      @break
  
                      @case('de')
                      {{$keyinfo->ger_key_info_value}}  
                      @break
                      @case('fr')
                      {{$keyinfo->fr_key_info_value}}
                      @break 
                      @default
                      {{$keyinfo->key_info_value}}
                  @endswitch">
 
                    </div>
                
                    @if (app()->getLocale()==="en")
                    <div class="form-group">
                      <label for="icon" class="col-form-label">Icon Name:</label><br/>
                      <select name="icon" id="icon" class="w-100 p-3">
                        <option value="fa-map-o">Key Information Icon</option>
                        <option value="fa-map" >Distance</option>
                        <option value="fa-map-marker" <?php echo (strcmp($keyinfo->icon,'Distance')?"selected=selected":'') ?>>Location</option>
                        <option value="fa-motorcycle">Bike</option>
                        <option value="fa-calendar-plus-o">Riding Days</option>
                        <option value="fa-calendar-check-o">Durations</option>
                        <option value="fa-road">Riding</option>
                        <option value="fa-exclamation-triangle">Difficulty</option>
                        <option value="fa-superpowers">Fitness Level</option>
                        <option value="fa-usd">Price</option>
                        <option value="fa-usd">Pillion</option>
                        <option value="fa-truck">Travel In Support Vehicle</option>
                        <option value="fa-money">Deposit</option>
                        <option value="fa-users">Capacity of persons</option>
                       
                    
                      </select>
                  </div>
                  @endif
                  <input type="hidden" name="tour_id" value="{{$keyinfo->tour_id}}">
                 
                    
                    
                </div>
                 
                    <button type="submit" class="btn btn-success ml-3">Update</button>
                    {{-- <a href="" class="btn btn-danger">Cancel</a> --}}

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection