@extends('layouts.cmslayout')
@section('title')
Cms Gallery
    
@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('Add Gallery')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/save-cmsGallery" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title" class="col-form-label">{{__('Title')}}:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
              <label for="galleryImage" class="col-form-label">{{__('Image')}}:</label>
              <input type="file" class="form-control" id="galleryImage" name="galleryImage">
            </div>
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary">{{__('Save')}}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>

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
          <h4 class="card-title">{{__('Galleries')}}
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">{{__('Add New')}}</button>

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
                  {{__('Title')}}
                </th>
                <th>
                  {{__('Image')}}
                </th>
                <th class="text-right">
                   {{__('Delete')}}
                  </th>
              </thead>
              <tbody>
                @foreach ($gallery as $gal)
                <tr>
                    <td>
                      {{ $gal->galleryTitle }}
                    </td>
                    <td>
                       <img src="../../uploads/galleries/{{ $gal->gallery_image }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td class="text-right">
                        <a href="/edit-cmsGallery/{{$gal->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-cmsGallery/{{$gal->id}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
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