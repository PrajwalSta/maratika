@extends('frontend/layouts.master')
@section('title')
Sagarmatha || ProjectDetails
    
@endsection
@section('header-link')


@endsection
@section('body')
    
    <div class="hero-wrap" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
             <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Project</a></span> <span>Project Details</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Project Details->{{ $projectdetail->project_title}}</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3">{{ $projectdetail->project_title}}</h2>
            <q>{{ $projectdetail->brief_description}}</q>
            <p>{!!$projectdetail->project_description!!}</p>
                <p>
                <img src="../../uploads/project/{{ $projectdetail->project_image }}" alt="" class="img-fluid">
              </p>
            
           
            </div>
            <div class="col-md-4 sidebar ftco-animate">
              <div class="sidebar-box ftco-animate">
                <h3>Related Projects</h3>
                @foreach ($project as $project)
                  <div class="block-21 mb-4">
                    <a class="blog-img mr-4" style="background-image: url(../../uploads/project/{{ $project->project_image }});"></a>
                    <h3 class="mb-3"><b>{{ $project->project_title}}</b></h3>
                    <div class="text">
                      <h3 class="heading"><a href="{{ route('readmore', $project->project_title) }}">{{$project->brief_description}}</a></h3>
                      <div class="meta">

                        {{-- <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div> --}}
                      </div>
                    </div>
                  </div>
                    
                @endforeach
                
                
              </div>
            </div>
            
            

            <div class="pt-5 mt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>John Doe</h3>
                    <div class="meta">June 27, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    {{-- <p><a href="#" class="reply">Reply</a></p> --}}
                  </div>
                </li>

               
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
         
            
      </div>
    </section> <!-- .section -->
    @endsection
    @section('scripts')

