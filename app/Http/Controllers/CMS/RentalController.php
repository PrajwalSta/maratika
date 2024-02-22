<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Rental;
use function is_null;

class RentalController extends Controller
{
    public function index()
    {
        $rental=Rental::all();

        
        return view('cms/rental.rental',compact('rental'));
    }
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $rental=new rental();
        $rental->rental_title=$request->input('title');
        $rental->rental_subtitle=$request->input('subtitle');
        $rental->rental_backtitle=$request->input('backtitle');
        $rental->rental_description=$request->input('rental_description');
        $rental->direction=$request->input('direction');
        if ($request->hasfile('rental_image')) { 

           
            $file=$request->file('rental_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/rental/',$filename);
            $rental->rental_image=$filename;
            
        }else{
            // return $request;
            $rental->rental_image='';
        }
        $rental->save();
        return redirect(route('cmsrental'))->with('status','Rental Item  Added');

    }else{//update
        $rental=Rental::find($id);
        $rental->rental_title=$request->input('rental_title');

        $rental->rental_description=$request->input('rental_description');
        $rental->rental_subtitle=$request->input('subtitle');
        $rental->rental_backtitle=$request->input('backtitle');

        $rental_edited_img=$request->edit_rentalimage;
        if ($request->hasfile('rental_image')) { 
            $file=$request->file('rental_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/rental/',$filename);
            $rental->rental_image=$filename;
            
        }else{
            // return $request;
            $rental->rental_image=$rental_edited_img;
        }
        $rental->update();
        return redirect(route('cmsrental'))->with('status','Rental Item Updated');
    }
    }
    public function edit($id)
    {
        $rental=Rental::findorFail($id);
        return view('cms/rental.edit-rental',compact('rental'));
    }
   
    public function destroy($id)
    {
        $rental=Rental::findorFail($id);
        $rental->delete();
        return redirect('/cmsrental')->with('status','One rental item Deleted');
    }
}
