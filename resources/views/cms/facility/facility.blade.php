@extends('layouts.cmslayout')
@section('title')
CMS Facility
    
@endsection
@section('content')

<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Facility</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('store-facility')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title" class="col-form-label">{{__('Tiile')}}:</label>
          <input type="text" class="form-control" id="title" name="title">

          </div>
          <label for="description" class="col-form-label">Description:</label>
          <textarea type="text" rows="10" cols="80" class="form-control" id="description" name="description"></textarea>
      
        <div class="form-group">
          <label for="image" class="col-form-label">Image:</label>
          <input type="file"  class="form-control"  id="image" name="image" multiple>
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
            <button type="button" class="btn btn-warning float-right btn-sm" data-toggle="modal" data-target="#descriptionModal">Add Facility</button>

          </h4>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card-body">
              
                @foreach ($facility as $facility)
                
                <div class="content">
                 
                      
                 
                    <div class="title">
                        <div class="about-title">
                          <b>Title :</b>
                       
                        
                            {{  $facility->title }}
                       
                        </div>
                 
                        
                    <div class="about-description">
                        <b>Description :</b>
                      
                      {!!  $facility->description !!}
                
                </div>
                 
                  <div class="d-flex align-items-center">
                    <img src="../../uploads/facility/{{$facility->image}}" alt="" srcset="" style="max-height: 300px"> 
                
                </div>
                  
                    </div>
                  
                    </div>
                   
                  
                    <div class="pull-right d-flex justify-content-end ">
                  
                   
                        <a href="{{ route('edit-facility',$facility->id)}}" class="ml-1 btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                  
                            <form action="{{ route('delete-facility',$facility->id)}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                           
                       </div>
                  </tr>
                   <br/><br/>
                  <hr /><hr/>
                  @endforeach
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