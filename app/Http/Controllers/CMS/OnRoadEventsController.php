<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\onroadTour;
use App\Model\OnroadEvent;

class OnRoadEventsController extends Controller
{
    public function index($id)
    {
       
        $events= onroadTour::find($id)->onroadcalendarevents;
        $onroadEventsId=$id;
       
        return view('onroadevents.view-events',compact('events','onroadEventsId'));
        
    }
    public function store(Request $request)
    {
        
        $events=new OnroadEvent;
        $events->title=$request->input('title');
        $events->color=$request->input('color');
        $events->event_links=$request->input('event_links');
         $events->tour_id=$request->input('onroadtour_id');
        $events->start_date=$request->input('startDate');
        $events->end_date=$request->input('endDate');

        $events->save();
        return back()->with('status','One  Item Added to onroadEvents');

    }
     public function edit($id,$tourid)
     {
      
        $event=OnroadEvent::findorFail($id);
         $tourid=$tourid;
       return view('onroadevents.editevents',compact('event','tourid'));
    }

  
    public function update(Request $request,$id,$tourid)
    {
        $event=OnroadEvent::find($id);
        $event->title=$request->input('title');
        $event->color=$request->input('color');
        $event->event_links=$request->input('event_links');

        $event->start_date=$request->input('startDate');
        $event->end_date=$request->input('endDate');
        $event->update();

        return redirect()->route('onroadEvents',$tourid)->with('status','Your Event is Updated');
    }
     public function MarkAsBooked(Request $request,$id,$tourid)
    {
        
        $event=OnroadEvent::find($id);
        $event->status=!($event->status);
       
        $event->update();

        return redirect()->route('onroadEvents',$tourid)->with('status','One Event Bookedfully');
    }

    public function destroy($id)
    {
       
        // $onroaditinerary=onroadTour::findorFail($id);
        $events= OnroadEvent::findorFail($id);
        
        $events->delete();
        return back()->with('status','One onroadTour Events is Deleted');
    }
}
