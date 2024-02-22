@extends('layouts.cmslayout')
@section('title')
Cms slider

@endsection
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add slider Image')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-slider" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="slider_name" class="col-form-label">{{__('Title')}}:</label>
              <input type="text" class="form-control" id="slider_name" name="slider_name">
            </div>
            <div class="form-group">
                <label for="sliderImage" class="col-form-label">{{__('Image')}}:</label>
                <input type="file" class="form-control" id="sliderImage" name="slider_image">
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
          <h4 class="card-title">{{__('Slider')}}
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">{{__('Add New')}}</button>

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
          <div class="table-responsive d-flex flex-wrap">

                @foreach ($slider as $sli)
                <div class="p-5 " style="width:30%;height:30%">
                       <img src="../../uploads/slider/{{ $sli->slider_image }}" alt="" srcset="">
                    {{-- <td class="text-right">
                        <a href="/edit-cmsslider/{{$sli->id}}" class="btn btn-success">Edit</a>
                    </td> --}}
                    <form action="/delete-slider/{{$sli->id}}" method="post" class="form-horizontal">
                        @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Remove</button>
                    </form>
                </div>
                @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
