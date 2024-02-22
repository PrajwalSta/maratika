@extends('layouts.cmslayout')
@section('title')
Register-Edit
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Role for Registered User</h1>
            </div>
            <div class="card-body">
            <form action="/role-registered-update/{{ $users->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$users->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="usertype">Give Role</label>
                        <select name="usertype" id="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="vendor">Vendor</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/role-register" class="btn btn-danger">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection