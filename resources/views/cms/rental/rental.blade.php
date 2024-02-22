@extends('layouts.cmslayout')
@section('title')
CMS Rental
    
@endsection
@section('content')

<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('store-rental')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title" class="col-form-label">{{__('Bike Name')}}:</label>
          <input type="text" class="form-control" id="title" name="title">

          </div>

          <div class="form-group">
            <label for="subtitle" class="col-form-label">{{__('SubTitle')}}:</label>
          <input type="text" class="form-control" id="subtitle" name="subtitle">
          </div>

          <div class="form-group">
            <label for="backtitle" class="col-form-label">{{__('Back Title')}}:</label>
          <input type="text" class="form-control" id="backtitle" name="backtitle">
          </div>
         
          
          <label for="rental_description" class="col-form-label">Product rental_Description:</label>
          <textarea type="text" rows="10" cols="80" class="form-control" id="rental_description" name="rental_description"></textarea>
      
        <div class="form-group">
          <label for="rental_image" class="col-form-label">Image:</label>
          <input type="file"  class="form-control"  id="rental_image" name="rental_image" multiple>
        </div>
        <div class="form-group">
         Direction for Image:<br/>
         <label>Right</label> 
            <input type="radio" name="direction" value="RTL" checked><br/>
           <label>Left</label>
           <input type="radio" name="direction" value="LTL">
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

{{-- end of model --}}

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex align-items-end">
          <!--<h4 class="card-title">-->
          <!--  <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>-->

          <!--</h4>-->
          <h4 class="card-title">
            <button type="button" class="btn btn-warning float-right btn-sm" data-toggle="modal" data-target="#descriptionModal">Add Bike For Rental</button>

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
              
                @foreach ($rental as $rental)
                
                <div class="content">
                 
                      
                 
                    <div class="title">
                        <div class="about-title">
                          <b>Title :</b>
                       
                          @switch(app()->getLocale())
                            @case('es')
                            {{ $rental->rental_es_title }}  
                            @break
        
                            @case('de')
                            {{ $rental->rental_ger_title }}  
                            @break
                            @case('fr')
                            {{ $rental->rental_fr_title }}
                            @break 
                            @default
                            {{  $rental->rental_title }}
                         @endswitch
                        </div>
                        <div class="rental-subtitle">
                          <b>Sub-Title :</b>
                              @switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_subtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_subtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_subtitle }}
                              @break 
                              @default
                              {{  $rental->rental_subtitle }}
                          @endswitch
                          <div class="rental-backtitle">
        
                            <b>Back Title :</b>
                              @switch(app()->getLocale())
                              @case('es')
                              {{ $rental->rental_es_backtitle }}  
                              @break
          
                              @case('de')
                              {{ $rental->rental_ger_backtitle }}  
                              @break
                              @case('fr')
                              {{ $rental->rental_fr_backtitle }}
                              @break 
                              @default
                              {{  $rental->rental_backtitle }}
                          @endswitch
                          </div>
                        </div>
                        
                    <div class="rentaldescription">
                    <div class="desc">
                      Description:
                    </div>
                      @if ($rental->direction==="RTL")
                      <div class="d-flex align-items-center">

                     
                      @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_description !!}  
                      @break
  
                      @case('de')
                      {!! $rental->rental_ger_description !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_description !!}
                      @break 
                      @default
                      {!!  $rental->rental_description !!}
                  @endswitch
                  <img src="../../uploads/rental/{{$rental->rental_image}}" alt="" srcset="" style="max-height: 300px"> 
                  @endif
                </div>
                  @if ($rental->direction==="LTL")
                  <div class="d-flex align-items-center">
                    <img src="../../uploads/rental/{{$rental->rental_image}}" alt="" srcset="" style="max-height: 300px"> 
                   @switch(app()->getLocale())
                      @case('es')
                      {!! $rental->rental_es_description !!}  
                      @break
  
                      @case('de')
                      {!! $rental->rental_ger_description !!}  
                      @break
                      @case('fr')
                      {!! $rental->rental_fr_description !!}
                      @break 
                      @default
                      {!!  $rental->rental_description !!}
                  @endswitch
                  @endif
                </div>
                  
                    </div>
                  <br/>
                    
                    </div>
                   
                   
                   
               
                    
                   
                  
                  
                    <div class="pull-right d-flex justify-content-end ">
                  
                   
                        <a href="{{ route('edit-rental',$rental->id)}}" class="ml-1 btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  
                            <form action="{{ route('delete-rental',$rental->id)}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                           
                       </div>
                  </tr>
                   <br/><br/>
                  <hr /><hr/>
                  @endforeach
              
                  {{-- @foreach ($rental as $rental)
                  @if ($rental->direction=="RTL")
                  <tr class="w-100">
                    <div colspan="3">
                    
                     
                      {!! $rental->rental !!}
                     
                      
                   
                  </div>
                  <div colspan="3">
                    <img src="../../uploads/description/{{ $description->description_image }}" alt="" srcset=""> 

                  </div>
                  <div class="d-flex">
                    <a href="{{ route('edit-cx250rdescription',$description->id)}}" class="ml-1 btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  
                    <form action="{{ route('delete-cx250rdescription',$description->id)}}" method="post" class="form-horizontal">
                        @csrf
                            @method('delete')
                            <button type="submit" class="ml-1 btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                  </div>
                  </tr>    
                  @endif
                  @if ($description->direction=="LTL")
                  <tr class="w-100">
                    <div colspan="3">
                      <img src="../../uploads/description/{{ $description->description_image }}" alt="" srcset=""> 
  
                    </div>
                    <div colspan="3">
                    
                     
                      {!! $description->description !!}
                     
                      
                   
                  </div>
                  <div class="d-flex">
                    <a href="{{ route('edit-cx250rdescription',$description->id)}}" class="ml-1 btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  
                    <form action="{{ route('delete-cx250rdescription',$description->id)}}" method="post" class="form-horizontal">
                        @csrf
                            @method('delete')
                            <button type="submit" class="ml-1 btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                  </div>
                 
                  </tr>    
                  @endif
                 
                  @endforeach --}}
                 

                 
             
                
                
              </tbody>
            </table>
          </div>
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