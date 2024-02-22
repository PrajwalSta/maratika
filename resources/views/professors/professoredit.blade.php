@extends('layouts.master')
@section('title')
Professor Edit
    
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Professor</h1>
            </div>
            <div class="card-body">
              
            <form action="/update-professor/{{ $professor->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <form method="POST" action="/save-events">
                        @csrf
                        <div class="form-group d-flex">
                            <div class="col-4">
                                <label for="Fname">First Name:</label>
                            <input type="text" name="Fname" class="form-control" value="{{ $professor->first_name }}">
                            </div>
                            <div class="col-4">
                                <label for="Lname">Last Name:</label>
                                <input type="text" name="Lname" class="form-control" value="{{ $professor->last_name }}">
                            </div>                    
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-4">
                                <label for="dob">D.0.B:</label>
                                <input type="date" name="dob" class="form-control" value="{{ $professor->dob }}">
                            </div>
                            <div class="col-3">
                                <label for="gender">Gender:</label>
                                <div class="d-flex">
                                    
                                    <input type="radio" name="gender" id="male" value="male" class="form-control">Male
                                    <input type="radio" name="gender" id="female" value="female" class="form-control">Female
                                </div>
                               
                            </div>                    
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-4">
                                <label for="dob">Mobile Number:</label>
                                <input type="number" name="mob_num" class="form-control" value="{{ $professor->mobile_num }}">
                            </div>
                            <div class="col-4">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email" class="form-control" value="{{ $professor->email }}"> 
                            </div>                    
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-8">
                                <label for="temp_address">Temporary Address:</label>
                                <input type="text" name="temp_address" class="form-control" value="{{ $professor->temp_address }}">
                            </div>                 
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-8">
                                <label for="perma_address">Permanent Address:</label>
                                <input type="text" name="perma_address" class="form-control" value="{{ $professor->perma_address }}">
                            </div>                 
                        </div>
                        <div class="form-group">
                            <div class="col-4">
                                <label for="joining_date">Joining Date:</label>
                                <input type="date" name="joining_date" class="form-control" value="{{ $professor->joining_date }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-4">
                                <label for="profile">Profile:</label>
                                <input type="file" name="profile" class="form-control">
                            </div>
                        </div>
                      
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/professors" class="btn btn-danger">Cancel</a>
                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection
@section('scripts')
    
@endsection