<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\offroadTour;

class offroadTourController extends Controller
{
    public function index()
    {
        $offroad=offroadTour::all();
       // dd($offroad);
        return view('cms/offroad.offroad',compact('offroad'));
    }
    // spanish language
    public function SpanishLang(){
        $offroad=offroadTour::all();
        
        return view('cms/offroad.spanishlang',compact('offroad'));
    }
    public function store(Request $request)
    {
      
        if($request->input('eslang')){
           
            $offroadtour=offroadTour::where('title',$request->input('package'))->first();
            $offroadtour->es_title=$request->input('title');
            $offroadtour->es_sub_title=$request->input('subtitle');
           
            $offroadtour->es_location=$request->input('location');
             $offroadtour->es_amount=$request->input('amount');
            $offroadtour->es_tour_description=$request->input('stour_description');
            $offroadtour->update();
           

        }elseif($request->input('germanlang')){
            $offroadtour=offroadTour::where('title',$request->input('package'))->first();
            $offroadtour->ger_title=$request->input('ger_tour_title');
            $offroadtour->ger_sub_title=$request->input('ger_tour_subtitle');
           
            $offroadtour->ger_location=$request->input('ger_location');
             $offroadtour->ger_amount=$request->input('amount');
            $offroadtour->ger_tour_description=$request->input('spanish_tour_description');
            $offroadtour->update();

        }
        elseif($request->input('frenchlang')){
            $offroadtour=offroadTour::where('title',$request->input('package'))->first();
            $offroadtour->fr_title=$request->input('fr_tour_title');
            $offroadtour->fr_sub_title=$request->input('fr_tour_subtitle');
           
            $offroadtour->fr_location=$request->input('fr_location');
             $offroadtour->fr_amount=$request->input('amount');
            $offroadtour->fr_tour_description=$request->input('spanish_tour_description');
            $offroadtour->update();

        }
        else{
            $offroadtour=new offroadTour();
            $offroadtour->title=$request->input('tour_title');
            $offroadtour->sub_title=$request->input('tour_subtitle');
            $offroadtour->days=$request->input('tour_days');
            $offroadtour->location=$request->input('location');
             $offroadtour->amount=$request->input('amount');
            $offroadtour->tour_description=$request->input('tour_description');
    
           
    
            if ($request->hasfile('tour_image')) { 
                $file=$request->file('tour_image');
                $extension=$file->getClientOriginalName();;
                $filename=time().'.'.$extension;
                $file->move('uploads/offroadtour/',$filename);
                $offroadtour->tour_image=$filename;
            }else{
               return $request;
                $offroadtour->tour_image='';
            }
            $offroadtour->save();
        }
       
        return redirect('/offroadtour')->with('status','One project Item Added');
    }
    public function edit($id)
    {
        $offroad=offroadTour::findorFail($id);
        return view('cms/offroad.edit-offroad',compact('offroad'));
    }
    public function update(Request $request, $id)
    {
        if($request->input('eslang')){
            $offroadtour=offroadTour::find($id);
            $offroadtour->es_title=$request->input('tour_title');
            $offroadtour->es_sub_title=$request->input('tour_subtitle');
           
            $offroadtour->es_location=$request->input('location');
             $offroadtour->es_amount=$request->input('amount');
            $offroadtour->es_tour_description=$request->input('tour_description');
                       
            $offroadtour->update();
        }elseif($request->input('germanlang')){
            $offroadtour=offroadTour::find($id);
            $offroadtour->ger_title=$request->input('tour_title');
            $offroadtour->ger_sub_title=$request->input('tour_subtitle');
           
            $offroadtour->ger_location=$request->input('location');
             $offroadtour->ger_amount=$request->input('amount');
            $offroadtour->ger_tour_description=$request->input('tour_description');
                       
            $offroadtour->update();

        }elseif($request->input('frenchlang')){
            $offroadtour=offroadTour::find($id);
            $offroadtour->fr_title=$request->input('tour_title');
            $offroadtour->fr_sub_title=$request->input('tour_subtitle');
           
            $offroadtour->fr_location=$request->input('location');
             $offroadtour->fr_amount=$request->input('amount');
            $offroadtour->fr_tour_description=$request->input('tour_description');
                       
            $offroadtour->update();

        }
        else{

       
           
        $offroadtour=offroadTour::find($id);
        $offroadtour->title=$request->input('tour_title');
        $offroadtour->sub_title=$request->input('tour_subtitle');
        $offroadtour->days=$request->input('tour_days');
        $offroadtour->location=$request->input('location');
         $offroadtour->amount=$request->input('amount');
        $offroadtour->tour_description=$request->input('tour_description');
        $offroadtour_edited_img=$request->edit_tourimage;
        
      
        if ($request->hasfile('tour_image')) { 
           
            $file=$request->file('tour_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/offroadtour/',$filename);
            $offroadtour->tour_image=$filename;
            
        }else{
           
            $offroadtour->tour_image=$offroadtour_edited_img;
        }
        $offroadtour->update();
    }
        return redirect('/offroadtour')->with('status','One project Item Updated');
    }
    public function destroy($id)
    {
        $offroadtour=offroadTour::findorFail($id);
        $offroadtour->delete();
        return redirect('/offroadtour')->with('status','One project  Item is Deleted');
    }

}
