@extends('layouts.master')
@section('breadcrumbs')
<div class="d-flex align-items-center flex-wrap mr-2">
	<!--begin::Page Title-->
	<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">School Settings</h5>
	<!--end::Page Title-->
	<!--begin::Actions-->
	<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	<span class="text-muted font-weight-bold mr-4">School Year</span>
	<a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">Add New</a>
	<!--end::Actions-->
    </div>
    @endsection
@section('content')

    <div class="row">
    <div class="bg-white rounded p-10">
	<!--begin::Card-->
		<div class="card card-custom card-fit card-border">
        <div class="card-header">
		<div class="card-title">
			<span class="card-icon">
				<i class="flaticon2-pin text-primary"></i>
				</span>
				<h3 class="card-label">School Year
			
			</div>
				<div class="card-toolbar">
				<a href="{{ route('schoolyear.create') }}" class="btn btn-sm btn-primary font-weight-bold">
					<i class="flaticon2-plus-1"></i>Add new</a>
					</div>
					</div>
						<div class="card-body pt-2">Prepare for an amazing academic year packed with excitement and discovery. From thrilling experiments to fascinating debates, we will immerse ourselves in a world of learning that will pique your interest and fuel your passion. Accept the challenges, let your imagination run wild, and let's make this a memorable year! Let's work together to win this academic year!</div>
						</div>
				<!--end::Card-->
						</div>    



        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="get" class="forms-sample m-0 p-0" action="{{ route('schoolyear.index') }}">
                                <input type="text" value="{{ $searchTerm }}" class="form-control" name="search" placeholder="Search....">
                            </form>
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <a type="button" class="btn btn-success" href="{{ route('schoolyear.create') }}">Add School Year</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-striped project-orders-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>School Year</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach ($items as $item)
                                    <tr id="row{{ $item->id }}">
                                        <td>{{ $num }}</td>
                                        <td>{{ $item->startyear . ' - ' . $item->endyear }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td>
                                            <a href="{{ route('schoolyear.edit', ['schoolyear' => $item->id]) }}">
                                                <button class="btn btn-sm btn-success"><i class="flaticon2-pen"></i></button>
                                            </a>
                                            <button class="btn btn-sm btn-danger btndelete" data-url="{{ route('schoolyear.destroy', ['schoolyear' => $item->id]) }}" data-id="{{ $item->id }}">
                                                <i class="flaticon2-rubbish-bin"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }} <!-- Pagination links -->
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
@endsection
@section('script')
    @if(session('function'))
        @if(session('function') == 'store')
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School Year successfully Saved",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @else
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "School Year successfully Updated",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif

        <?php session()->forget('function'); ?>
    @endif
@endsection
