@extends('layouts.cmslayout')
@section('title')
Edit Blog

@endsection
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit News</h1>
            </div>
            <div class="card-body">

            <form action="{{ route('cms-blogs-update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="blog_title" class="col-form-label">News Title:</label>
                        <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{$blog->blogs_title}}">
                      </div>
                      <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">News Image:</label>
                          <br/>
                          <img src="../../uploads/blog/{{ $blog->blog_image }}" alt="" srcset="" height="70px">
                          <br/><br/>
                          <input type="hidden" name="edit_blogimage" value="{{$blog->blog_image}}">
                          <input type="file" class="form-control" id="blog_image" name="blog_image">
                    </div>
                      <div class="form-group">
                        <label for="blog_description" class="col-form-label">News Desctiptiono:</label>
                        <textarea class="form-control" id="blog_description" name="blog_description">{{$blog->blogs_description}}
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="author_name" class="col-form-label">Author Name:</label>
                        <input type="text" class="form-control" id="author_name" name="author_name" value="{{$blog->author_name}}">
                      </div>

                  </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/cms-gallery" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
