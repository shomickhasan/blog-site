@extends('backend.mastertemplate.template')

@section('contant') 
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Show Blog Post</h4>
      <p class="mg-b-0">Manage Your Blog, You Can Edit Update And Delete Your Blog</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content card-body p-5">
                    {{-- show blog --}}
                     
                      <table  clsaa="table table-bordered ">
                        <tbody>
                            <tr>
                                <th style="width:200px">Title</th>
                                <td>{{ $blog->title}}</td>
                            </tr>
                            <tr>
                                <th style="width:200px">Image</th>
                                <td><img height="80" src="{{asset('backeend/blogimg/'. $blog->image)}}"></td>
                            </tr>
                            <tr>
                                <th style="width:200px">Drescreption</th>
                                <td>{{!! $blog->drescreption !!}}</td>
                            </tr>
                            <tr>
                                <th style="width:200px">Category</th>
                                <td>{{$blog->category->name}}</td>
                            </tr>
                        </tbody>
                      </table>
                       
                    </div>
                </div>
              </div><!-- pd-x-25 -->
            </div><!-- card -->


  

         


@endsection