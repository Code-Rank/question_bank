@extends('admin/home') @section('title','generator test ') @section('contain')


<div class="container-fluid">
    @if(session()->has('message_update_suc') || session()->has('message_delete_suc'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success"></span>
        {{session('message_update_suc')}} {{session('message_delete_suc')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif @if(session()->has('message_update_unsuc')|| session()->has('message_delete_unsuc'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger"></span>
        {{session('message_update_unsuc')}} {{session('message_delete_unsuc')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

   
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><a href="{{url('admin/genearator')}}">Back</a></div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Update Class</h3>
                    </div>
                    <hr />
                    <form action="{{url('admin/generator_test')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="select" class="form-control-label">Class</label>
                                </div>
                                <div class="col-12 col-md-12">
                                    <select name="class_select" id="class_select" class="form-control">
                                        <option value="">Select class</option>
                                        @foreach($data as $list)
                                        <option value="{{$list->id}}">{{$list->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('class_select')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                                <div class="col col-md-12">
                                    <label for="select" class="form-control-label">Book</label>
                                </div>
                                <div class="col-12 col-md-12">
                                    <select name="book_select" id="book_select" class="form-control">
                                        <option value="">Select book</option>
                                    </select>
                                </div>
                                @error('class_select')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                                <div class="col col-md-12">
                                    <label for="select" class="form-control-label">Chapter</label>
                                </div>
                                <div class="col-12 col-md-12">
                                    <select name="chapter_select[]" id="chapter_select" class="form-control" multiple>
                                        <option value="" type>Select chapter</option>
                                      
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
                                jQuery(document).ready(function () {
                                    jQuery("#class_select").change(function () {
                                        let class_id = jQuery(this).val();
                                        jQuery("#book_select").html('<option value="">Select book</option>');
                                        jQuery.ajax({
                                            url: "/admin/generate/getbook",
                                            type: "post",
                                            data: "class_id=" + class_id + "&_token={{csrf_token()}}",
                                            success: function (result) {
                                                jQuery("#book_select").html(result);
                                            },
                                        });
                                    });
                                });
                                
                               
                                 jQuery(document).ready(function () {
                                   
                                    jQuery("#book_select").change(function () {
                                        let book_id = jQuery(this).val();
                                       
                                        jQuery("#chapter_select").html('<option value="">Select chapter</option>');
                                        jQuery.ajax({
                                            url: "/admin/generate/getchapter",
                                            type: "get",
                                            data: "book_id=" + book_id + "&_token={{csrf_token()}}",
                                            success: function (result) {

                                                jQuery("#chapter_select").html(result);

                                            },
                                        });
                                    });
                                }); 

                                
 
                                  


                            </script>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-8"> MCQ amount</label>
                                <input id="color" name="objective_question" type="text" class="form-control" />
                                @error('objective_question')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1"> Short Question amount</label>
                                <input id="color" name="s_question" type="text" class="form-control" />
                                @error('s_question')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">short question marks </label>
                            <input id="color" name="marks_short_question" type="text" class="form-control" />
                            @error('marks_short_question')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">long Question amount</label>
                            <input id="color" name="l_question" type="text" class="form-control" />
                            @error('l_question')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1"> long question marks</label>
                            <input id="color" name="marks_long_question" type="text" class="form-control" />
                            @error('marks_long_question')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                     




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
