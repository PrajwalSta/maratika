@extends('layouts.master')
@section('title')
Edit Missions
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Missions</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updateMission/{{ $mission->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mission_title" class="col-form-label">Mission Title:</label>
                        <input type="text" class="form-control" id="mission_title" name="mission_title" value="{{$mission->description_title}}">
                      </div>
                      <div class="form-group justify-content-center" style="">
                          <label for="mission_image" class="col-form-label">Mission Image:</label>
                          <br/>
                          <img src="../../uploads/mission/{{ $mission->mission_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_mission_image" value="{{$mission->mission_image}}">
                          <input type="file" class="form-control" id="mission_image" name="mission_image">
                        </div>
                      <div class="form-group">
                        <label for="mission_description" class="col-form-label">Mission Desctiptiono:</label>
                        <textarea class="form-control" id="mission_description" name="mission_description">{{$mission->description}}
                        </textarea>
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/cms-missions" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection