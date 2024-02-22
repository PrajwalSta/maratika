@extends('layouts.cmslayout')
@section('title')
Edit Children List
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Children</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updateChildren/{{ $children->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="child_name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="child_name" value="{{$children->name}}" required name="child_name">
                      </div>
                      <div class="form-group">
                        <label for="child_age" class="col-form-label">Age:</label>
                        <input type="number" class="form-control" id="child_age" value="{{$children->age}}" required name="child_age">
                      </div>
                      <div class="form-group">
                        <label for="child_grade" class="col-form-label">grade:</label>
                        <input type="number" class="form-control" id="grade" value="{{$children->grade}}" required name="child_grade">
                      </div>
                      <div class="form-group">
                        <label for="children_image" class="col-form-label">Pp Photo:</label>
                        <img src="../../uploads/children/{{ $children->photo }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_childrenimage" value="{{$children->photo}}">
                        <input type="file" class="form-control" id="children_image" name="children_image">
                    </div>
                      <div class="form-group">
                        <label for="result_image" class="col-form-label">Result:</label>
                        <img src="../../uploads/result/{{ $children->result }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_resultimage" value="{{$children->result}}">
                        <input type="file" class="form-control" id="result_image"  name="result_image">
                      </div>
                      <div class="form-group">
                        <label for="child_age" class="col-form-label">Gender:</label><br/>
                        <input type="radio" id="male"  name="gender" value="male">
                         <label for="female">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female" checked>
                        <label for="female">Female</label><br>
                      
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/cms-children" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection