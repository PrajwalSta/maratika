@extends('layouts.cmslayout')
@section('title')
Ambassadors

@endsection
@section('content')
<div>
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
          <form method="POST" action="{{route('store-ambasadors')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="ambasador_title" class="col-form-label">{{__('Ambassadors Title')}}:</label>
              <input type="text" class="form-control" id="ambasador_title" name="ambasador_title">
              </div>

              <div class="form-group">
                <label for="ambasador_description" class="col-form-label"> {{__('Ambassadors Description')}}:</label>
                <textarea type="text" class="form-control" id="ambasador_description" name="ambasador_description"></textarea>
              </div>
              <div class="form-group">
                <label for="ambasador_image" class="col-form-label">{{__('Ambasador Image')}}:</label>
                <input type="file" class="form-control" id="ambasador_image" name="ambasador_image">
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

{{-- modal form for contents --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{route('store-ambasadorcontent')}}" enctype="multipart/form-data">
              @csrf

                <div class="form-group">
                  <label for="content_description" class="col-form-label"> {{__('Content Description')}}:</label>
                  <textarea type="text" class="form-control" id="content_description" name="content_description"></textarea>
                </div>
                <div class="form-group">
                  <label for="content_image" class="col-form-label">{{__("content Image")}}:</label>
                  <input type="file" class="form-control" id="content_image" name="content_image">
                </div>
                <div class="form-group">
                    Direction for Image:<br/>
                    <label>Right</label>
                       <input type="radio" name="direction" value="RTL" checked><br/>
                       <label>Left</label>
                       <input type="radio" name="direction" value="LTR">
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

    {{-- end of modal form --}}

    {{-- for Adding Form Data --}}
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Form Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{route('store-ambasadorform')}}" enctype="multipart/form-data">
              @csrf

                <div class="form-group">
                  <label for="form_name" class="col-form-label">{{__("Form Input Name")}}:</label>
                  <input type="text" class="form-control" id="form_name" name="form_name">
                </div>
                <div class="form-group">
                    <label for="form_type" class="col-form-label">Choose Form Input Type :</label>
                    <select id="text" name="form_type">
                      <option value="text">Text</option>
                      <option value="textarea">Textarea</option>

                    </select>
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
    {{-- end of adding form --}}

{{-- SHOWING Ambasadors --}}
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Ambassador
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add New</button>
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal1">Add New Content</button>
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal2">Add Form Data</button>

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
                  Ambasador Title
                </th>
                <th>
                  Ambasador Description
                </th>
                <th>
                    Ambasador Image
                  </th>
                {{-- <th class="text-right">
                  Edit
                </th> --}}
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($ambasadors as $ambasador)
                <tr>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $ambasador->ambasador_es_title }}
                      @break

                      @case('de')
                      {{ $ambasador->ambasador_ger_title }}
                      @break
                      @case('fr')
                      {{ $ambasador->ambasador_fr_title }}
                      @break
                      @default
                      {{  $ambasador->ambasador_title }}
                  @endswitch
                    </td>
                    <td>
                      @switch(app()->getLocale())
                      @case('es')
                      {{ $ambasador->ambasador_es_description }}
                      @break

                      @case('de')
                      {{ $ambasador->ambasador_ger_description }}
                      @break
                      @case('fr')
                      {{ $ambasador->ambasador_fr_description }}
                      @break
                      @default
                      {{  $ambasador->ambasador_description }}
                  @endswitch
                        {{ $ambasador->ambasador_description }}
                    </td>
                    <td>
                        <img src="../../uploads/ambasador/{{ $ambasador->ambasador_image }}" alt="" srcset="" height="70px">


                    </td>
                    <td>
                    </td>
                    {{-- <td class="text-right">
                        <a href="{{route('edit-ambasadors',$ambasador->id)}}" class="btn btn-success">edit</a>
                    </td> --}}
                        <td class="text-right">
                            <form action="{{route('delete-ambasadors',$ambasador->id)}}" method="post" class="form-horizontal">
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


        <br/><br/>

    </div>
</div>

{{-- Showing Ambasador Contents  --}}
  <div class="card-body m-3" style="background-color: white">

    <div class="table-responsive">
      <table id="table" class="table">
        <thead class=" text-primary">
          <th>
        Content Title
          </th>
          <th>
        Content Description
          </th>
          <th>
            Content Direction
            </th>
          {{-- <th class="text-right">
            Edit
          </th> --}}
          <th class="text-right">
              Delete
            </th>
        </thead>
        <tbody>
          @foreach ($ambasadorcontents as $ambasadorcontent)
          <tr>

              <td>
                @switch(app()->getLocale())
                    @case('es')
                    {{ $ambasadorcontent->es_ambasador_description }}
                    @break

                    @case('de')
                    {{-- {{ $ambasadorcontent->ambasador_ger_description }} --}}
                    @break
                    @case('fr')
                    {{ $ambasadorcontent->fr_ambasador_description }}
                    @break
                    @default
                    {{  $ambasadorcontent->ambasador_description }}
                @endswitch
                  {{ $ambasadorcontent->ambasador_description }}
              </td>
              <td>
                  <img src="../../uploads/ambasador/{{ $ambasadorcontent->image }}" alt="" srcset="" height="70px">


              </td>
              <td>
                  {{ $ambasadorcontent->direction }}
              </td>
              {{-- <td class="text-right">
                  <a href="{{route('edit-ambasadorcontent',$ambasadorcontent->id)}}" class="btn btn-success">edit</a>
              </td> --}}
                  <td class="text-right">
                      <form action="{{route('delete-ambasadorcontent',$ambasadorcontent->id)}}" method="post" class="form-horizontal">
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


  {{-- for forms --}}
<div class="card-body m-3" style="background-color: white">
    <div class="table-responsive">
      <table id="table" class="table">
        <thead class=" text-primary">
          <th>
        Form Input Name
          </th>
          <th>
        Form DataType
        </th>

          {{-- <th class="text-right">
            Edit
          </th> --}}
          <th class="text-right">
              Delete
            </th>
        </thead>
        <tbody>
          @foreach ($forms as $form)
          <tr>

              <td>
                  {{ $form->form_name }}
              </td>
              <td>
                  {{ $form->form_type }}
              </td>
              {{-- <td class="text-right">
                  <a href="{{route('edit-form',$form->id)}}" class="btn btn-success">edit</a>
              </td> --}}
                  <td class="text-right">
                      <form action="{{route('delete-ambasadorform',$form->id)}}" method="post" class="form-horizontal">
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


@endsection
