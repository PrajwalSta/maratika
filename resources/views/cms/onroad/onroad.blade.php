@extends('layouts.cmslayout')
@section('title')
Cms OnroadTour
    
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/mr2osvcpmkdy2ki6yhtrr24x3tkxu6113jaz4p1uewp3adzs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#tour_description'
  });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Project')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-onroadtour" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="tour_title" class="col-form-label">OnRoadTour {{__('Title')}}:</label>
              <input type="text" class="form-control" id="tour_title" name="tour_title">
            </div>
            <div class="form-group">
              <label for="tour_subtitle" class="col-form-label">OnRoadTour {{__('SubTitle')}}:</label>
              <input type="text" class="form-control" id="tour_subtitle" name="tour_subtitle">
            </div>
            <div class="form-group">
              <label for="tour_days" class="col-form-label">{{__('No. Of Days for Visit')}}:</label>
              <input type="number" class="form-control" id="tour_days" name="tour_days">
            </div>
            <div class="form-group">
              <label for="location" class="col-form-label">{{__('Location of Tour')}}:</label>
              <input type="text" class="form-control" id="location" name="location">
            </div>
             <div class="form-group">
              <label for="amount" class="col-form-label">{{__('Price for the tour')}}:</label>
              <input type="text" class="form-control" id="amount" name="amount">
            </div>
            <div class="form-group">
                <label for="tour_image" class="col-form-label">{{__('Image of The place')}}:</label>
                <input type="file" class="form-control" id="tour_image" name="tour_image">
              </div>
              <div class="form-group">
                <label for="tour_description" class="col-form-label">{{__('Tour Description')}}:</label>
                <textarea type="text" class="form-control" id="tour_description" name="tour_description"></textarea>
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
  
  
  {{-- for spanish modal --}}
  <div class="modal fade" id="spanishmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Project')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-onroadtour" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="es_tour_title" class="col-form-label">{{__('Choose the title')}} :</label>
              <select id="cars" name="package">
                @foreach ($onroad as $package)
                <option value="{{ $package->title}}">{{ $package->title}}</option>
                @endforeach
                
               
              </select>
            </div>
            <div class="form-group">
              <label for="es_tour_title" class="col-form-label">{{__('OnRoadTour Title')}}:</label>
              <input type="text" class="form-control" id="es_tour_title" name="es_tour_title">
            </div>
            <div class="form-group">
              <label for="es_tour_subtitle" class="col-form-label">{{__('OnRoadTour SubTitle')}}:</label>
              <input type="text" class="form-control" id="es_tour_subtitle" name="es_tour_subtitle">
            </div>
          
            <div class="form-group">
              <label for="es_location" class="col-form-label">{{__('Location of Tour')}}:</label>
              <input type="text" class="form-control" id="es_location" name="es_location">
            </div>
             <div class="form-group">
              <label for="amount" class="col-form-label">{{__('Price for the tour')}}:</label>
              <input type="text" class="form-control" id="amount" name="amount">
            </div>
           
              <input type="hidden" name="lang" value="6">
              <div class="form-group">
                <label for="spanish_tour_description" class="col-form-label">{{__('Tour Description')}}:</label>
                <textarea type="text" class="form-control" id="spanish_tour_description" name="spanish_tour_description"></textarea>
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

  
  {{-- for german modal --}}
  <div class="modal fade" id="spanishmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Project')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-onroadtour" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="ger_tour_title" class="col-form-label">{{__('Choose the title')}} :</label>
              <select id="cars" name="package">
                @foreach ($onroad as $package)
                <option value="{{ $package->title}}">{{ $package->title}}</option>
                @endforeach
                
               
              </select>
            </div>
            <div class="form-group">
              <label for="ger_tour_title" class="col-form-label">{{__('OnRoadTour Title')}}:</label>
              <input type="text" class="form-control" id="ger_tour_title" name="ger_tour_title">
            </div>
            <div class="form-group">
              <label for="ger_tour_subtitle" class="col-form-label">{{__('OnRoadTour SubTitle')}}:</label>
              <input type="text" class="form-control" id="ger_tour_subtitle" name="ger_tour_subtitle">
            </div>
          
            <div class="form-group">
              <label for="ger_location" class="col-form-label">{{__('Location of Tour')}}:</label>
              <input type="text" class="form-control" id="ger_location" name="ger_location">
            </div>
             <div class="form-group">
              <label for="amount" class="col-form-label">{{__('Price for the tour')}}:</label>
              <input type="text" class="form-control" id="amount" name="amount">
            </div>
           
              <input type="hidden" name="lang" value="6">
              <div class="form-group">
                <label for="spanish_tour_description" class="col-form-label">{{__('Tour Description')}}:</label>
                <textarea type="text" class="form-control" id="spanish_tour_description" name="spanish_tour_description"></textarea>
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

  {{-- for french --}}

  <div class="modal fade" id="spanishmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Project')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/save-onroadtour" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="fr_tour_title" class="col-form-label">{{__('Choose the title')}} :</label>
              <select id="cars" name="package">
                @foreach ($onroad as $package)
                <option value="{{ $package->title}}">{{ $package->title}}</option>
                @endforeach
                
               
              </select>
            </div>
            <div class="form-group">
              <label for="fr_tour_title" class="col-form-label">{{__('OnRoadTour Title')}}:</label>
              <input type="text" class="form-control" id="fr_tour_title" name="fr_tour_title">
            </div>
            <div class="form-group">
              <label for="fr_tour_subtitle" class="col-form-label">{{__('OnRoadTour SubTitle')}}:</label>
              <input type="text" class="form-control" id="fr_tour_subtitle" name="fr_tour_subtitle">
            </div>
          
            <div class="form-group">
              <label for="fr_location" class="col-form-label">{{__('Location of Tour')}}:</label>
              <input type="text" class="form-control" id="fr_location" name="fr_location">
            </div>
             <div class="form-group">
              <label for="amount" class="col-form-label">{{__('Price for the tour')}}:</label>
              <input type="text" class="form-control" id="amount" name="amount">
            </div>
           
              <input type="hidden" name="lang" value="6">
              <div class="form-group">
                <label for="spanish_tour_description" class="col-form-label">{{__('Tour Description')}}:</label>
                <textarea type="text" class="form-control" id="spanish_tour_description" name="spanish_tour_description"></textarea>
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
  {{-- end of modal --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">OnRoad Tours
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">{{__('Add New')}}</button>
                        <!--<button type="button" class="btn btn-primary float-right btn-sm"  data-toggle="modal" data-target="#spanishmodal">{{__('Add in Spanish')}}</button>-->


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
                   {{__('Subtitle')}}
                </th>
                <th>
                  {{__('No. of Days')}}
                </th>
                <th>
                  {{__('Location')}}
                </th>
                <th>
                  {{__('Total Price')}}
                </th>
                <th>
                  {{__('OnRoadTour Image')}}
                </th>
                <th>
                 {{__('Itinerary')}}
                </th>
               <th class="text-right">
                </th>
                <th class="text-right">
                  </th>
                 <th class="text-right">
                     {{__('Action')}}
                  </th>
              </thead>
              <tbody>
                @foreach ($onroad as $onroad)
                <tr>
                    <td style="font-weight: bold">
                      @switch(app()->getLocale())
                      @case('es')
                      {!! $onroad->es_title !!}  
                      @break
  
                      @case('de')
                      {!! $onroad->ger_title !!}  
                      @break
                      @case('fr')
                      {!! $onroad->fr_title !!}
                      @break 
                      @default
                      {!! $onroad->title !!}
                  @endswitch
                    </td>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {!! $onroad->es_sub_title !!}  
                      @break
  
                      @case('de')
                      {!! $onroad->ger_sub_title !!}  
                      @break
                      @case('fr')
                      {!! $onroad->fr_sub_title !!}
                      @break 
                      @default
                      {!! $onroad->sub_title !!}
                  @endswitch                    </td>
                    <td>
                      {{ $onroad->days }}
                    </td>
                    <td>
                    @switch(app()->getLocale())
                      @case('es')
                      {!! $onroad->es_location !!}  
                      @break
  
                      @case('de')
                      {!! $onroad->ger_location !!}  
                      @break
                      @case('fr')
                      {!! $onroad->fr_location !!}
                      @break 
                      @default
                      {!! $onroad->location !!}
                  @endswitch                    </td>
                    <td>
                    @switch(app()->getLocale())
                      @case('es')
                      {!! $onroad->es_amount !!}  
                      @break
  
                      @case('de')
                      {!! $onroad->ger_amount !!}  
                      @break
                      @case('fr')
                      {!! $onroad->fr_amount !!}
                      @break 
                      @default
                      {{ $onroad->amount }}
                  @endswitch
                 </td>

                    
                   
                    <td>
                       <img src="../../uploads/onroadtour/{{ $onroad->tour_image }}" alt="" srcset="" height="70px"> 
                    </td>
                    <td>
                      <a href="{{ route('onroadItinerary',$onroad->id)}}" class="btn btn-warning">{{__('Itinerary')}}</a>
                    </td>
                     <td>
                      <a href="{{ route('onroadEvents',$onroad->id)}}" class="btn btn-primary">{{__('Events')}}</a>
                    </td>
                     <td>
                      <a href="{{ route('onroadkeyInfo',$onroad->id)}}" class="btn btn-primary">{{__('Key Info.')}}</a>
                    </td>
                    <td class="text-right">
                        <a href="/edit-onroadtouor/{{$onroad->id}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                        <td class="text-right">
                            <form action="/delete-onroadtour/{{$onroad->id}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                           
                       </td>
                  </tr>
                  <tr class="w-100">
                    <td  colspan="7">
                    
                      <span style="font-weight:bold">{{__('Description')}}:</span><br/>
                      
                      @switch(app()->getLocale())
                      @case('es')
                      {!! $onroad->es_tour_description !!}  
                      @break
  
                      @case('de')
                      {!! $onroad->ger_tour_description !!}  
                      @break
                      @case('fr')
                      {!! $onroad->fr_tour_description !!}
                      @break 
                      @default
                      {!! $onroad->tour_description !!}
                  @endswitch
                      <br/>
                      <br/>
                   
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