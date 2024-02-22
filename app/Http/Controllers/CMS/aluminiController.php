<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Aluminis;

class aluminiController extends Controller
{
    public function index()
    {
        $alumini=Aluminis::all();
        return view('cms/aluminis.alumini',compact('alumini'));
    }
    public function store(Request $request)
    {
        $alumini=new Aluminis();
        $alumini->alumini_description=$request->input('alumini_description');

        if ($request->hasfile('alumini_file')) { 
            $file=$request->file('alumini_file');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/alumini/',$filename);
            $alumini->alumini_file=$filename;
        }else{
           return $request;
            $alumini->alumini_file='';
        }
        $alumini->save();
        return redirect('/cms-alumini')->with('status','One alumini Item Added');
    }
    public function edit($id)
    {
        $alumini=Aluminis::findorFail($id);
       
        return view('cms/aluminis.edit-alumini',compact('alumini'));
    }
    public function update(Request $request, $id)
    {
        $alumini=Aluminis::find($id);
        $alumini->alumini_description=$request->input('alumini_description');
        $alumini_edited_file=$request->edit_alumini_file;
        
      
        if ($request->hasfile('alumini_file')) { 
           
            $file=$request->file('alumini_file');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/alumini/',$filename);
            $alumini->alumini_file=$filename;
            
        }else{
           
            $alumini->alumini_file=$alumini_edited_file;
        }
        $alumini->update();
        return redirect('/cms-alumini')->with('status','One alumini Item Updated');
    }
    public function destroy($id)
    {
        $alumini=Aluminis::findorFail($id);
        $alumini->delete();
        return redirect('/cms-alumini')->with('status','One alumini  Item is Deleted');
    }
}
