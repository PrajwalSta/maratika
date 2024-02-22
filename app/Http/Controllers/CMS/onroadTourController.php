<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\onroadTour;

class onroadTourController extends Controller
{
    public function index()
    {
      
        $onroad=onroadTour::all();

        
        
        return view('cms/onroad.onroad',compact('onroad'));
    }
    public function store(Request $request)
    {
        $onroadtour=new onroadTour();
        $onroadtour->title=$request->input('tour_title');
        $onroadtour->sub_title=$request->input('tour_subtitle');
        $onroadtour->days=$request->input('tour_days');
        $onroadtour->location=$request->input('location');
         $onroadtour->amount=$request->input('amount');
        $onroadtour->tour_description=$request->input('tour_description');

        if ($request->hasfile('tour_image')) { 
            $file=$request->file('tour_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/onroadtour/',$filename);
            $onroadtour->tour_image=$filename;
        }else{
          
            $onroadtour->tour_image='';
        }
        $onroadtour->save();
        return redirect('/onroadtour')->with('status','One project Item Added');
    }
    public function edit($id)
    {
        $onroad=onroadTour::findorFail($id);
        return view('cms/onroad.edit-onroad',compact('onroad'));
    }
    public function update(Request $request, $id)

    {
        if($request->input('eslang')){
            $onroadtour=onroadTour::find($id);
            $onroadtour->es_title=$request->input('tour_title');
            $onroadtour->es_sub_title=$request->input('tour_subtitle');
           
            $onroadtour->es_location=$request->input('location');
             $onroadtour->es_amount=$request->input('amount');
            $onroadtour->es_tour_description=$request->input('tour_description');
                       
            $onroadtour->update();
        }elseif($request->input('germanlang')){
            $onroadtour=onroadTour::find($id);
            $onroadtour->ger_title=$request->input('tour_title');
            $onroadtour->ger_sub_title=$request->input('tour_subtitle');
           
            $onroadtour->ger_location=$request->input('tour_location');
             $onroadtour->ger_amount=$request->input('tour_amount');
            $onroadtour->ger_tour_description=$request->input('tour_description');
                       
            $onroadtour->update();

        }elseif($request->input('frenchlang')){
            $onroadtour=onroadTour::find($id);
            $onroadtour->fr_title=$request->input('tour_title');
            $onroadtour->fr_sub_title=$request->input('tour_subtitle');
           
            $onroadtour->fr_location=$request->input('tour_location');
             $onroadtour->fr_amount=$request->input('tour_amount');
            $onroadtour->fr_tour_description=$request->input('tour_description');
                       
            $onroadtour->update();

        }else{
        $onroadtour=onroadTour::find($id);
        $onroadtour->title=$request->input('tour_title');
        $onroadtour->sub_title=$request->input('tour_subtitle');
        $onroadtour->days=$request->input('tour_days');
        $onroadtour->location=$request->input('location');
         $onroadtour->amount=$request->input('tour_amount');
        $onroadtour->tour_description=$request->input('tour_description');
        $onroadtour_edited_img=$request->edit_tourimage;
        
      
        if ($request->hasfile('tour_image')) { 
           
            $file=$request->file('tour_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/onroadtour/',$filename);
            $onroadtour->tour_image=$filename;
            
        }else{
            // return $request;
            $onroadtour->tour_image=$onroadtour_edited_img;
        }
        $onroadtour->update();
        }
        return redirect('/onroadtour')->with('status','One project Item Updated');
    }
    
    public function destroy($id)
    {
        $onroadtour=onroadTour::findorFail($id);
        $onroadtour->delete();
        return redirect('/onroadtour')->with('status','One project  Item is Deleted');
    }

}
