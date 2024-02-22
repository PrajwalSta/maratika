@extends('layouts.master')
@section('title')
Edit Activity
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Activity</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updateActivities/{{ $activities->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="activities_title" class="col-form-label">Activities Title:</label>
                        <input type="text" class="form-control" id="activities_title" name="activities_title" value="{{$activities->activities_title}}">
                      </div>
                      <div class="form-group justify-content-center" style="">
                          <label for="galleryImage" class="col-form-label">Activities Image:</label>
                          <br/>
                          <img src="../../uploads/activities/{{ $activities->activities_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_activitiesimage" value="{{$activities->activities_image}}">
                          <input type="file" class="form-control" id="activities_image" name="activities_image">
                        </div>
                      <div class="form-group">
                        <label for="activities_description" class="col-form-label">Activities Desctiptiono:</label>
                        <textarea class="form-control" id="activities_description" name="activities_description">{{$activities->activities_description}}
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