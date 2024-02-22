@extends('layouts.cmslayout')
@section('title')
View Key Info
    
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/mr2osvcpmkdy2ki6yhtrr24x3tkxu6113jaz4p1uewp3adzs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#project_description'
  });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Key Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadKeyInfo')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="key_info" class="col-form-label">Key Information:</label>
              <input type="text" class="form-control" id="key_info" name="key_info">
            </div>
          
            <div class="form-group">
                <label for="key_info_value" class="col-form-label">Key Info. Value:</label>
                <input type="string" class="form-control" id="key_info_value" name="key_info_value">
            </div>
            <div class="form-group">
              <label for="icon" class="col-form-label">Icon Name:</label>
              <select name="icon" id="icon">
                <option value="fa-map-o">Key Information Icon</option>
                <option value="fa-map">Bed</option>
                <option value="fa-map-marker">Location</option>
                <option value="fa-motorcycle">Size</option>
                <option value="fa-calendar-plus-o">Washroom</option>
                <option value="fa-calendar-check-o">Internet</option>
                <option value="fa-road">Riding</option>
                <option value="fa-exclamation-triangle">Difficulty</option>
                <option value="fa-superpowers">Fitness Level</option>
                <option value="fa-usd">Price</option>
                <option value="fa-usd">Pillion</option>
                <option value="fa-truck">Travel In Support Vehicle</option>
                <option value="fa-money">Deposit</option>
                <option value="fa-users">Capacity of persons</option>

                
               
            
              </select>
          </div>
                        <input type="hidden" name="tour_id" value="{{$offroadKeyId}}">

         
            
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


  {{-- in spanish  --}}
  <div class="modal fade" id="spanishmodal" tabindex="-1" role="dialog" aria-labelledby="spanishmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="spanishmodalLabel">Add Key Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('saveoffroadKeyInfo')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="es_tour_title" class="col-form-label">Choose the key Info Title :</label>
              <select id="cars" name="keyinfo">
                @foreach($keyinfo as  $addkeyinfo)
                <option value="{{ $addkeyinfo->key_info }}">{{ $addkeyinfo->key_info }}</option>
                @endforeach
                
               
              </select>
            </div>
            <div class="form-group">
              <label for="es_key_info" class="col-form-label">Key Information:</label>
              <input type="text" class="form-control" id="es_key_info" name="es_key_info">
            </div>
          
            <div class="form-group">
                <label for="es_key_info_value" class="col-form-label">Key Info. Value:</label>
                <input type="string" class="form-control" id="es_key_info_value" name="es_key_info_value">
            </div>
              <input type="hidden" name="tour_id" value="{{$offroadKeyId}}">
            
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-primary">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- end of SpanishModal fORM  --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Room Key Information
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
            <!--<button type="button" class="btn btn-primary float-right btn-sm"  data-toggle="modal" data-target="#spanishmodal">Add in Spanish</button>-->

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>

        @endif
       
              <div class="col-sm-8">
               
                   
                    @foreach($keyinfo as  $keyinfo)
                     @if(app()->getLocale()!=="en")
                     <div class="col-4 d-flex">

                      <span style="font-weight: bold">
                      
                        <i class="fa {{ $keyinfo->icon }}" aria-hidden="true"></i> &nbsp;&nbsp;<span>
                         
                      {{$keyinfo->key_info}}
                  &nbsp;&nbsp;:&nbsp;&nbsp; 
                     
                      {{$keyinfo->key_info_value}}
                
                        </span>
                    </div>
                    @endif
                    <div class="col-12 d-flex">
                      <a href="" data-toggle="modal" data-target="#editAction" class="mt-0 btn btn-secondary w-100" style="display: flex;text-align: start" >

                      <span style="font-weight: bold">
                      
                        <i class="fa {{ $keyinfo->icon }}" aria-hidden="true"></i> &nbsp;&nbsp;<span>
                          @switch(app()->getLocale())
                      @case('es')
                      {{$keyinfo->es_key_info}} 
                      @break
  
                      @case('de')
                      {{$keyinfo->ger_key_info}}  
                      @break
                      @case('fr')
                      {{$keyinfo->fr_key_info}}
                      @break 
                      @default
                      {{$keyinfo->key_info}}
                  @endswitch &nbsp;&nbsp;:&nbsp;&nbsp; @switch(app()->getLocale())
                      @case('es')
                      {{$keyinfo->es_key_info_value}} 
                      @break
  
                      @case('de')
                      {{$keyinfo->ger_key_info_value}}  
                      @break
                      @case('fr')
                      {{$keyinfo->fr_key_info_value}}
                      @break 
                      @default
                      {{$keyinfo->key_info_value}}
                  @endswitch
                        </span>
                      
                      </a>
                       
                        

                      
                          <a href="/edit-offroadKeyInfo/{{ $keyinfo->id }}" class="btn mt-0" style="color: white;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          </a>
                        
                       
                  <form action="/delete-offroadkeyinfo/{{ $keyinfo->id }}" method="post" class="form-horizontal">
                    @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-0 ">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                  </form>
                    
                      </div>
                  
                   
                  @endforeach
                  
              
        
        </div>
        <br/>  
     
        
      
  </div>
    

@endsection