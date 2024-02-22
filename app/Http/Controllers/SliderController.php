<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    public function index()
    {
        $slider=Slider::all();
        //dd($slider);
        return view('cms.slider',compact('slider'));
    }

    public function store(Request $request)
    {

    if ($request->hasfile('slider_image'))
    {
        $file = $request->file('slider_image');
        $slider=new Slider();
        $slider->slider_name=$request->slider_name;
        $slider->slider_link=$request->slider_link;
        $extension = $file->getClientOriginalName();
        $filename=time().'.'.$extension;
        $imagename = time() . '.' .$file->getClientOriginalExtension();
        
        $file->move('uploads/slider/',$imagename);
        $slider->slider_image= $imagename;
        $slider->save();
    }
    else{
           return "ERROR WHILE uPLOADING, make sure the format are correct";

        }

        return redirect('/cms-slider')->with('status','One slider Item Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::findorFail($id);
        
        return view('cms.edit-slider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::findorFail($id);
        $slider->delete();
        return redirect('/cms-slider')->with('status','One slider  Item is Deleted');
    }
}
