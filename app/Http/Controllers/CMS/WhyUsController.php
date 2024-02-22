<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Whyus;
use function is_null;



class WhyUsController extends Controller
{
    public function index()
    {
        $whyus=Whyus::all();

        
        return view('whyus.whyus',compact('whyus'));
    }
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $whyus=new Whyus();
        $whyus->whyus_title=$request->input('whyus_title');
        $whyus->whyus_description=$request->input('whyus_description');
        if ($request->hasfile('whyus_image')) { 

           
            $file=$request->file('whyus_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/whyus/',$filename);
            $whyus->whyus_image=$filename;
            
        }else{
            // return $request;
            $whyus->whyus_image='';
        }
        $whyus->save();
        return redirect(route('whyus'))->with('status','Why Us  Added');

    }else{//update
     if($request->input('lang')){
            $whyus=Whyus::find($request->input('whyusid'));
        $whyus->whyus_es_title=$request->input('whyus_title');
        $whyus->whyus_es_description=$request->input('whyus_description');
            $whyus->update();

        }elseif($request->input('germanlang')){
            $whyus=Whyus::find($request->input('whyusid'));
        $whyus->whyus_ger_title=$request->input('whyus_title');
        $whyus->whyus_ger_description=$request->input('whyus_description');
            $whyus->update();

        }
        elseif($request->input('frenchlang')){
           $whyus=Whyus::find($request->input('whyusid'));
        $whyus->whyus_fr_title=$request->input('whyus_title');
        $whyus->whyus_fr_description=$request->input('whyus_description');
            $whyus->update();

        }else{
        $whyus=Whyus::find($id);
        $whyus->whyus_title=$request->input('whyus_title');
        $whyus->whyus_description=$request->input('whyus_description');
        $whyus_edited_img=$request->edit_whyusimage;
        if ($request->hasfile('whyus_image')) { 
            $file=$request->file('whyus_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/whyus/',$filename);
            $whyus->whyus_image=$filename;
            
        }else{
            // return $request;
            $whyus->whyus_image=$whyus_edited_img;
        }
        $whyus->update();
        }
    return redirect(route('whyus'))->with('status','Why Us Updated');

    }
    }
    public function edit($id)
    {
        $whyus=Whyus::findorFail($id);
        return view('whyus.edit-whyus',compact('whyus'));
    }
   
    public function destroy($id)
    {
        $whyus=Whyus::findorFail($id);
        $whyus->delete();
        return redirect('/whyus')->with('status','One Whyus Deleted');
    }
}
