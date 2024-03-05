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
              
            <form action="/update-room/{{ $room->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                        <div class="form-group">
                           <label for="title" class="col-form-label">Room Title:</label>
                           <input type="text" class="form-control" id="title" name="title" value="{{$room->title}}">
                        </div>
                      <div class="form-group">
                          <label for="guest" class="col-form-label">No people:</label>
                          <input type="text" class="form-control" id="guest" name="guest" value="{{$room->guest}}">
                      </div>
                     
                       <div class="form-group">
                           <label for="amount" class="col-form-label">Price of the Room:</label>
                           <input type="text" class="form-control" id="amount" name="amount" value=" {{$offroad->amount}}">
                        </div>
                     
                       <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">Image of the Place:</label>
                          <img src="../../uploads/offroadtour/{{ $room->image }}" alt="" srcset="" height="70px"> 
                          <input type="hidden" name="edit_image" value="{{$room->image}}">
                          <input type="file" class="form-control" id="image" name="image">
                       </div>
                  
                      <div class="form-group">
                         <label for="tour_description" class="col-form-label">Desctiption:</label>
                          <textarea type="text" class="form-control" id="description" name="description"> {{$offroad->tour_description}} </textarea>
                      </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/offroadtour" class="btn btn-danger">Cancel</a>

                
                </form>
            </div>
        </div>
    </div>
</div>
     <script>
  $('#description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script> 
@endsection
@section('scripts')
    
@endsection