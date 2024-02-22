<?php

namespace App\Http\Controllers;

use App\Contactus;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use function is_null;

class ContactUsController extends Controller
{
    public function show(){
        $contactdetails=Contactus::all();
        return view('cms.contactus.contact',compact('contactdetails'));
    }
    public function saveContactDetail(Request $request,$id=null){
     if(is_null($id)){
        $contactus= new Contactus();
        $contactus->title=$request->title;
        $contactus->details=$request->details;
        $contactus->save();
        return redirect(route('admin.showcontact'))->with('status','Details Added In Contact Page');
    }else{
        $contactus=Contactus::find($id);
        $contactus->title=$request->title;
        $contactus->details=$request->details;
        $contactus->update();
        return redirect(route('admin.showcontact'))->with('status','Details Updated In Contact Page');



    }
    }

    public function editContactDetail($id){
        $contactus=Contactus::findorFail($id);

        return View('cms.contactus.edit-contact',compact('contactus'));
    }
    public function deleteContactDetail($id){
        $contactus=Contactus::findorFail($id);
        $contactus->delete();
        return redirect(route('admin.showcontact'))->with('status','One Details In Contact Page');
    }

}

