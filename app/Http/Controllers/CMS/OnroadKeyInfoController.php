<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OnroadKeyInfo;
use App\Model\onroadTour;

class OnroadKeyInfoController extends Controller
{
    public function index($id)
    {
        
        $keyinfo= onroadTour::find($id)->onroadkeyinfo;
        $onroadKeyId=$id;
        // dd($keyinfo);
        return view('onroadkeyinfo.view-keyinfo',compact('keyinfo','onroadKeyId'));
        
    }
    public function store(Request $request)
    {
         if($request->input('keyinfo')){
            $keyinfo=OnroadKeyInfo::where('key_info',$request->input('keyinfo'))->first();
            
            $keyinfo->es_key_info=$request->input('es_key_info');
            $keyinfo->es_key_info_value=$request->input('es_key_info_value');
            $keyinfo->update();
        }else{
            $keyinfo=new OnroadKeyInfo();
            $keyinfo->key_info=$request->input('key_info');
            $keyinfo->key_info_value=$request->input('key_info_value');
            $keyinfo->icon=$request->input('icon');
            $keyinfo->tour_id=$request->input('tour_id');
    
            $keyinfo->save();
        }
        
        return back()->with('status','One  Item Added to onRoadKeyInfo');

    }
   
    public function edit($id)
    {
        $keyinfo=onroadKeyInfo::findorFail($id);
        return view('onroadkeyinfo.edit-keyinfo',compact('keyinfo'));
    }
    public function update(Request $request, $id)
    {
        if($request->input('lang')){
            $keyinfo=OnroadKeyInfo::find($id);
            $keyinfo->es_key_info=$request->input('key_info');
            $keyinfo->es_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $onroadKeyId=$request->input('tour_id');
            $keyinfo->update();
           
        }elseif($request->input('germanlang')){
            $keyinfo=OnroadKeyInfo::find($id);
            $keyinfo->ger_key_info=$request->input('key_info');
            $keyinfo->ger_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $onroadKeyId=$request->input('tour_id');
            $keyinfo->update();

        }elseif($request->input('frenchlang')){
            $keyinfo=OnroadKeyInfo::find($id);
            $keyinfo->fr_key_info=$request->input('key_info');
            $keyinfo->fr_key_info_value=$request->input('key_info_value');
            $keyinfo->tour_id=$request->input('tour_id');
            $onroadKeyId=$request->input('tour_id');
            $keyinfo->update();

        }
         else{
            $keyinfo=OnroadKeyInfo::find($id);
            $keyinfo->key_info=$request->input('key_info');
            $keyinfo->key_info_value=$request->input('key_info_value');
            $keyinfo->icon=$request->input('icon');
            $keyinfo->tour_id=$request->input('tour_id');
            $onroadKeyId=$request->input('tour_id');
            $keyinfo->update();
        }
        
        // $keyinfo=onroadKeyInfo::find($id);
        // $keyinfo->key_info=$request->input('key_info');
        // $keyinfo->key_info_value=$request->input('key_info_value');
        // $keyinfo->icon=$request->input('icon');
        // $keyinfo->tour_id=$request->input('tour_id');
        // $onroadKeyId=$request->input('tour_id');
        // $keyinfo->update();
        // return redirect()->route('onroaditinerary',$tourid)->with('status','One Itinerary Item Updated');
   
        return redirect()->route('onroadkeyInfo', $onroadKeyId)->with('status','One onroadkeyInfo Item Updated');
   
    }
    public function destroy($id)
    {
       
        // $keyinfo=onroadTour::findorFail($id);
        $keyinfo= onroadKeyInfo::findorFail($id);
        
        $keyinfo->delete();
        return back()->with('status','One onroadkeyInfo  is Deleted');
    }
}
