@extends('layouts.cmslayout')
@section('title')
Edit Facility 
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Facility</h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('update-facility',$facility->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="title" class="col-form-label">{{__('title')}}:</label>
                      <input type="text" class="form-control" id="title" name="title" value="{!! $facility->title !!} ">
                      
                      </div>
                     
                      <div class="form-group">
                          <label for="desription" class="col-form-label"> {{__('desription')}}:</label>
                            <textarea type="text" class="form-control" id="description" name=" description">  {!! $facility->description !!}</textarea>
                      </div>

                      <div class="form-group justify-content-center" style="">
                        <label for="image" class="col-form-label">Image:</label>
                       
                        <img src="../../uploads/facility/{{ $facility->image }}" alt="" srcset="" height="70px"> 
                       
                        <input type="hidden" name="edit_facilityimage" value="{{$facility->image}}">
                        <input type="file" class="form-control" id="image" name="image">
                  </div>
                 
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                    <!--<a href="" class="btn btn-danger">Cancel</a>-->

                </form>

            </div>
        </div>
    </div>
</div>
    <script>
  $('#rental_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script>
@endsection
@section('scripts')
    
@endsection
