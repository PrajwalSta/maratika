@extends('layouts.master')
@section('title')
PrincipalMessage-Edit
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Principal Message</h1>
            </div>
            <div class="card-body">
              
            <form action="/principalMessage-Update/{{ $PrincipalMessage->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$PrincipalMessage->description_title}}">
                      </div>
                      <div class="form-group justify-content-center" style="">
                        <label for="principal_image" class="col-form-label">Principal Image:</label>
                        <br/>
                        <img src="../../uploads/Principal/{{ $PrincipalMessage->principal_image }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_principal_image" value="{{$PrincipalMessage->principal_image}}">
                        <input type="file" class="form-control" id="principal_image" name="principal_image">
                      </div>
                      <div class="form-group">
                        <label for="description" class="col-form-label">Desctiptiono:</label>
                        <textarea class="form-control" id="description" name="description">{{$PrincipalMessage->description}}
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