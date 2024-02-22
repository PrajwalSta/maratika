<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AboutUs;
use function is_null;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus=AboutUs::all();

        
        return view('cms/aboutus.aboutus',compact('aboutus'));
    }
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store

    }else{//update
        if($request->input('lang')){
          
            $aboutus=AboutUs::find($id);
            $aboutus->aboutus_es_title=$request->input('aboutus_title');
            $aboutus->aboutus_es_subtitle=$request->input('aboutus_subtitle');
           
            $aboutus->aboutus_es_description=$request->input('aboutus_description');
           
            $aboutus->update();
           

        }
        else{
        
        $aboutus=AboutUs::find($id);
        $aboutus->aboutus_title=$request->input('aboutus_title');
        $aboutus->aboutus_subtitle=$request->input('aboutus_subtitle');
       // $aboutus->aboutus_backtitle=$request->input('aboutus_backtitle');

        $aboutus->aboutus_description=$request->input('aboutus_description');
        $aboutus_edited_img=$request->edit_aboutusimage;
        if ($request->hasfile('aboutus_image')) { 
            $file=$request->file('aboutus_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/aboutus/',$filename);
            $aboutus->aboutus_image=$filename;
            
        }else{
            // return $request;
            $aboutus->aboutus_image=$aboutus_edited_img;
        }

        $aboutus_featurededited_img=$request->edit_featured_aboutusimage;
        if ($request->hasfile('aboutus_featured_image')) { 
            $file=$request->file('aboutus_featured_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/aboutus/',$filename);
            $aboutus->aboutus_image=$filename;
            
        }else{
            // return $request;
            $aboutus->aboutus_featured_image= $aboutus_featurededited_img;
        }
        $aboutus->update();
    }
    return redirect(route('aboutus'))->with('status','About Us Updated');

}
    }
    public function edit($id)
    {
        $aboutus=AboutUs::findorFail($id);
        return view('cms/aboutus.edit-aboutus',compact('aboutus'));
    }
   
    public function destroy($id)
    {
        $aboutus=AboutUs::findorFail($id);
        $aboutus->delete();
        return redirect('/aboutus')->with('status','One aboutus Deleted');
    }
}
