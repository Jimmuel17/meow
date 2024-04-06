@extends('layouts.master')
@section('breadcrumbs')
<div class="d-flex align-items-center flex-wrap mr-2">
	<!--begin::Page Title-->
	<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Access Control</h5>
	<!--end::Page Title-->
	<!--begin::Actions-->
	<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	<span class="text-muted font-weight-bold mr-4">Edit Roles</span>
	<a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
	<!--end::Actions-->
    </div>
    @endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('role.update',['role'=>$item->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name"  class="form-control" id="startyear" value="{{$item->name}}" placeholder="Enter name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Permissions</label>
                            <div class="col-sm-9">
                                <select name="permissions[]" id="permissions" class="form-control form-control-lg select2" multiple>
                                    <option disabled="disabled">Select an item</option>
                                    @foreach($permissions as $permission)
                                        <option {{ $item->hasPermissionTo($permission->name) ? 'selected' : '' }} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-light" href="{{route('role.index')}}">Cancel</a>
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
<script>
    $(document).ready(function() {
    $('#permissions').select2();
});
</script>
@endsection
