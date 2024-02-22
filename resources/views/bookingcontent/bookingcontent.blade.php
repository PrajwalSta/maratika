@extends('layouts.cmslayout')
@section('title')
Start  Booking
    
@endsection

@section('content')

   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('store-bookingsection')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="booking_content" class="col-form-label">{{__('Start Booking Contents')}}:</label>
              <input type="text" class="form-control" id="booking_content" name="booking_content">
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
          <h4 class="card-title">Start Booking Contents
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
                  Booking Content
                </th>
                <th class="text-right">
                  Actions
                  </th>
              </thead>
              <tbody>
                @foreach ($bookingcontent as $bookingcontent)
                <tr>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $bookingcontent->booking_es_content }}  
                      @break
  
                      @case('de')
                      {{ $bookingcontent->booking_ger_content }}  
                      @break
                      @case('fr')
                      {{ $bookingcontent->booking_fr_content }}
                      @break 
                      @default
                      {{  $bookingcontent->booking_content }}
                  @endswitch
                    </td>
                 
                
                    
                        <td class="text-right d-flex flex-end">
                                                    <a href="{{route('edit-bookingsection',$bookingcontent->id)}}" class="btn btn-success">edit</a>

                            <form action="{{route('delete-bookingsection',$bookingcontent->id)}}" method="post" class="form-horizontal">
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
       
  $('#whyus_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });

  </script>
    

@endsection