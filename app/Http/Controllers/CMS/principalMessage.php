<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Model\PrincipalMessages;
use Illuminate\Http\Request;

class principalMessage extends Controller
{
 
public function edit(Request $request,$id)
{
    $PrincipalMessage=PrincipalMessages::findorFail($id);
    return view('cms/about-content.edit-principalMessage',compact('PrincipalMessage'));
}
public function update(Request $request,$id)
{
    $principal=PrincipalMessages::find($id);
    $principal->description_title=$request->input('title');
    $principal->description=$request->input('description');
    $principal_edited_img=$request->edit_principal_image;
   
    if ($request->hasfile('principal_image')) { 
       
           
        $file=$request->file('principal_image');
        $extension=$file->getClientOriginalName();;
        $filename=time().'.'.$extension;
        $file->move('uploads/Principal/',$filename);
        $principal->principal_image=$filename;
        
    }else{
       
        $principal->principal_image=$principal_edited_img;
    }

    $principal->update();
    return redirect('/about-Us')->with('status','Your Principal Message is Updated');
}
}
