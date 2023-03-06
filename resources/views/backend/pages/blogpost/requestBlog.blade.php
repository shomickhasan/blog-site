@extends('backend.mastertemplate.template')

@section('contant')
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Requested Blog</h4>
      <p class="mg-b-0">Manage Your Blog, You Can Edit Update And Delete Your Blog</p>
    </div>
  </div>
      {{-- maincontant --}}
  <div class="row row-sm mg-t-20">
    <div class="col-lg-12">
      <div class="card bd-0 shadow-base">
        <div class="content">
          @foreach($requestedBlogs as $requestedBlog)
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><a href="{{Route('blog.show',$requestedBlog->id)}}">{{$requestedBlog->title }}</a></h5>
                    <p class="card-text">{{$requestedBlog->short_drescreption}}</p>
                    <span> By: <a href=""><b>{{$requestedBlog->users->name}}</b></a></span> &nbsp;-&nbsp;<span>At:{{$requestedBlog->created_at->format('M d, y')}}</span><br><br>
                    <a href="{{Route('request.blog.approve',$requestedBlog->id)}}" class="btn btn-primary">Approve</a>

                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div><!-- pd-x-25 -->
  </div><!-- card -->







@endsection
