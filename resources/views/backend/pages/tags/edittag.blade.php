@extends('backend.mastertemplate.template')

@section('contant') 
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Update Tag</h4>
      <p class="mg-b-0">Update Tag for Blog post .This Tag Name Should be Unique between others</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content m-4 p-3">
                    {{-- category added --}}
                       <div class="col-md-12">
                        <form action="{{Route('tag.update',$tag->id)}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="name">Tag Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Category Name" value="{{$tag->name}}"/>
                                    @error('name') 
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="drescreption">Tag Drescreption</label>
                                    <textarea name="drescreption" id="" cols="30" rows="5" class="form-control">{{$tag->drescreption}}</textarea>
                                    @error('drescreption') 
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label id="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                    <option value="1">---status---</option>
                                    <option value="1" @if($tag->status==1)selected @endif>Active</option>
                                    <option value="0" @if($tag->status==0)selected @endif>Inactive</option> 
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