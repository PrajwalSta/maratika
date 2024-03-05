@extends('layouts.cmslayout')
@section('title')
View Room Gallery
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Room Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadItinerary')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="itinerary_image" class="col-form-label">Any Image Available(optional):</label>
                <input type="file" class="form-control" id="itinerary_image" name="itinerary_image">
              </div>
              <input type="hidden" name="tour_id" value="{{$offroaditineraryId}}">
             
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- end of Modal fORM --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">view Gallery
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
            <!--<button type="button" class="btn btn-primary float-right btn-sm"  data-toggle="modal" data-target="#spanishModal">Add in Spanish</button>-->

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        
        
 <div class="card-body">
  <div class="table-responsive d-flex flex-wrap">
  @foreach ($itinerary as $itinerary)
  <div class="p-5 " style="width:30%;height:30%">
    <img src="../../uploads/offroaditinerary/{{ $itinerary->itinerary_image }}" alt="" srcset=""> 

    <form action="/delete-offroaditinerary/{{$itinerary->id}}" method="post" class="form-horizontal">
      @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Remove</button>
      </form>
    </div>
  @endforeach
 </div>
        
 </div>  
      </div>
    </div>
  </div>
    

@endsection