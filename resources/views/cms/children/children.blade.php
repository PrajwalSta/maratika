@extends('layouts.cmslayout')
@section('title')
Cms Children List
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add children</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-cmschildren" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="child_name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" id="child_name" name="child_name">
            </div>
            <div class="form-group">
              <label for="child_age" class="col-form-label">Age:</label>
              <input type="number" class="form-control" id="child_age" name="child_age">
            </div>
            <div class="form-group">
              <label for="child_age" class="col-form-label">grade:</label>
              <input type="number" class="form-control" id="grade" name="grade">
            </div>
            <div class="form-group">
              <label for="children_image" class="col-form-label">Pp Photo:</label>
              <input type="file" class="form-control" id="children_image" name="children_image">
            </div>
            <div class="form-group">
              <label for="result_image" class="col-form-label">Result:</label>
              <input type="file" class="form-control" id="result_image" name="result_image">
            </div>
            <div class="form-group">
              <label for="child_age" class="col-form-label">Gender:</label><br/>
              <input type="radio" id="male" name="gender" value="male">
               <label for="female">Male</label><br>
              <input type="radio" id="female" name="gender" value="female">
              <label for="female">Female</label><br>
            
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
          <h4 class="card-title">Childrens
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
                  S.N
                 </th>
                <th>
                 Name
                </th>
                <th>
                Age
                </th>
                <th>
                  Gender
                </th>
                <th>
                  Grade
                </th>
                <th>
                 Children Pp Photo
                </th>
                <th>
                  Result
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($children as $index=> $children)
                <tr>
                  <td>
                    {{ $index+1 }}
                  </td>
                    <td>
                      {{ $children->name }}
                    </td>
                    <td>
                      {{ $children->age }}
                    </td>
                    <td>
                      {{ $children->gender }}
                    </td>
                    <td>
                      {{ $children->grade }}
                    </td>
                    <td>
                       <img src="../../uploads/children/{{ $children->photo }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td>
                      <img src="../../uploads/result/{{ $children->result }}" alt="" srcset="" height="70px"> 
                   </td>
                    <td class="text-right">
                        <a href="/edit-cmsChildren/{{$children->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-cmschildren/{{$children->id}}" method="post" class="form-horizontal">
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