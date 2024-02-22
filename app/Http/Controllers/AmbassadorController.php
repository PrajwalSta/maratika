<?php

namespace App\Http\Controllers;

use App\Ambasadors;
use App\Form;
use App\Mail\mail\AmbasadorMail;
use App\Model\AmbasadorContent;
use App\Model\Ambassador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AmbassadorController extends Controller
{
    public function index(){
        $ambasadors=Ambassador::all();
        $ambasadorcontents=AmbasadorContent::all();
        $forms=Form::all();
        return view('frontend.ambasadrs',compact('ambasadors','ambasadorcontents','forms'));
    }
    // for Dashboard
    public function show(){
        $ambasadors=Ambassador::all();
        $ambasadorcontents=AmbasadorContent::all();
        $forms=Form::all();
        return view('cms.ambasadors.view-ambasadors',compact('ambasadors','ambasadorcontents','forms'));
    }
    public function storeorupdate(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $ambasador=new Ambassador();
        $ambasador->ambasador_title=$request->input('ambasador_title');
        $ambasador->ambasador_description=$request->input('ambasador_description');
        if ($request->hasfile('ambasador_image')) {


            $file=$request->file('ambasador_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/ambasador/',$filename);
            $ambasador->ambasador_image=$filename;

        }else{
            // return $request;
            $ambasador->ambasador_image='';
        }
        $ambasador->save();
        return redirect(route('cmsambasadors'))->with('status','Ambasador Added');

    }else{//update
        $ambasador=Ambassador::find($id);
        $ambasador->ambasador_title=$request->input('ambasador_title');
        $ambasador->ambasador_description=$request->input('ambasador_description');
        $ambasador_edited_img=$request->edit_ambasadorimage;
        if ($request->hasfile('ambasador_image')) {
            $file=$request->file('ambasador_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/ambasador/',$filename);
            $ambasador->ambasador_image=$filename;

        }else{
            // return $request;
            $ambasador->ambasador_image=$ambasador_edited_img;
        }
        $ambasador->update();
        return redirect(route('cmsambasadors'))->with('status','Ambasador Updated');
    }
    }
    public function edit($id)
    {
        $ambasador=Ambassador::findorFail($id);
        return view('ambasador.edit-ambasador',compact('ambasador'));
    }

    public function destroy($id)
    {
        $ambasador=Ambassador::findorFail($id);
        $ambasador->delete();
        return redirect(route('cmsambasadors'))->with('status','One ambassador Deleted');
    }
    // for Ambasador Contents
    public function storeorupdateContent(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $ambasador=new AmbasadorContent();
        $ambasador->ambasador_description=$request->input('content_description');
        $ambasador->direction=$request->input('direction');

        if ($request->hasfile('content_image')) {
            $file=$request->file('content_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/ambasador/',$filename);
            $ambasador->image=$filename;

        }else{
            // return $request;
            $ambasador->image='';
        }
        $ambasador->save();
        return redirect(route('cmsambasadors'))->with('status','Ambasador Content Added');

    }else{//update
        $ambasador=AmbasadorContent::find($id);
        $ambasador->ambasador_description=$request->input('content_description');
        $ambasador_edited_img=$request->edit_ambasadorimage;
        if ($request->hasfile('content_image')) {
            $file=$request->file('content_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/ambasador/',$filename);
            $ambasador->image=$filename;

        }else{
            // return $request;
            $ambasador->image=$ambasador_edited_img;
        }
        $ambasador->update();
        return redirect(route('cmsambasadors'))->with('status','Ambasador Content Updated');
    }
    }
    public function Contentdestroy($id)
    {
        $ambasadorcontent=AmbasadorContent::findorFail($id);
        $ambasadorcontent->delete();
        return redirect(route('cmsambasadors'))->with('status','One ambassador Deleted');
    }


    // For Forms

    public function storeorupdateForm(Request $request,$id = null)
    {
     if(is_null($id)){ //store
        $form=new Form();
        $form->form_name=$request->input('form_name');
        $form->form_type=$request->input('form_type');
        $form->save();
        return redirect(route('cmsambasadors'))->with('status','Form Data Added');

    }else{//update

        return redirect(route('cmsambasadors'))->with('status','Ambasador Updated');
    }
    }
    
     public function formdestroy($id)
    {
        $form=Form::findorFail($id);
        $form->delete();
        return redirect(route('cmsambasadors'))->with('status','One Form Data  Deleted');
    }

    // Send Message

    public function sendMessage(Request $request){

        $details=[];
        foreach($request->request as $key=>$value){
            $details[] = array($key => $value);
        }
        Mail::to('alex@offroadnepal.com')->send(new AmbasadorMail($details));

        return back()->with("ambassadormessage_sent","Thank You For Contacting Us. We will contact you as soon as possible");
    }

}
