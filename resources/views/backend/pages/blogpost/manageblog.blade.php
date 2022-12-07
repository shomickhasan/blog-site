@extends('backend.mastertemplate.template')

@section('contant') 
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Blog</h4>
      <p class="mg-b-0">Manage Your Blog, You Can Edit Update And Delete Your Blog</p>
    </div>
  </div>
      {{-- maincontant --}}
       <div class="row row-sm mg-t-20">
           <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                   <div class="content">
                    {{-- category added --}}
                       <div class="col-md-12 col-lg-12  col-sm-12">
                        <table class="table table-bordered table-primary" id="catTable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl=1 @endphp
                                @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$blog->title  }}</td>
                                    <td><img height="80" src="{{asset('backeend/blogimg/'. $blog->image)}}" alt=""></td>
                                    <td>{{$blog->category_id}}</td>
                                    <td>{{$blog->users->name}}</td>
                                    <td>
                                    @if($blog->status==1)
                                     <span class="badge badge-info">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    </td>
                                    @endif
                                    <td>
                                      <a href="{{Route('blog.show',$blog->id)}}" class=" btn btn-sm btn-success"><i class="fas fa-eye"></i></a> 
                                        <a href="{{Route('blog.edit',$blog->id)}}" class=" btn btn-sm btn-info"><i class="fas fa-edit"></i></a> 
      
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#blogpost{{$blog->id}}">
                                           <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $sl++ @endphp   
                                
                                
            <!--catacory Delete confarmination Modal -->
                            <div class="modal fade" id="blogpost{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you Want To Delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                      <h3>{{$blog->title}}</h3>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{Route ('blogdelete',$blog->id)}}" class="btn btn-primary">Ok</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                              @endforeach
                               
                            </tbody>
                          </table>
                       </div>
                    </div>
                </div>
              </div><!-- pd-x-25 -->
            </div><!-- card -->


  

         


@endsection