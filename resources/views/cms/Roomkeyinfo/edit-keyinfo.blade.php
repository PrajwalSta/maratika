@extends('layouts.cmslayout')
@section('title')
Edit itinerary
    
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit RoomInfo</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-roomkeyinfo/{{ $keyinfo->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                      <label for="key_info" class="col-form-label">Key Information:</label>
                     
                      <input type="text" class="form-control" id="key_info" name="key_info" value="{{$keyinfo->key_info}}">

                        
                    </div>
                  
                    <div class="form-group">
                        <label for="key_info_value" class="col-form-label">Key Info. Value:</label>
                       
                        <input type="string" class="form-control" id="key_info_value" name="key_info_value" value="{{$keyinfo->key_info_value}}">
 
                    </div>
                   
                 
                   
                    <div class="form-group">
                      <label for="icon" class="col-form-label">Icon Name(You have to select the icon again when editing):</label><br/>
                      <select name="icon" id="icon" class="w-100 p-3">
                        <option value="fa-map-o">Key Information Icon</option>
                        <option value="fa-map">Bed</option>
                        <option value="fa-map-marker">Location</option>
                        <option value="fa-motorcycle">Washroom</option>
                        <option value="fa-solid fa-wifi">Internet</option>

                       
                    
                      </select>
                  </div>
                 
                 
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