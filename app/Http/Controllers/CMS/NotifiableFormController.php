<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NotifiableForms;
class NotifiableFormController extends Controller
{
    public function index()
    {
        $notifiableForm=NotifiableForms::all();
        return view('cms/notifiableForm.notifiableForm',compact('notifiableForm'));
    }
    public function store(Request $request)
    {
        $notifiableForm=new NotifiableForms();
        $notifiableForm->notifiableForm_title=$request->input('notifiableForm_title');
        $notifiableForm->notifiableForm_description=$request->input('notifiableForm_description');

        if ($request->hasfile('notifiableForm_image')) { 
            $file=$request->file('notifiableForm_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/NotifiableForm/',$filename);
            $notifiableForm->notifiableForm_image=$filename;
        }else{
           return $request;
            $notifiableForm->notifiableForm_image='';
        }
        $notifiableForm->save();
        return redirect('/cms-notifiableForm')->with('status','One NotifiableForm Item Added');
    }
    public function edit($id)
    {
        $notifiableForm=NotifiableForms::findorFail($id);
        return view('cms/notifiableForm.edit-NotifiableForm',compact('notifiableForm'));
    }
    public function update(Request $request, $id)
    {
        $NotifiableForm=NotifiableForms::find($id);
        $NotifiableForm->notifiableForm_title=$request->input('notifiableForm_title');
        $NotifiableForm->notifiableForm_description=$request->input('notifiableForm_description');
        $NotifiableForm_edited_img=$request->edit_notifiableForm_image;
        
      
        if ($request->hasfile('notifiableForm_image')) { 
           
            $file=$request->file('notifiableForm_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/NotifiableForm/',$filename);
            $NotifiableForm->notifiableForm_image=$filename;
            
        }else{
           
            $NotifiableForm->notifiableForm_image=$NotifiableForm_edited_img;
        }
        $NotifiableForm->update();
        return redirect('/cms-notifiableForm')->with('status','One NotifiableForm Item Updated');
    }
    public function destroy($id)
    {
        $NotifiableForm=NotifiableForms::findorFail($id);
        $NotifiableForm->delete();
        return redirect('/cms-NotifiableForm')->with('status','One NotifiableForm  Item is Deleted');
    }
}
