@extends('layouts.cmslayout')
@section('title')
Why US?
    
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
          <form method="POST" action="{{route('store-whyus')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="whyus_title" class="col-form-label">{{__('Why Us Title')}}:</label>
              <input type="text" class="form-control" id="whyus_title" name="whyus_title">
              </div>
            
              <div class="form-group">
                <label for="whyus_description" class="col-form-label"> {{__('Why Us Description')}}:</label>
                <textarea type="text" class="form-control" id="whyus_description" name="whyus_description"></textarea>
              </div>
              <div class="form-group">
                <label for="whyus_image" class="col-form-label">{{__('WhyUs Image')}}:</label>
                <input type="file" class="form-control" id="whyus_image" name="whyus_image">
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
          <h4 class="card-title">Why Us?
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
                  WhyUs Title
                </th>
                <th>
                  WhyUs Description
                </th>
                <th>
                    WhyUs Image
                  </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($whyus as $whyus)
                <tr>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $whyus->whyus_es_title }}  
                      @break
  
                      @case('de')
                      {{ $whyus->whyus_ger_title }}  
                      @break
                      @case('fr')
                      {{ $whyus->whyus_fr_title }}
                      @break 
                      @default
                      {{  $whyus->whyus_title }}
                  @endswitch
                    </td>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $whyus->whyus_es_description }}  
                      @break
  
                      @case('de')
                      {{ $whyus->whyus_ger_description }}  
                      @break
                      @case('fr')
                      {{ $whyus->whyus_fr_description }}
                      @break 
                      @default
                      {{  $whyus->whyus_description }}
                  @endswitch
                    </td>
                    <td>
                        <img src="../../uploads/whyus/{{ $whyus->whyus_image }}" alt="" srcset="" height="70px"> 

                        
                    </td>
                    <td>
                    </td>
                    <td class="text-right">
                        <a href="{{route('edit-whyus',$whyus->id)}}" class="btn btn-success">edit</a>
                    </td>
                        <td class="text-right">
                            <form action="{{route('delete-whyus',$whyus->id)}}" method="post" class="form-horizontal">
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