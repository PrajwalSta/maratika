@extends('layouts.cmslayout')
@section('title')
Notices
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Notices</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-cmsnotice" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="notice_title" class="col-form-label">Notice Title:</label>
              <input type="text" class="form-control" id="notice_title"  required name="notice_title">
            </div>
            <div class="form-group">
                <label for="notice_image" class="col-form-label">Notice Image:</label>
                <input type="file" class="form-control" id="notice_image" name="notice_image">
              </div>
            <div class="form-group">
              <label for="notice_description" class="col-form-label">Notice Description:</label>
              <textarea class="form-control" id="notice_description" name="notice_description"  required></textarea>
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
          <h4 class="card-title">Notices
          @if(count($notices)<=0)
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
        @endif
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
                 Notice Title
                </th>
                <th>
                 Notice Description
                </th>
                <th>
                 Notice Image
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($notices as $notice)
                <tr>
                    <td>
                        @switch(app()->getLocale())
@case('es')
{!! $notice->notice_es_title !!}  
@break

@case('de')
{!! $notice->notice_ger_title !!}  
@break
@case('fr')
{!! $notice->notice_fr_title !!}
@break 
@default
{!! $notice->notice_title !!}
@endswitch
                    </td>
                    <td>
@switch(app()->getLocale())
@case('es')
{!! $notice->notice_es_description !!}  
@break

@case('de')
{!! $notice->notice_ger_description !!}  
@break
@case('fr')
{!! $notice->notice_fr_description !!}
@break 
@default
{!! $notice->notice_description !!}
@endswitch                    </td>
                    <td>
                       <img src="../../uploads/notices/{{ $notice->notice_image }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td class="text-right">
                        <a href="/edit-cmsnotice/{{$notice->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-cmsnotice/{{$notice->id}}" method="post" class="form-horizontal">
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
  $('#notice_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script> 
    

@endsection