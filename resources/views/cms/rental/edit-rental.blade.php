@extends('layouts.cmslayout')
@section('title')
Edit Rental 
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Rent</h1>
            </div>
            <div class="card-body">
              
            <form action="{{route('update-rental',$rental->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     @if (app()->getLocale()==="es")
                      <input type="hidden" name="lang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                   
                    <div class="form-group">
                        <label for="rental_title" class="col-form-label">{{__('rental_title')}}:</label>
                      <input type="text" class="form-control" id="rental_title" name="rental_title" value=
                      @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_title !!}  
                      @break
                    
                      @case('de')
                      {!! $rental->rental_ger_title !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_title !!}
                      @break 
                      @default
                      
                      {!! $rental->rental_title !!}
                    @endswitch>
                      </div>
                      
          <div class="form-group">
            <label for="subtitle" class="col-form-label">{{__('SubTitle')}}:</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle" value="
          @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_subtitle !!}  
                      @break
                    
                      @case('de')
                      {!! $rental->rental_ger_subtitle !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_subtitle !!}
                      @break 
                      @default
                      
                      {!! $rental->rental_subtitle !!}
                    @endswitch">
          </div>

          <div class="form-group">
            <label for="backtitle" class="col-form-label">{{__('Back Title')}}:</label>
          <input type="text" class="form-control" id="backtitle" name="backtitle" value="@switch(app()->getLocale())
          @case('es')
          {!! $rental->rental_es_backtitle !!}  
          @break
        
          @case('de')
          {!! $rental->rental_ger_backtitle !!}  
          @break
          @case('fr')
          {!! $rental->rental_fr_backtitle !!}
          @break 
          @default
          
          {!! $rental->rental_backtitle !!}
        @endswitch">
          </div>
         
                    
                      <div class="form-group">
                        <label for="rental_desription" class="col-form-label"> {{__('rental_desription')}}:</label>
                                            <textarea type="text" class="form-control" id="rental_description" name="rental_description"
                     > @switch(app()->getLocale())
                                              @case('es')
                                              {!! $rental->rental_es_description !!}  
                                              @break
                          
                                              @case('de')
                                              {!! $rental->rental_es_description !!}  
                                              @break
                                              @case('fr')
                                              {!! $rental->rental_ger_description !!}
                                              @break 
                                              @default
                                              {!! $rental->rental_description !!}
                                          @endswitch</textarea>
                      </div>

                      <div class="form-group justify-content-center" style="">
                        <label for="rental_image" class="col-form-label">rental Image:</label>
                        <br/>
                        <img src="../../uploads/rental/{{ $rental->rental_image }}" alt="" srcset="" height="70px"> 
                        <br/><br/>
                        <input type="hidden" name="edit_rentalimage" value="{{$rental->rental_image}}">
                        <input type="file" class="form-control" id="rental_image" name="rental_image">
                  </div>
                  <div class="form-group">
                    Direction for Image:<br/>
                    <label>Right</label> 
                       <input type="radio" name="direction" value="RTL" checked><br/>
                      <label>Left</label>
                     <input type="radio" name="direction" value="LTL">
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
