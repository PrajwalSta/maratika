@extends('layouts.cmslayout')
@section('title')
Edit Contact Details

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Contact Details</h1>
            </div>
            <div class="card-body">

            <form action="{{ route('updateContactDetail',$contactus->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="col-form-label">{{__('Title')}}:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$contactus->title }}">
                      </div>
                        <div class="form-group">
                          <label for="details" class="col-form-label">{{__('Details')}}:</label>
                          <textarea type="text" class="form-control" id="details" name="details" value="{{$contactus->details }}">{!! $contactus->details !!}</textarea>
                        </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/dashboard" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
