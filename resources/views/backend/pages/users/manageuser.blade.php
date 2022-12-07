@extends('backend.mastertemplate.template')

@section('contant')
{{-- topnavigationbar --}}
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage Users</h4>
      <p class="mg-b-0">Manage Your Users, You Can Edit Update And Delete Your Category</p>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl=1 @endphp
                                @foreach ($users as $users)
                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$users->name }}</td>
                                    <td>{{$users->email }}</td>
                                    <td>Status</td>
                                    <td>
                                      <a href="" class=" btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="" class=" btn btn-sm btn-info"><i class="fas fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#category">
                                           <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @php $sl++ @endphp


            <!--catacory Delete confarmination Modal -->
                            {{-- <div class="modal fade" id="category{{$category->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you Want To Delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                      <h3>{{$category->name}}</h3>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{Route ('categorydelete',$category->id)}}" class="btn btn-primary">Ok</a>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
                              @endforeach

                            </tbody>
                          </table>
                       </div>
                    </div>
                </div>
              </div><!-- pd-x-25 -->
            </div><!-- card -->







@endsection
