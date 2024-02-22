@extends('layouts.cmslayout')
@section('title')
About-Edit
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Data for About Us</h1>
            </div>
            <div class="card-body">
              
            <form action="/aboutus-Update/{{ $aboutus->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$aboutus->title}}">
                      </div>
                      <div class="form-group">
                          <label for="sub-title" class="col-form-label">Sub-Title:</label>
                          <input type="text" class="form-control" id="sub-title" name="subtitle" value="{{$aboutus->subtitle}}">
                        </div>
                      <div class="form-group">
                        <label for="description" class="col-form-label">Desctiptiono:</label>
                        <textarea class="form-control" id="description" name="description">{{$aboutus->description}}
                        </textarea>
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/about-Us" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection