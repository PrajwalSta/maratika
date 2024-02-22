@extends('layouts.cmslayout')
@section('title')
Cms activities
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add activities</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-cmsActivities" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="activities_title" class="col-form-label">Activities Title:</label>
              <input type="text" class="form-control" id="activities_title" name="activities_title">
            </div>
            <div class="form-group">
                <label for="activities_image" class="col-form-label">Activities Image:</label>
                <input type="file" class="form-control" id="activities_image" name="activities_image">
              </div>
            <div class="form-group">
              <label for="activities_description" class="col-form-label">Activities Description:</label>
              <textarea class="form-control" id="activities_description" name="activities_description"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- end of Modal fORM --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Activities 
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
          <div class="table-responsive">
            <table id="table" class="table">
              <thead class=" text-primary">
                <th>
                  Activities Title
                </th>
                <th>
                  Activities Description
                </th>
                <th>
                  Activities Image
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($activities as $activities)
                <tr>
                    <td>
                      {{ $activities->activities_title }}
                    </td>
                    <td>
                        {{ $activities->activities_description }}
                    </td>
                    <td>
                       <img src="../../uploads/activities/{{ $activities->activities_image }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td class="text-right">
                        <a href="/edit-cmsActivities/{{$activities->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-cmsActivities/{{$activities->id}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                           
                       </td>
                  </tr>
                @endforeach
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    

@endsection