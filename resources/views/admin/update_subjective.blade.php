@extends('admin/home') @section('title','Add Objective Question ') @section('contain')
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
                <div class="card-header"><a href="{{url('admin/question_subjective')}}">Back</a></div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Update Subjective Question</h3>
                    </div>
                    <hr />
                    <form action="{{url('admin/question_subjective/update_subjective_insert/'.$data->id)}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1"> Question</label>
                            <textarea id="color" name="Question_eng" type="text" class="form-control">{{$data->question_eng}}</textarea>
                            @error('Question_eng')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:سوال</label>
                            <textarea id="color" name="Question_urdu" type="text" class="form-control">{{$data->question_urdu}}</textarea>
                            @error('Question_urdu')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <label for="select" class="form-control-label">Question type</label>
                            </div>
                            <div class="col-12 col-md-12">
                                <select name="question_type" id="select" class="form-control">
                                   @if($data->question_type=='LQ')
                                    <option value="LQ" selected>LQ</option>
                                    <option value="SQ">SQ</option>
                                    @endif
                                    @if($data->question_type=='SQ')
                                    <option value="SQ" selected>SQ</option>
                                    <option value="LQ">LQ</option>
                                    @endif
                                   
                                </select>
                            </div>
                            @error('question_type')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="select" class="form-control-label">Class</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <select name="class_select" id="class_select" class="form-control">
                                <option value="">Select class</option>
                               @foreach($class as $list)
                               <option value="{{$list->id}}">{{$list->c_name}}</option>
                               @endforeach
                                </select>
                                
                            </div>
                            @error('class_select')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        


                        
                            <div class="col col-md-2">
                                <label for="select" class="form-control-label">Book</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <select name="book_select" id="book_select" class="form-control">
                                <option value="">Select book</option>
                                  
                                </select>
                                
                            </div>
                            @error('class_select')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        

                        
                            <div class="col col-md-2">
                                <label for="select" class="form-control-label">Chapter</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <select name="chapter_select" id="chapter_select" class="form-control">
                                <option value="">Select chapter</option>
                                
                                </select>
                                
                            </div>
                            @error('class_select')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror

                           
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                            
                            <script>
            jQuery(document).ready(function(){
                jQuery('#class_select').change(function(){
                    let class_id=jQuery(this).val();
                    jQuery('#book_select').html('<option value="">Select book</option>')
                    jQuery.ajax({
                        url:'/admin/subjective/getbook',
                        type:'post',
                        data:'class_id='+class_id+'&_token={{csrf_token()}}',
                        success:function(result){
                            jQuery('#book_select').html(result)
                        }
                    });
                });
                
                
                
            });
    
    
            jQuery(document).ready(function(){
                jQuery('#book_select').change(function(){
                    let book_id=jQuery(this).val();
                    jQuery('#chapter_select').html('<option value="">Select chapter</option>')
                    jQuery.ajax({
                        url:'/admin/subjective/getchapter',
                        type:'get',
                        data:'book_id='+book_id+'&_token={{csrf_token()}}',
                        success:function(result){
                            jQuery('#chapter_select').html(result)
                        }
                    });
                });
                
                
                
            });
                
            </script>


                        <div>
                            <input id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" value="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
    </div>
</div>
