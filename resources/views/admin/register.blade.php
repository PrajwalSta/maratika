@extends('layouts.cmslayout')
@section('title')
Register
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Registered Users</h4>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Phone Number
                </th>
                <th>
                  Email
                </th>
                <th>
                    UserType
                  </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->usertype}}</td>
                    <td class="text-right">
                    <a href="/role-register/{{$user->id}}" class="btn btn-success">Edit</a>
                    </td>
                    <td class="text-right">
                        <form action="/role-delete/{{$user->id}}" method="post" class="form-horizontal">
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
    
@endsection

@section('scripts')
    
@endsection