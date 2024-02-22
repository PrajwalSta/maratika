<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professors;

class ProfessorController extends Controller
{
    public function index()
    {
        $profs=Professors::all();
        return view('professors.professors',compact('profs'));
    }
    public function store(Request $request)
    {
        $professor=new Professors();
        $professor->first_name=$request->input('Fname');
        $professor->last_name=$request->input('Lname');
        $professor->sex=$request->input('gender');
        $professor->mobile_num=$request->input('mob_num');
        $professor->temp_address=$request->input('temp_address');
        $professor->perma_address=$request->input('perma_address');
        $professor->dob=$request->input('dob');
        $professor->email=$request->input('email');
        $professor->joining_date=$request->input('joining_date');
        
        if ($request->hasfile('profile')) { 
          
        
            $file=$request->file('profile');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/professors/',$filename);
            $professor->image=$filename;
        }else{
           return $request;
            $professor->image='';
        }
        $professor->save();
        return redirect('/professors')->with('status','One Professor Added');


    }
    public function create()
    {
        
         return view('professors.addprofessor');
    }
    public function edit(Request $request,$id)
    {
        $professor=Professors::findorFail($id);
        return view('professors.professoredit',compact('professor'));
    }
    public function update(Request $request,$id)
    {
        $professor=Professors::find($id);
        $professor->first_name=$request->input('Fname');
        $professor->last_name=$request->input('Lname');
        $professor->sex=$request->input('gender');
        $professor->mobile_num=$request->input('mob_num');
        $professor->temp_address=$request->input('temp_address');
        $professor->perma_address=$request->input('perma_address');
        $professor->dob=$request->input('dob');
        $professor->email=$request->input('email');
        $professor->joining_date=$request->input('joining_date');
        $professor->update();
        return redirect('/professors')->with('status','Professor Info  is Updated');
    }
    public function delete($id)
    {
        $professor=Professors::findorFail($id);
        $professor->delete();
        return redirect('/professors')->with('status','One Professor  is Deleted');
    }
}
