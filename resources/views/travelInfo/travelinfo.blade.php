@extends('layouts.cmslayout')
@section('title')
Travel Inforamation
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('storetravelinfo')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="query" class="col-form-label">Query:</label>
              <input type="text" class="form-control" id="query" name="query">
            </div>
           
            <div class="form-group">
              <label for="information" class="col-form-label">Information:</label>
              <textarea class="form-control" id="information" name="information"></textarea>
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
          <h4 class="card-title">Information
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
                  Query
                </th>
                <th>
                  Information
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($travelInfo as $travelInfo)
                <tr>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                     {{ $travelInfo->es_query }}
                      @break
  
                      @case('de')
                      {{ $travelInfo->ger_query }} 
                      @break
                      @case('fr')
                      {{ $travelInfo->fr_query }}
                      @break 
                      @default
                      {{ $travelInfo->query }}
                  @endswitch
                    </td>
                    <td>
                    @switch(app()->getLocale())
                      @case('es')
                     {!! $travelInfo->es_information !!}
                      @break
  
                      @case('de')
                      {!! $travelInfo->ger_information !!} 
                      @break
                      @case('fr')
                      {!! $travelInfo->fr_information !!}
                      @break 
                      @default
                      {!! $travelInfo->information !!}
                  @endswitch    
                    </td>
                    
                    <td class="text-right">
                         <a href="{{ route('edittravelinfo',$travelInfo->id)}}" class="btn btn-success">Edit</a> 
                    </td>
                        <td class="text-right">
                             <form action="{{ route('deletetravelinfo',$travelInfo->id)}}" method="post" class="form-horizontal">
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
    <script>
       
   $('#information').summernote({
      
       tabsize: 2,
       height: 300
   });

  </script>

@endsection