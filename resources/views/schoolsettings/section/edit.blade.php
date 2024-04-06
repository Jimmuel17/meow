@extends('layouts.master')
@section('breadcrumbs')
<div class="d-flex align-items-center flex-wrap mr-2">
	<!--begin::Page Title-->
	<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">School Settings</h5>
	<!--end::Page Title-->
	<!--begin::Actions-->
	<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	<span class="text-muted font-weight-bold mr-4">Edit Section</span>
	<a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
	<!--end::Actions-->
    </div>
    @endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Section</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('section.update',['section'=>$item->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="level_id">
                                    <option disabled>Please Select an Item</option>
                                    @foreach($levels as $level)
                                    <option {{($level->id==$item->level_id) ? 'selected="selected"' : '' }} value="{{$level->id}}">{{$level->desc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Section</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" value="{{$item->title}}" placeholder="Enter Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="desc" id="descTextarea1" rows="4"  placeholder="Enter Description">{{$item->desc}}</textarea>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-light" href="{{route('section.index')}}">Cancel</a>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
@section('script')
@endsection
