@extends('layouts.master')
@section('title')
Edit Alumini
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Alumini</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updatealumini/{{ $alumini->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   
                      <div class="form-group justify-content-center" style="">
                          <label for="facilities_image" class="col-form-label">Alumini File:</label>
                          <br/>
                         {{ $alumini->alumini_file }} 
                          <br/><br/>
                          <input type="hidden" name="edit_aluminifile" value="{{$alumini->alumini_file}}">
                          <input type="file" class="form-control" id="alumini_file" name="alumini_file">
                        </div>
                      <div class="form-group">
                        <label for="alumini_description" class="col-form-label">Descriptions:</label>
                        <textarea class="form-control" id="alumini_description" name="alumini_description">{{$alumini->alumini_description}}
                        </textarea>
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/cms-alumini" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection