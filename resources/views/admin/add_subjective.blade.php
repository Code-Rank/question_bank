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
        <div class="col-lg-12">
            <div class="card" id="sectionattr_1">
                <div class="card-header">
                  <div class="btn btn-success">
                      <button type="button" onclick="addsection()" style="color: white;"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Subjective Question</h3>
                    </div>
                    <hr />
                    <form action="{{url('admin/subjective/insert_subjective')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1"> Question</label>
                            <textarea id="color" name="Question_eng[]" type="text" class="form-control"></textarea>
                            @error('Question_eng')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="col-lg-12">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:سوال</label>
                            <textarea id="color" name="Question_urdu[]" type="text" class="form-control"></textarea>
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
                                <select name="question_type[]" id="select" class="form-control">
                                    <option value="LQ">LQ</option>
                                    <option value="SQ">SQ</option>
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
                            jQuery(document).ready(function () {
                                jQuery("#class_select").change(function () {
                                    let class_id = jQuery(this).val();
                                    jQuery("#book_select").html('<option value="">Select book</option>');
                                    jQuery.ajax({
                                        url: "/admin/subjective/getbook",
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
                                        url: "/admin/subjective/getchapter",
                                        type: "get",
                                        data: "book_id=" + book_id + "&_token={{csrf_token()}}",
                                        success: function (result) {
                                            jQuery("#chapter_select").html(result);
                                        },
                                    });
                                });
                            });

                            var counter = 1;
                            function addsection() {
                                counter++;
                                box='<div class="card" id="sectionattr_' + counter + '">';
                                box+='<div class="card-header">';
                                box += '<div class="btn btn-danger">';
                                box += '<button type="button" onclick=remove_section("' + counter + '") style="color:white;">';
                                box += '<i class="fa fa-close" aria-hidden="true"></i> close';
                                box += "</button>";
                                box += "</div>";
                                box+='</div>';
                                box+='<div class="card-body">';
                                box+='<div class="card-title">';
                                box+='<h3 class="text-center title-2">Question "'+counter+'"</h3>';
                                box+='</div>';
                                box+='<hr />';
       

                               box+='<div class="form-group">';
                               box+='<label for="cc-payment" class="control-label mb-1"> Question</label>';
                               box+='<textarea id="color" name="Question_eng[]" type="text" class="form-control"></textarea>';
                               box+='@error("Question_eng")';
                               box+='<div class="alert alert-danger">';
                               box+='{{$message}}';
                               box+='</div>';
                               box+='@enderror';
                               box+='</div>';
                               box+='<div class="form-group">';
                               box+='<label for="cc-payment" class="control-label mb-1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:سوال</label>';
                               box+='<textarea id="color" name="Question_urdu[]" type="text" class="form-control"></textarea>';
                               box+='@error("Question_urdu")';
                               box+='<div class="alert alert-danger">';
                               box+='{{$message}}';
                               box+='</div>';
                               box+='@enderror';
                               box+='</div>';

                              box+='<div class="row form-group">';
                              box+='<div class="col col-md-12">';
                              box+='<label for="select" class="form-control-label">Question type</label>';
                              box+='</div>';
                              box+='<div class="col-12 col-md-12">';
                              box+='<select name="question_type[]" id="select" class="form-control">';
                              box+='<option value="LQ">LQ</option>';
                              box+='<option value="SQ">SQ</option>';
                              box+='</select>';
                              box+='</div>';
                              box+=' @error("question_type")';
                              box+='<div class="alert alert-danger">';
                              box+='{{$message}}';
                              box+='</div>';
                              box+='@enderror';
                              box+='</div>';
       
                              box+='</div>';
                              box+='</div>';


                                jQuery("#mainsection").append(box);
                            }

                            function remove_section(counter) {
                                jQuery("#sectionattr_" + counter).remove();
                            }
                        </script>
                        <div id="mainsection">

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
