@extends('layouts.cmslayout')
@section('title')
Edit Booking Content
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Why US</h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('update-bookingsection',$bookingcontent->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     @if (app()->getLocale()==="es")
                      <input type="hidden" name="eslang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                    
                    <input type="hidden" name="bookingcontentid" value="{{$bookingcontent->id}}">  

                   
                    <div class="form-group">
                        <label for="booking_content" class="col-form-label">{{__('booking_content')}}:</label>
                      <input type="text" class="form-control" id="booking_content" name="booking_content" value="
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
                  @endswitch">
                      </div>

                 
                    <button type="submit" class="btn btn-success">{{__('Update')}}</button>
                    <a href={{route('bookingcontent-section')}} class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
 <script>
       
   $('#bookingcontent_description').summernote({
      
       tabsize: 2,
       height: 200
   });

  </script>
    
@endsection
@section('scripts')

    
@endsection
