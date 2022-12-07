@extends('backend.mastertemplate.template')

@section('contant')
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-users"></i>
    <div>
      <h4>Add Tag</h4>
      <p class="mg-b-0">Added User .This Tag Should be Unique between others</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content m-4 p-3">
                    {{-- category added --}}
                       <div class="col-md-12">
                        <form action="{{Route('addnewuser')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="userName">User Name </label>
                                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter  userName Name"/>
                                    @error('userName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="email">Email </label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter  email "/>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label id="password">Password </label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter  password "/>
                                    @error('password')
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
