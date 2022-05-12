@extends('admin/home')
@section('title','Book ')
@section('select_book','active')
@section('contain')
@if(session()->has('message_update_suc')  || session()->has('message_delete_suc'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success"></span>
        {{session('message_update_suc')}}
        {{session('message_delete_suc')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    @if(session()->has('message_update_unsuc')|| session()->has('message_delete_unsuc'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger"></span>
        {{session('message_update_unsuc')}}
        {{session('message_delete_unsuc')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    
  


<div class="row m-t-30">
    
    <div class="col-md-12">
        <a class="btn btn-success" href="{{url('admin/book/add_book')}}">Add chapter</a>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th >Id</th>
                        
                        <th >Book Name</th>
                        <th >Class Name</th>
                        
                        <th width="30%">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{$list->book_id}}</td>
                        <td>{{$list->book_name}}</td>
                        <td>{{$list->c_name}}</td>
                       
                        
                        
                        <td><a class="btn btn-primary" href="{{url('admin/book/update_book/'.$list->book_id)}}">Update</a> 
                        <a class="btn btn-danger" href="{{url('admin/book/delete_book/'.$list->book_id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
