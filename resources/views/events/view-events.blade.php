@extends('layouts.cmslayout')
@section('title')
OffroadEvents
    
@endsection

@section('header-link')
<meta charset='utf-8' />
<link href='../assets/lib/main.css' rel='stylesheet' />
<script src='../assets/lib/main.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

     html, body {
      overflow: hidden; /* don't do scrollbars */
      font-family: Arial;
      font-size: 14px;
    }
    
  
/*    */
  
  </style>
    
@endsection
@section('content')
<div class="col-12 mt-5">

  <h1>OffroadEvents Events For Calendar</h1>
  
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadEvents')}}">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Events Title:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="event_links" class="col-form-label">Event Link:</label>
              <input type="text" class="form-control" id="event_links" name="event_links">
            </div>
            <input type="hidden" name="offroadtour_id" value="{{$offroadEventsId}}">
            <div class="form-group">
                <label for="color" class="col-form-label">Color:</label>
                <input type="color" class="form-control" id="color" name="color">
              </div>
              <div class="form-group">
                <label for="startDate" class="col-form-label">Start Date:</label>
                <input type="datetime-local" class="form-control" id="startDate" name="startDate">
              </div>
              <div class="form-group">
                <label for="endDate" class="col-form-label">End Date:</label>
                <input type="datetime-local" class="form-control" id="endDate" name="endDate">
              </div>
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  
  {{-- end of Modal fORM --}}
  <div class="modal fade" id="takeaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="takeaction">Take Action to Events:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <a href="" class="btn btn-success float-left">Edit Events</a>
          <form action="/events-delete" method="post" class="form-horizontal">
            @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger"><a href="">Delete Events</a>
            </form>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

         
        </div>
    </form>
      </div>
    </div>
  </div>

  {{-- end of take action --}}
<div class="container-fluid">
    <div class="row pt-5 pl-0">
        <div class="col-sm-4">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          @endif
          <div class="col-12">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add Events</button>

          </div>  
             
              @foreach($events as $event)
              
              <div class="col-12 d-flex">
                 @if(!($event->status))
                  <a href="{{$event->event_links}}" data-toggle="modal" data-target="#editAction" class="mt-0 btn btn-secondary w-100" >
                    <span style="font-weight: bold;">{{ date('j',strtotime($event->start_date))}} ,&nbsp;&nbsp;{{ date('M',strtotime($event->start_date))}},&nbsp;&nbsp;{{ date('Y',strtotime($event->start_date))}}</span>
                    <br/>
                    {{ $event->title }}
                  </a>
                   @endif
                   @if(($event->status))

                <a href="{{$event->event_links}}" data-toggle="modal" data-target="#editAction" class="mt-0 btn btn-secondary w-100" >
                    <span style="font-weight: bold;color:red">{{ date('j',strtotime($event->start_date))}} ,&nbsp;&nbsp;{{ date('M',strtotime($event->start_date))}},&nbsp;&nbsp;{{ date('Y',strtotime($event->start_date))}}</span>
                    <br/>
                     <span style="font-weight: bold;color:red">{{ $event->title }} &nbsp;&nbsp;&nbsp;&nbsp; Booked</span>
                  </a>
                 @endif
                  
                
                    <a href="/edit-offroadEvents/{{$event->id}}/{{$offroadEventsId}}" class="btn mt-0"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
               
               
               
                
                 
            <form action="/delete-offroadEvents/{{ $event->id }}" method="post" class="form-horizontal">
              @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger mt-0 ">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
            </form>
              
                </div>
                
            
             
            @endforeach
            
           
           
        </div>
        <div class="col-sm-8">
            <div id='calendar'></div>
          </div>
        </div>

    </div>
</div>



@endsection
@section('scripts')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
       
        expandRows: true,
        slotMinTime: '08:00',
        slotMaxTime: '20:00',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'dayGridMonth',
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        selectable: true,
        nowIndicator: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
            @foreach($events as $event)
                {
                    title : '{{ $event->title }}',
                    start : '{{ $event->start_date }}',
                    @if ($event->end_date)
                            end: '{{ $event->end_date }}',
                    @endif
                    color: '{{ $event->color }}',
                   
                   
                },
                @endforeach
        ]
        
      });
  
      calendar.render();
    });
  
  </script>
    
@endsection

