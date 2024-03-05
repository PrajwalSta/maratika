@extends('layouts.cmslayout')
@section('title')
Cms Room
    
@endsection
@section('content')

    <script>
  $('#description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 300
  });
</script> 

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Room')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-room" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Room{{__('Title')}}:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
           
            <div class="form-group">
              <label for="guest" class="col-form-label">{{__('No. Of people')}}:</label>
              <input type="number" class="form-control" id="guest" name="guest">
            </div>
          
             <div class="form-group">
              <label for="amount" class="col-form-label">{{__('Price')}}:</label>
              <input type="text" class="form-control" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="tour_image" class="col-form-label">{{__('Image of Room')}}:</label>
                <input type="file" class="form-control" id="tour_image" name="image">
              </div>
              <div class="form-group">
                <label for="tour_description" class="col-form-label">{{__('Room Description')}}:</label>
                <textarea type="text" class="form-control" id="tour_description" name="description"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">{{__('Save')}}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>

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
          <h4 class="card-title">Room Details
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">{{__('Add New')}}</button>
          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
          <div class="table-responsive">
            <table id="table" class="table">
              <thead class=" text-primary">
                <th>{{__('Title')}} </th>
               
                <th>{{__('No. of people')}}</th>
                 
                <th>{{__('Total Price')}}</th>
              
                <th> {{__('Room Image')}}</th>
           
                <th> {{__('Itinerary')}}<th class="text-right"></th>
                
                 <th class="text-right">{{__('Action')}}</th>
               
              </thead>
              <tbody>
                @foreach ($rooms as $room)
                <tr>
                 
                    <td style="font-weight: bold">
                          {!! $room->title !!}
                    </td>
                    
                    <td>
                      {{ $room->guest }}
                    </td>
                  
                    <td>
                     
                      {!! $room->amount !!}
                 
                    </td>
                    <td>
                       <img src="../../uploads/room/{{ $room->image }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td>
                      <a href="{{ route('roomitinerary',$room->id)}}" class="btn btn-warning">{{__('Gallery')}}</a>
                    </td>
                     <td>
                      <a href="{{ route('roomkeyInfo',$room->id)}}" class="btn btn-primary">{{__('Key Info.')}}</a>
                    </td>
                    <td class="text-right">
                        <a href="/edit-room/{{$room->id}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-room/{{$room->id}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                       </td>
                  </tr>
                  <tr class="w-100">
                    <td  colspan="7">
                      <span style="font-weight:bold">{{__('Description')}}:</span><br/>
                      {!! $room->description !!} 
                  </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    

@endsection