@extends('layouts.cmslayout')
@section('title')
Cms Contact Us
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $("#mysummernote").summernote({
            height: 100,                 // set editor height 

        });
        $('.dropdown-toggle').dropdown();
    });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('Add Details')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{route('saveContactDetail')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">{{__('Title')}}:</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
              <div class="form-group">
                <label for="details" class="col-form-label">{{__('Details')}}:</label>
                <textarea type="text" class="form-control" id="mysummernote" name="details"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>

        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- end of Modal fORM --}}

  {{-- end of modal --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Title
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">{{__('Add Details')}}</button>
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
                    {{__('Details')}}
                </th>
              </thead>

                @foreach ($contactdetails as $contactdetail)
                <tr>
                    <td>{{ $contactdetail->title }}</td>
                    <td>{!! $contactdetail->details !!}</td>
                    <td class="text-right">
                        <a href="{{route('editContactDetail',$contactdetail->id)}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                        <td class="text-right">
                            <form action="{{route('deleteContactDetail',$contactdetail->id)}}" method="post" class="form-horizontal">
                                @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>

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
