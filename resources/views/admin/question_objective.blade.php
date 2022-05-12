@extends('admin/home')
@section('title','Objective type ')
@section('select_objective','active')
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
        <a class="btn btn-success" href="{{url('admin/objective/add_objective')}}">Add Objective Question</a>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th >Id</th>
                        <th >question</th>
                        <th >book</th>
                        <th >chapter</th>
                        <th >class</th>
                   
                        <th width="30%">action</th>
                    </tr>
                </thead>
                @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->question_eng}}</td>
                        <td>{{$list->book_name}}</td>
                        <td>{{$list->chapter_name}}</td>
                        <td>{{$list->c_name}}</td>
                       
                        <td width="20"><a class="btn btn-primary" href="{{url('admin/question_objective/update_objective/'.$list->id)}}">Update </a> 
                        <a class="btn btn-danger" href="{{url('admin/question_objective/delete_objective/'.$list->id)}}">Delete </a></td>
                    </tr>
                    @endforeach
                <tbody>
                  
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection
