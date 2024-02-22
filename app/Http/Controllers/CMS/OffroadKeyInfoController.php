<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OffroadKeyInfo;
use App\Model\offroadTour;

class OffroadKeyInfoController extends Controller
{
    public function index($id)
    {
        
        $keyinfo= offroadTour::find($id)->offroadkeyinfo;
        $offroadKeyId=$id;
        // dd($keyinfo);
        return view('offroadkeyinfo.view-keyinfo',compact('keyinfo','offroadKeyId'));
        
    }
    public function store(Request $request)
    {
        
         if($request->input('keyinfo')){
            $keyinfo=OffroadKeyInfo::where('key_info',$request->input('keyinfo'))->first();
            
            $keyinfo->es_key_info=$request->input('es_key_info');
            $keyinfo->es_key_info_value=$request->input('es_key_info_value');
            $keyinfo->update();
        }else{
            $keyinfo=new OffroadKeyInfo;
            $keyinfo->key_info=$request->input('key_info');
            $keyinfo->key_info_value=$request->input('key_info_value');
            $keyinfo->icon=$request->input('icon');
            $keyinfo->tour_id=$request->input('tour_id');
    
            $keyinfo->save();
        }
        return back()->with('status','One  Item Added to OffRoadKeyInfo');

    }
   
    public function edit($id)
    {
        $keyinfo=OffroadKeyInfo::findorFail($id);
        return view('offroadkeyinfo.edit-keyinfo',compact('keyinfo'));
    }
    public function update(Request $request, $id)
    {
       if($request->input('lang')){
            $keyinfo=OffroadKeyInfo::find($id);
            $keyinfo->es_key_info=$request->input('key_info');
            $keyinfo->es_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $offroadKeyId=$request->input('tour_id');
            $keyinfo->update();
           
        }elseif($request->input('germanlang')){
            $keyinfo=OffroadKeyInfo::find($id);
            $keyinfo->ger_key_info=$request->input('key_info');
            $keyinfo->ger_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $offroadKeyId=$request->input('tour_id');
            $keyinfo->update();

        }elseif($request->input('frenchlang')){
            $keyinfo=OffroadKeyInfo::find($id);
            $keyinfo->fr_key_info=$request->input('key_info');
            $keyinfo->fr_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $offroadKeyId=$request->input('tour_id');
            $keyinfo->update();

        }
        else{
            $keyinfo=OffroadKeyInfo::find($id);
            $keyinfo->key_info=$request->input('key_info');
            $keyinfo->key_info_value=$request->input('key_info_value');
            $keyinfo->icon=$request->input('icon');
            $keyinfo->tour_id=$request->input('tour_id');
            $offroadKeyId=$request->input('tour_id');
            $keyinfo->update();
        }
        // return redirect()->route('offroaditinerary',$tourid)->with('status','One Itinerary Item Updated');
   
        return redirect()->route('offroadkeyInfo', $offroadKeyId)->with('status','One offroadkeyInfo Item Updated');
   
    }
    public function destroy($id)
    {
       
        // $keyinfo=offroadTour::findorFail($id);
        $keyinfo= OffroadKeyInfo::findorFail($id);
        
        $keyinfo->delete();
        return back()->with('status','One OffroadkeyInfo  is Deleted');
    }
}
