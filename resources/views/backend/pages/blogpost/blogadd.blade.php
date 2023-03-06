@extends('backend.mastertemplate.template')

@section('contant')
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Add Blog</h4>
      <p class="mg-b-0">Added Blog for Blog post .This Blog Should be Unique between others</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content m-4 p-3">
                    {{-- category added --}}
                       <div class="col-md-12">
                        <form action="{{Route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter your Blog Title"/>
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryId">Seclect Category </label>
                                    <select name="categoryId" id="categoryId" class="form-control">
                                        <option value="">--select category---</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        @error('categoryId')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                     @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="short_drescreption">Short Drescreption</label>
                                    <textarea name="short_drescreption" id="short_drescreption"  class="form-control"></textarea>
                                    @error('short_drescreption')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="drescreption">Drescreption</label>
                                    <textarea name="drescreption" id="postdrescreption"  class="form-control"></textarea>
                                    @error('drescreption')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                @foreach($tags as $tag)
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" name="tags[]" type="checkbox" id="tag{{$tag->id}}" value="{{$tag->id}}">
                                    <label class="form-check-label" for="tag{{$tag->id}}">{{$tag->name}}</label>
                                </div>
                                @endforeach

                                {{-- <div class="form-group">
                                    <label id="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                    <option value="1">---status---</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}

                                <div class="form-group pt-5">
                                    <input type="submit" class="form-control btn btn-primary" id="addCategory" name="addCategory" value="Save"/>
                                  </div>

                            </div>
                        </form><!-- end category add -->
                       </div>
                    </div>
                </div>
              </div><!-- pd-x-25 -->
            </div><!-- card -->




@endsection
