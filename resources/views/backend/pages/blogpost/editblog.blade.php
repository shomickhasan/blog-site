@extends('backend.mastertemplate.template')

@section('contant')
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update Blog Post</h4>
      <p class="mg-b-0">Update Blog Post for Blog post .This Blog Post Title Should be Unique between others</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content m-4 p-3">
                    {{-- category added --}}
                       <div class="col-md-12">
                        <form action="{{Route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your Blog Title" value="{{$blog->title}}"/>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryId">Seclect Category </label>
                                    <select name="categoryId" id="categoryId" class="form-control">
                                        <option value="">--select category---</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if($blog->category_id==$category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                        @error('categoryId')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </select>
                                </div>
                                {{-- blogimage displayed --}}
                                <img height='130' class="p-1"src="{{asset('backeend/blogimg/'. $blog->image)}}">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                     @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="drescreption">Tag Drescreption</label>
                                    <textarea name="drescreption" id="postdrescreption" cols="30" rows="5" class="form-control">{{$blog->drescreption}}</textarea>
                                    @error('drescreption')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label id="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                    <option value="1">---status---</option>
                                    <option value="1" @if($blog->status==1)selected @endif>Active</option>
                                    <option value="2" @if($blog->status==0)selected @endif>Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group pt-5">
                                    <input type="submit" class="form-control btn btn-primary" value="Update"/>
                                  </div>

                            </div>
                        </form><!-- end category add -->
                       </div>
                    </div>
                </div>
              </div><!-- pd-x-25 -->
            </div><!-- card -->




@endsection
