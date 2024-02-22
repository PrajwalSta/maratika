@extends('layouts.cmslayout')
@section('title')
Edit Notice
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Notice</h1>
            </div>
            <div class="card-body">
              
            <form action="/cms-updatenotice/{{ $notice->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (app()->getLocale()==="es")
                      <input type="hidden" name="eslang" value="es">  
                      @elseif (app()->getLocale()==="de")
                      <input type="hidden" name="germanlang" value="de">
                      @elseif (app()->getLocale()==="fr")
                      <input type="hidden" name="frenchlang" value="fr">  
 
                    @endif
                    <div class="form-group">
                        <label for="notice_title" class="col-form-label">notice Title:</label>
                        <input type="text" class="form-control" id="notice_title" name="notice_title" value="  @switch(app()->getLocale())
@case('es')
{!! $notice->notice_es_title !!}  
@break

@case('de')
{!! $notice->notice_ger_title !!}  
@break
@case('fr')
{!! $notice->notice_fr_title !!}
@break 
@default
{!! $notice->notice_title !!}
@endswitch">
                      </div>
                      <div class="form-group justify-content-center" style="">
                          <label for="notice_image" class="col-form-label">notice Image:</label>
                          <br/>
                          <img src="../../uploads/notices/{{ $notice->notice_image }}" alt="" srcset="" height="70px"> 
                          <br/><br/>
                          <input type="hidden" name="edit_notice_image" value="{{$notice->notice_image}}">
                          <input type="file" class="form-control" id="notice_image" name="notice_image">
                        </div>
                      <div class="form-group">
                        <label for="notice_description" class="col-form-label">notice Desctiptiono:</label>
                        <textarea class="form-control" id="notice_description" name="notice_description" >@switch(app()->getLocale())
@case('es')
{!! $notice->notice_es_description !!}  
@break

@case('de')
{!! $notice->notice_ger_description !!}  
@break
@case('fr')
{!! $notice->notice_fr_description !!}
@break 
@default
{!! $notice->notice_description !!}
@endswitch  
                        </textarea>
                      </div>
                    
                  </div>
                 
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/dashboard" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
     <script>
  $('#notice_description').summernote({
      placeholder: '',
      tabsize: 2,
      height: 200
  });
</script> 
@endsection
@section('scripts')
    
@endsection