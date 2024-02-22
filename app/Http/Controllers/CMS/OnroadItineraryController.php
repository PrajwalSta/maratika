<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OnroadItinerary;
use App\Model\onroadTour;

class OnroadItineraryController extends Controller
{
    public function index($id)
    {
        $itinerary= onroadTour::find($id)->myitinarary;
        $onroaditineraryId=$id;
         return view('cms/onroad.view-itinerary',compact('itinerary','onroaditineraryId'));
    }
    public function store(Request $request)
    {
     if($request->input('itinerary')){
           
    $onroaditinerary=OnroadItinerary::where('itinerary_title',$request->input('itinerary'))->first();
   $onroaditinerary->es_itinerary_title=$request->input('es_itinerary_title');
   $onroaditinerary->es_itinerary_description=$request->input('es_itinerary_description');
    $onroaditinerary->update();
}else{
   $onroaditinerary=new OnroadItinerary();
   $onroaditinerary->itinerary_title=$request->input('itinerary_title');
   $onroaditinerary->itinerary_description=$request->input('itinerary_description');
   $onroaditinerary->onroadtour_id=$request->input('tour_id');

   if ($request->hasfile('itinerary_image')) { 
       $file=$request->file('itinerary_image');
       $extension=$file->getClientOriginalName();;
       $filename=time().'.'.$extension;
       $file->move('uploads/onroaditinerary/',$filename);
       $onroaditinerary->itinerary_image=$filename;
   }else{
   //    return $request;
       $onroaditinerary->itinerary_image='';
   }
   $onroaditinerary->save();
}
        return back()->with('status','One Itinerary Item Added');
    }
    public function edit($id,$tourid)
    {
        $itinerary=OnroadItinerary::findorFail($id);
         $ontourid=$tourid;
        return view('cms/onroad.edit-itinerary',compact('itinerary','ontourid'));
    }
    public function update(Request $request, $id,$tourid)
    {
        if($request->input('eslang')){
  $onroaditinerary=OnroadItinerary::find($id);
      $onroaditinerary->onroadtour_id=$tourid;

  $onroaditinerary->es_itinerary_title=$request->input('itinerary_title');
  $onroaditinerary->es_itinerary_description=$request->input('itinerary_description');
  $onroaditinerary->update();
}elseif($request->input('germanlang')){
  $onroaditinerary=OnroadItinerary::find($id);
      $onroaditinerary->onroadtour_id=$tourid;

  $onroaditinerary->ger_itinerary_title=$request->input('itinerary_title');
  $onroaditinerary->ger_itinerary_description=$request->input('itinerary_description');
  $onroaditinerary->update();
}elseif($request->input('frenchlang')){
  $onroaditinerary=OnroadItinerary::find($id);
      $onroaditinerary->onroadtour_id=$tourid;

  $onroaditinerary->fr_itinerary_title=$request->input('itinerary_title');
  $onroaditinerary->fr_itinerary_description=$request->input('itinerary_description');
  $onroaditinerary->update();
}
         else{
    $onroaditinerary=OnroadItinerary::find($id);
    $onroaditinerary->onroadtour_id=$tourid;
    

    $onroaditinerary->itinerary_title=$request->input('itinerary_title');
    $onroaditinerary->itinerary_description=$request->input('itinerary_description');
    $onroaditinerary_edited_img=$request->edit_itineraryimage;
    
  
    if ($request->hasfile('itinerary_image')) { 
       
        $file=$request->file('itinerary_image');
        $extension=$file->getClientOriginalName();;
        $filename=time().'.'.$extension;
        $file->move('uploads/onroaditinerary/',$filename);
        $onroaditinerary->itinerary_image=$filename;
        
    }else{
       
        $onroaditinerary->itinerary_image= $onroaditinerary_edited_img;
    }
    $onroaditinerary->update();
}

      
        return redirect()->route('onroadItinerary',$tourid)->with('status','One Itinerary Item Updated');
   
    }
    public function destroy($id)
    {
        $onroaditinerary=OnroadItinerary::findorFail($id);
        $onroaditinerary->delete();
        return back()->with('status','One Itinerary  Item is Deleted');
    }
}
