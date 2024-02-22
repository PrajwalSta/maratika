@extends('layouts.cmslayout')
@section('title')
Events Edit
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Event</h1>
            </div>
            <div class="card-body">
                
                         <form action="/markbooked-offroadEvents/{{ $event->id}}/{{$offtourid}}" method="post">
                                   @csrf
                    @method('PUT')
                    @if($event->status)
                                    <button type="submit" class="btn btn-success">Open Booking</button>
                                    @else
                                    <button type="submit" class="btn btn-success">Mark As Booked</button>
                     @endif

                             </form>
 
            <form action="/update-offroadEvents/{{ $event->id}}/{{$offtourid}}" method="post">
                    @csrf
                    @method('PUT')
                    <form method="POST" action="/save-events">
                        @csrf

                        <div class="form-group">
                          <label for="title" class="col-form-label">Events Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $event->title}}">
                        </div>
                         <div class="form-group">
              <label for="event_links" class="col-form-label">Event Link:</label>
              <input type="text" class="form-control" id="event_links" name="event_links" value="{{$event->event_links}}">
            </div>
                        <div class="form-group">
                            <label for="color" class="col-form-label">Color:</label>
                        <input type="color" class="form-control" id="color" name="color" value="{{ $event->color}}">
                          </div>
                          <div class="form-group">
                            <label for="startDate" class="col-form-label">Start Date:</label>
                            <input type="input" class="form-control" id="startDate" name="startDate" value="{{ $event->start_date }}">
                          </div>
                          <div class="form-group">
                            <label for="endDate" class="col-form-label">End Date:</label>
                          <input type="input" class="form-control" id="endDate" name="endDate" value="{{ $event->end_date }}">
                          </div> 
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/events" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection