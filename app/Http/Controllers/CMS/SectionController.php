<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BookingContent;


class SectionController extends Controller
{
    public function index()
    {
        $bookingcontent=BookingContent::all();
        return view('bookingcontent.bookingcontent',compact('bookingcontent'));
    }
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $bookingcontent=new BookingContent();
        $bookingcontent->booking_content=$request->input('booking_content');
        
        $bookingcontent->save();
        return redirect(route('bookingcontent-section'))->with('status','BookingContent  Added');

    }else{//update
        $bookingcontent=BookingContent::find($request->input('bookingcontentid'));

     if($request->input('eslang')){
        $bookingcontent->booking_es_content=$request->input('booking_content');
        }
        elseif($request->input('germanlang')){
        $bookingcontent->booking_ger_content=$request->input('booking_content');
        }
        elseif($request->input('frenchlang')){
        $bookingcontent->booking_fr_content=$request->input('booking_content');
        }else{
        $bookingcontent=BookingContent::find($id);
        $bookingcontent->booking_content=$request->input('booking_content');
        
        }
        $bookingcontent->update();

    return redirect(route('bookingcontent-section'))->with('status','BookingContent Updated');

    }
    }
    public function edit($id)
    {
        $bookingcontent=BookingContent::findorFail($id);
        return view('bookingcontent.edit-bookingcontent',compact('bookingcontent'));
    }
   
    public function destroy($id)
    {
        $bookingcontent=BookingContent::findorFail($id);
        $bookingcontent->delete();
        return redirect(route('bookingcontent-section'))->with('status','One bookingcontent Deleted');
    }
}
