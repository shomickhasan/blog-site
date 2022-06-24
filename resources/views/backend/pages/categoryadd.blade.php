@extends('backend.mastertemplate.template')

@section('contant') 
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Add Category</h4>
      <p class="mg-b-0">Added Category for Blog post .This Category Should be Unique between others</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content m-4 p-3">
                    {{-- category added --}}
                       <div class="col-md-12">
                        <form action="{{Route('category.store')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter your Category Name"/>
                                    @error('categoryName') 
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="pname">Category Drescreption</label>
                                    <textarea name="categoryDrescreption" id="" cols="30" rows="5" class="form-control"></textarea>
                                    @error('categoryDrescreption') 
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label id="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                    <option value="1">---status---</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option> 
                                    </select>
                                    @error('status') 
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

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