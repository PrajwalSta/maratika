<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog=Blog::all();
        return view('cms/blog.blog',compact('blog'));
    }
    public function store(Request $request)
    {

        $blog=new Blog();
        $blog->blogs_title=$request->input('blog_title');
        $blog->blogs_description=$request->input('blog_description');
        $blog->author_name=$request->input('author_name');

        if ($request->hasfile('blog_image')) {
            $file=$request->file('blog_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/blog/',$filename);
            $blog->blog_image=$filename;
        }else{
           return $request;
            $blog->blog_image='';
        }
        $blog->save();
        return redirect('/cms-blogs')->with('status','One blog Item Added');
    }
    public function edit($id)
    {
        $blog=Blog::findorFail($id);
        return view('cms/blog.edit-blog',compact('blog'));
    }
    public function update(Request $request, $id)
    {
        $blog=Blog::find($id);
        $blog->blogs_title=$request->input('blog_title');
        $blog->blogs_description=$request->input('blog_description');
        $blog->author_name=$request->input('author_name');
        $blog_edited_img=$request->edit_blogimage;


        if ($request->hasfile('blog_image')) {

            $file=$request->file('blog_image');
            $extension=$file->getClientOriginalName();;
            $filename=time().'.'.$extension;
            $file->move('uploads/blog/',$filename);
            $blog->blog_image=$filename;

        }else{

            $blog->blog_image=$blog_edited_img;
        }
        $blog->update();
        return redirect('/cms-blogs')->with('status','One blog Item Updated');
    }
    public function destroy($id)
    {
        $blog=Blog::findorFail($id);
        $blog->delete();
        return redirect('/cms-blogs')->with('status','One blog  Item is Deleted');
    }
}


