<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\cmsGallery;
use Illuminate\Support\Facades\Storage;
class cmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery=cmsGallery::all();
        return view('cms.gallery',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery=new cmsGallery();
        $gallery->galleryTitle=$request->input('title');
        if ($request->hasfile('galleryImage')) {
            $file=$request->file('galleryImage');
            $imagename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/galleries/',$imagename);
            $gallery->gallery_image=$imagename;
        }else{
           return $request;
            $gallery->gallery_image='';
        }
        $gallery->save();
        return redirect('/cms-gallery')->with('status','One Gallery Item Added');
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
        $gallery=cmsGallery::findorFail($id);
        return view('cms.edit-gallery',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery=cmsGallery::find($id);
        $gallery->galleryTitle=$request->input('title');
        $gal_edited_img=$request->edit_image;


        if ($request->hasfile('galleryImage')) {

            $file=$request->file('galleryImage');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/galleries/',$filename);
            $gallery->gallery_image=$filename;

        }else{

            $gallery->gallery_image=$gal_edited_img;
        }
        $gallery->update();
        return redirect('/cms-gallery')->with('status','One Gallery Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=cmsGallery::findorFail($id);
        $gallery->delete();
        return redirect('/cms-gallery')->with('status','One gallery  Item is Deleted');
    }
}
