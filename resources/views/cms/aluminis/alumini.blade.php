@extends('layouts.cmslayout')
@section('title')
Cms Alumini
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Alumini</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-cmsalumini" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="alumini_file" class="col-form-label">Alumini File:</label>
                <input type="file" class="form-control" id="alumini_file" name="alumini_file">
              </div>
            <div class="form-group">
              <label for="alumini_description" class="col-form-label">Description:</label>
              <textarea class="form-control" id="alumini_description" name="alumini_description"></textarea>
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
          <h4 class="card-title">Alumini
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
                Alumini Description
                </th>
                <th>
                 Alumini File
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($alumini as $alumini)
                <tr>
                   
                    <td>
                        {{ $alumini->alumini_description }}
                    </td>
                    <td>
                      {{ $alumini->alumini_file }}
                    </td>
                    <td class="text-right">
                        <a href="/edit-cmsalumini/{{$alumini->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-cmsalumini/{{$alumini->id}}" method="post" class="form-horizontal">
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