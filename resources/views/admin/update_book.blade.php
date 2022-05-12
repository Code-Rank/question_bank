@extends('admin/home')
@section('title','Update Book ')
@section('contain')
<div class="container-fluid">
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
                        <div class="row">
                       
                            <div class="col-lg-6">
                          
                                <div class="card">
                                    <div class="card-header"><a href="{{url('admin/book')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Book</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/book/update_book_insert/'.$data->book_id)}}" method="post" >
                                        @csrf 
                                       
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Book Name</label>
                                                <input id="color" name="book_name" type="text" class="form-control"   value="{{$data->book_name}}">
                                            @error('book_name')
                                            <div class="alert alert-danger">
                                             {{$message}}
                                             </div>
                                            @enderror
                                            </div>

                                            <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class="form-control-label">Class Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="class_select" id="select" class="form-control">
                                    @foreach($class_data as $class_list)
                                    @if($class_list->id == $data->class_id)
                                    <option value="{{$class_list->id}}" selected >{{$class_list->c_name}}</option>
                                    @else
                                    <option value="{{$class_list->id}}">{{$class_list->c_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            @error('class_select')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                       
                                            
                             
                                            <div>
                                                <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="submit">
                                                 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
@endsection