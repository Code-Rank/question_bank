@extends('admin/home')
@section('title','Add class ')
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
                                    <div class="card-header"><a href="{{url('admin/classes')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Class</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/classes/update_class_insert/'.$data->id)}}" method="post" >
                                        @csrf 
                                       
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Class Name</label>
                                                <input id="color" name="class_name" type="text" class="form-control"   value="{{$data->c_name}}">
                                            @error('class_name')
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