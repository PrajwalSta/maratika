<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Notices;


class noticeController extends Controller
{
    public function index()
    {
        $notices=Notices::all();
        return view('cms/notice.notice',compact('notices'));
    }
    public function store(Request $request)
    {
        $notices=new Notices();
        $notices->notice_title=$request->input('notice_title');
        $notices->notice_description=$request->input('notice_description');

        if ($request->hasfile('notice_image')) { 
            $file=$request->file('notice_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $resize_img = Image::make($file->getRealPath());              
            $resize_img->resize(300, 300,function($constraint){
                $constraint->aspectRatio();
            })->save('uploads/notices/'.$filename);
            $file->move('uploads/notices/',$filename);
            $notices->notice_image=$filename;
        }else{
            $notices->notice_image='';
        }
        $notices->save();
        return redirect('/notice')->with('status','One notices Item Added');
    }
    public function edit($id)
    {
        $notice=Notices::findorFail($id);
        return view('cms/notice.edit-notice',compact('notice'));
    }
    public function update(Request $request, $id)
    {
        if($request->input('eslang')){
             $notices=Notices::find($id);
        $notices->notice_es_title=$request->input('notice_title');
        $notices->notice_es_description=$request->input('notice_description');

        }elseif($request->input('germanlang')){
             $notices=Notices::find($id);
        $notices->notice_ger_title=$request->input('notice_title');
        $notices->notice_ger_description=$request->input('notice_description');

        }
        elseif($request->input('frenchlang')){
           $notices=Notices::find($id);
        $notices->notice_fr_title=$request->input('notice_title');
        $notices->notice_fr_description=$request->input('notice_description');

        }else{
        $notices=Notices::find($id);
        $notices->notice_title=$request->input('notice_title');
        $notices->notice_description=$request->input('notice_description');
        $notices_edited_img=$request->edit_notice_image;
        
      
        if ($request->hasfile('notice_image')) { 
           
            $file=$request->file('notice_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $resize_img = Image::make($file->getRealPath());              
            $resize_img->resize(300, 300,function($constraint){
                $constraint->aspectRatio();
            })->save('uploads/notices/'.$filename);
            $file->move('uploads/notices/',$filename);
            $notices->notice_image=$filename;
            
        }else{
           
            $notices->notice_image=$notices_edited_img;
        }
        $notices->update();
        return redirect('/notice')->with('status','One notices Item Updated');
    }
    $notices->update();
        return redirect('/notice')->with('status','One notices Item Updated');
    }
    public function destroy($id)
    {
        $notices=Notices::findorFail($id);
        $notices->delete();
        return redirect('/notice')->with('status','One notices  Item is Deleted');
    }
}


