@extends('layouts.cmslayout')
@section('title')
Cms Blogs

@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $("#mysummernote").summernote({
            height: 150,                 // set editor height 

        });
        $('.dropdown-toggle').dropdown();
    });
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('cms-blogs-save')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="blog_title" class="col-form-label">News Title:</label>
              <input type="text" class="form-control" id="blog_title"  name="blog_title">
            </div>

            <div class="form-group">
                <label for="blog_image" class="col-form-label">News Image:</label>
                <input type="file" class="form-control" id="blog_image"  name="blog_image" required>
              </div>
            <div class="form-group">
              <label for="blog_description" class="col-form-label">News Description:</label>
              <textarea class="form-control" id="mysummernote"  name="blog_description"></textarea>
            </div>
            <div class="form-group">
                <label for="author_name" class="col-form-label">Authon Name || Written By:</label>
                <input type="text" class="form-control" id="author_name"  name="author_name">
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
          <h4 class="card-title">Article || Recent News
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">Add News</button>

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
                  News Title
                </th>
                <th>
                  News Description
                </th>
                <th>
                  News Image
                </th>
                <th class="text-right">
                  Edit
                </th>
                <th class="text-right">
                    Delete
                  </th>
              </thead>
              <tbody>
                @foreach ($blog as $blog)
                <tr>
                    <td>
                      {{ $blog->blogs_title }}
                    </td>
                    <td>
                      {!! $blog->blogs_description !!}
                      <b>Author: {{ $blog->author_name }}</b>
                    </td>
                    <td>
                       <img src="../../uploads/blog/{{ $blog->blog_image }}" alt="" srcset="" height="auto">
                    </td>
                    <td class="text-right">
                        <a href="{{route('cms-blogs-edit',$blog->id)}}" class="btn btn-success">Edit</a>
                    </td>
                        <td class="text-right">
                            <form action="{{route('cms-blogs-delete',$blog->id)}}" method="post" class="form-horizontal">
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
