@extends('layouts.cmslayout')
@section('title')
View OffRoadItinerary
    
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/mr2osvcpmkdy2ki6yhtrr24x3tkxu6113jaz4p1uewp3adzs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#itinerary_description'
  });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadItinerary')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="itinerary_image" class="col-form-label">Gallery:</label>
                <input type="file" class="form-control" id="itinerary_image" name="itinerary_image">
              </div>
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


  {{-- for spanish modal --}}
  <div class="modal fade" id="spanishModal" tabindex="-1" role="dialog" aria-labelledby="spanishModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="spanishModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadItinerary')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="es_tour_title" class="col-form-label">Choose the Itinerary :</label>
              <select id="cars" name="itinerary">
                @foreach ($itinerary as $itineraryadd)
                <option value="{{$itineraryadd->itinerary_title}}">{{$itineraryadd->itinerary_title}}</option>
                @endforeach
                
               
              </select>
            </div>
            <div class="form-group">
              <label for="tour_image" class="col-form-label">{{__('Image of Room')}}:</label>
              <input type="file" class="form-control" id="tour_image" name="tour_image">
            </div>
          
              <input type="hidden" name="tour_id" value="{{$offroaditineraryId}}">
              <div class="form-group">
                <label for="es_itinerary_description" class="col-form-label">Brief  Description about the day:</label>
                <textarea type="text" class="form-control" id="es_itinerary_description" name="es_itinerary_description"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Room Gallery 
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
            <!--<button type="button" class="btn btn-primary float-right btn-sm"  data-toggle="modal" data-target="#spanishModal">Add in Spanish</button>-->

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @foreach ($itinerary as $key=>$itinerary)
        <div class="card-body">
            <td>
              <img src="../../uploads/offroaditinerary/ {{$itinerary->itinerary_image}}" alt="" srcset="" height="70px"> 
           </td> 
            </b>
          <table>
            <tr>
              <td class="text-right">
                <a href="/edit-offroadItinerary/{{$itinerary->id}}/{{$offroaditineraryId}}" class="btn btn-success">Edit</a>
            </td>
                <td class="pull-right">
                    <form action="/delete-offroaditinerary/{{$itinerary->id}}" method="post" class="form-horizontal">
                        @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                   
               </td>
            </tr>
          </table>
        
        </div>
        <br/>  
        @endforeach
        
      </div>
    </div>
  </div>
    

@endsection