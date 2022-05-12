@extends('admin/home')
@section('title','Add class ')
@section('contain')
<div class="container-fluid">
@if(session()->has('message'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Success</span>
											{{session('message')}}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
                            @endif
                        <div class="row">
                       
                            <div class="col-lg-6">
                          
                                <div class="card">
                                    <div class="card-header"><a href="{{url('admin/group')}}">Back</a></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Add Group</h3>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/group/insert_group')}}" method="post" >
                                        @csrf 
                                       
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1"> Group Name</label>
                                                <input id="color" name="group_name" type="text" class="form-control"   >
                                            @error('group_name')
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