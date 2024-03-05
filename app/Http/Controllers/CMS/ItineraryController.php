<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Itinerary;
use App\Model\offroadTour;

class ItineraryController extends Controller
{
    public function index($id)
    {
        
        $itinerary= offroadTour::find($id)->myitinarary;
        $offroaditineraryId=$id;
        
         return view('cms/offroad.view-itinerary',compact('itinerary','offroaditineraryId'));
    }
    public function store(Request $request)
    {
         if($request->input('itinerary')){
           
             $offroaditinerary=Itinerary::where('itinerary_title',$request->input('itinerary'))->first();
            $offroaditinerary->es_itinerary_title=$request->input('es_itinerary_title');
          
             $offroaditinerary->update();
        }else{
            $offroaditinerary=new Itinerary();
            $offroaditinerary->itinerary_title=$request->input('itinerary_title');
           
            $offroaditinerary->tour_id=$request->input('tour_id');
    
            if ($request->hasfile('itinerary_image')) { 
                $file=$request->file('itinerary_image');
                $extension=$file->getClientOriginalName();;
                $filename=time().'.'.$extension;
                $file->move('uploads/offroaditinerary/',$filename);
                $offroaditinerary->itinerary_image=$filename;
            }else{
            //    return $request;
                $offroaditinerary->itinerary_image='';
            }
            $offroaditinerary->save();
            

        }
         return back()->with('status','One Itinerary Item Added');
    }
    public function edit($id,$tourid)
    {
      
      
        $itinerary=Itinerary::findorFail($id);
        $offtourid=$tourid;
        return view('cms/offroad.edit-itinerary',compact('itinerary','offtourid'));
    }
    public function update(Request $request, $id,$tourid)
    {
        
        if($request->input('eslang')){
                $offroaditinerary=Itinerary::find($id);
                                $offroaditinerary->tour_id=$tourid;

                $offroaditinerary->es_itinerary_title=$request->input('itinerary_title');
              
                $offroaditinerary->update();
            }elseif($request->input('germanlang')){
                $offroaditinerary=Itinerary::find($id);
                                $offroaditinerary->tour_id=$tourid;

                $offroaditinerary->ger_itinerary_title=$request->input('itinerary_title');
               
                $offroaditinerary->update();
            }elseif($request->input('frenchlang')){
                $offroaditinerary=Itinerary::find($id);
                                $offroaditinerary->tour_id=$tourid;

                $offroaditinerary->fr_itinerary_title=$request->input('itinerary_title');
               
                $offroaditinerary->update();
            }else{
                $offroaditinerary=Itinerary::find($id);
                $offroaditinerary->tour_id=$tourid;
        
                $offroaditinerary->itinerary_title=$request->input('itinerary_title');
                
                $offroaditinerary_edited_img=$request->edit_itineraryimage;
                
              
                if ($request->hasfile('itinerary_image')) { 
                   
                    $file=$request->file('itinerary_image');
                    $extension=$file->getClientOriginalName();;
                    $filename=time().'.'.$extension;
                    $file->move('uploads/offroaditinerary/',$filename);
                    $offroaditinerary->itinerary_image=$filename;
                    
                }else{
                   
                    $offroaditinerary->itinerary_image= $offroaditinerary_edited_img;
                }
                $offroaditinerary->update();
            }
      
        return redirect()->route('offroaditinerary',$tourid)->with('status','One Itinerary Item Updated');
   
    }
    public function destroy($id)
    {
        $offroaditinerary=Itinerary::findorFail($id);
        $offroaditinerary->delete();
        return back()->with('status','One Itinerary  Item is Deleted');
    }

}
