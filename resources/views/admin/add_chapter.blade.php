@extends('admin/home') 
@section('title','Add  chapter ')
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
                <div class="card-header"><a href="{{url('admin/chapter')}}">Back</a></div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Add Chapter</h3>
                    </div>
                    <hr />
                    <form action="{{url('admin/chapter/insert_chapter')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1"> Chapter No</label>
                            <input id="color" name="chapter_no" type="text" class="form-control" />
                            @error('chapter_no')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Chapter Name</label>
                            <input id="color" name="chapter_name" type="text" class="form-control" />
                            @error('chapter_name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class="form-control-label">Book Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="book_select" id="select" class="form-control">
                                    @foreach($book_data as $book_list)
                                    <option value="{{$book_list->book_id}}">{{$book_list->book_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('book_select')
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