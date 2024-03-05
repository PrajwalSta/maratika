<?php

namespace App\Http\Controllers\CMS;

use App\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facility=Facility::all();
        return view('cms/facility.facility',compact('facility'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $facility=new Facility();
        $facility->title=$request->input('title');
       ;
        $facility->description=$request->input('description');
       
        if ($request->hasfile('image')) { 

           
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/facility/',$filename);
            $facility->image=$filename;
            
        }else{
            // return $request;
            $facility->image='';
        }
        $facility->save();
        return redirect(route('cmsfacility'))->with('status','facility Added');

    }else{//update
        $facility=Facility::find($id);
        $facility->title=$request->input('title');

        $facility->description=$request->input('description');
       

        $rental_edited_img=$request->edit_rentalimage;
        if ($request->hasfile('image')) { 
            $file=$request->file('image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/facility/',$filename);
            $facility->image=$filename;
            
        }else{
            // return $request;
            $facility->image=$facility_edited_img;
        }
        $facility->update();
        return redirect(route('cmsfacility'))->with('status','Facility Updated');
    }
    }
    public function edit($id)
    {
        $facility=Facility::findorFail($id);
        return view('cms/facility.edit-facility',compact('facility'));
    }
   
    public function destroy($id)
    {
        $facility=Facility::findorFail($id);
        $facility->delete();
        return redirect('/cmsfacility')->with('status','Facility Deleted');
    }
}