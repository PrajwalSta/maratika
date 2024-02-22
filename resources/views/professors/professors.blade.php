@extends('layouts.master')
@section('title')
Professors
    
@endsection
@section('content')
<style>
  th{
    font-size: 14px!important;
  }
</style>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Professors
            <a href="/add-professors" class="btn btn-primary pull-right btn-sm">Add New</a>
          </h3>
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
                  Fname
                </th>
                <th>
                  Lname
                </th>
                <th>
                  D.O.B
                </th>
            
              <th>
            Gender
              </th>
              <th>
            Mobile Number
              </th>
              <th>
            Email Address:
              </th>
              <th>
                Temporary Address
                  </th>  
                   <th>
                    Permanent Address
                      </th>
                      <th>
                        Joining Date
                          </th>
                      
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($profs as $prof)
                <tr>
                    <td>
                      {{ $prof->first_name }}
                    </td>
                    <td>
                        {{ $prof->last_name }}
                    </td>
                    <td>
                      {{ $prof->dob }}
                  </td>
                      <td>
                          {{ $prof->sex }}
                      </td>
                        <td>
                          {{ $prof->mobile_num}}
                      </td>
                      <td>
                        {{ $prof->email }}
                    </td>
                      <td>
                        {{ $prof->temp_address }}
                    </td>
                      <td>
                        {{ $prof->perma_address }}
                    </td>
                    <td>
                    {{ $prof->joining_date }}
                </td>
                    <td class="text-right">
                        <a href="/professor-edit/{{$prof->id}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                        <form action="/professor-delete/{{ $prof->id }}" method="post" class="form-horizontal">
                            @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger m-0">Delete</button>
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
    
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
    </script>
    
@endsection