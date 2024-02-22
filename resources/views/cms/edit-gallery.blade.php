@extends('layouts.cmslayout')
@section('title')
Edit Gallery
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Data of Gallery</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updateGallery/{{ $gallery->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="col-form-label">Gallery Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$gallery->galleryTitle}}">
                      </div>
                      <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">Gallery Image:</label>
                          <br/>
                          <img src="../../uploads/galleries/{{ $gallery->gallery_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_image" value="{{$gallery->gallery_image}}">
                          <input type="file" class="form-control" id="galleryImage" name="galleryImage">
                        </div>
                      <div class="form-group">
                        <label for="description" class="col-form-label">Desctiptiono:</label>
                        <textarea class="form-control" id="description" name="description">{{$gallery->description}}
                        </textarea>
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