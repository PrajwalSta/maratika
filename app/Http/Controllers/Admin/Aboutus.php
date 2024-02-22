<?php

namespace App\Http\Controllers\Admin;
use App\Models\Abouts;
use App\Model\PrincipalMessages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Aboutus extends Controller
{
    public function index()
{
    $aboutUs=Abouts::all();
    $principalMessage=PrincipalMessages::all();
    return view('admin.aboutus',compact('aboutUs','principalMessage'));
}
public function edit(Request $request,$id)
    {
        $aboutus=Abouts::findorFail($id);
        return view('admin.aboutUs-edit',compact('aboutus'));
    }
    public function updateAbout(Request $request,$id)
    {
        $aboutus=Abouts::find($id);
        $aboutus->title=$request->input('title');
        $aboutus->subtitle=$request->input('subtitle');
        $aboutus->description=$request->input('description');

        $aboutus->update();
        return redirect('/about-Us')->with('status','Your About Us is Updated');
    }

    // public function store(Request $request)
    // {
    //     $aboutus=new  Abouts;
    //     $aboutus->title=$request->input('title');
    //     $aboutus->subtitle=$request->input('subtitle');
    //     $aboutus->description=$request->input('description');
    //     $aboutus->save();
    //     return redirect('/about-Us')->with('status','Data Added to About Us');


    // }
    
    // public function DeleteAbout($id)
    // {
    //     $aboutus=Abouts::findorFail($id);
    //     $aboutus->delete();
    //     return redirect('/about-Us')->with('status','AboutUs one item is Deleted');
    // }
}
