@extends('layouts.cmslayout')
@section('title')
About Us
    
@endsection
@section('content')
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-aboutUs">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Title:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="sub-title" class="col-form-label">Sub-Title:</label>
                <input type="text" class="form-control" id="sub-title" name="subtitle">
              </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Desctiptiono:</label>
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div> --}}
  {{-- end of Modal fORM --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">About Us

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
          @foreach ($aboutUs as $about)
          <div class="row  pt-0 p-5">
            <b>{{ $about->title }}</b><br/>
            {{ $about->description }}
          </div>
          <div class="actions d-flex float-right pr-5">
            <a href="/about-Us/{{$about->id}}" class="btn btn-success">Edit</a>
        
          </div>
             
                @endforeach
          </div>
        </div>
        {{-- prinicpal Message --}}
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Principal Message
  
            </h4>
          </div>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
          @endif
          <div class="card-body">
            @foreach ($principalMessage as $principalMessage)
            <div class="row  pt-0 pb-0 p-5">
              <b>{{ $principalMessage->description_title }}</b><br/>

              {{ $principalMessage->description }}
              <img src="../../uploads/Principal/{{ $principalMessage->principal_image }}" alt="" srcset="" height="150px" class="float-right pl-5"> 


            </div>
            

           


            <div class="actions d-flex float-right pr-5">
              <a href="/edit-principalMessage/{{$principalMessage->id}}" class="btn btn-success">Edit</a>
          
            </div>
               
                  @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>
  
    
@endsection

@section('scripts')
{{-- <script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
    </script> --}}
    
@endsection