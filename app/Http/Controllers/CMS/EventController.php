<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\offroadTour;

class EventController extends Controller
{
    public function index($id)
    {
        
        $events= offroadTour::find($id)->myevents;
        $offroadEventsId=$id;
        return view('events.view-events',compact('events','offroadEventsId'));
        
    }
    public function store(Request $request)
    {
        
        $events=new  Event;
        $events->title=$request->input('title');
        $events->color=$request->input('color');
        $events->event_links=$request->input('event_links');
         $events->tour_id=$request->input('offroadtour_id');
        $events->start_date=$request->input('startDate');
        $events->end_date=$request->input('endDate');

        $events->save();
        return back()->with('status','One  Item Added to OffroadEvents');

    }

    public function destroy($id)
    {
       
        // $offroaditinerary=offroadTour::findorFail($id);
        $events= Event::findorFail($id);
        
        $events->delete();
        return back()->with('status','One OffroadTour Events is Deleted');
    }
   
 
     public function edit($id,$tourid)
     {
        $event=Event::findorFail($id);
         $offtourid=$tourid;
       return view('events.editevents',compact('event','offtourid'));
    }

  
    public function update(Request $request,$id,$tourid)
    {
        $event=Event::find($id);
        $event->title=$request->input('title');
        $event->color=$request->input('color');
                $event->event_links=$request->input('event_links');

        $event->start_date=$request->input('startDate');
        $event->end_date=$request->input('endDate');
        $event->update();

        return redirect()->route('offroadEvents',$tourid)->with('status','Your Event is Updated');
    }
     public function MarkAsBooked(Request $request,$id,$tourid)
    {
        $event=Event::find($id);
        $event->status=!($event->status);
       
        $event->update();

        return redirect()->route('offroadEvents',$tourid)->with('status','One Event is Bookedfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}


