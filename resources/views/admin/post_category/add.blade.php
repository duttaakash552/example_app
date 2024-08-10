@extends('assets.admin.layout')
@section('title','Add Category')
@section('content')
	<!--wrapper-->
	<div class="wrapper">
		@include('assets.admin.sidebar')
		@include('assets.admin.header')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Category</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<a class="dropdown-item" href="<?= route('admin.post.categoty.list'); ?>">Go To List</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					@if(Session::has('success_message'))
						<p class="alert alert-info">{{ Session::get('success_message') }}</p>
					@endif
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Add Category</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post" action="<?= route('admin.post.categoty.insert'); ?>" enctype="multipart/form-data">
									@csrf
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Category Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="name" placeholder="Enter Category Name" required>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Select Parent Category</label>
										<div class="col-sm-9">
											<select class="form-select" id="input36" name="parent_id">
												<option selected value="">Choose...</option>
												<?php foreach($records as $record) { ?>
													<option value="<?= $record->id ?>"><?= $record->name ?></option>
												<?php } ?>
											  </select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input50" class="col-sm-3 col-form-label">Select Category Type</label>
										<div class="col-sm-9">
											<select class="form-select" id="input50" name="category_type" required>
												<option selected value="">Choose...</option>
												<option value="post">Post</option>
												<option value="area">Area</option>
											</select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Upload Image</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="input37" name="file" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="input38" class="col-sm-3 col-form-label">Description</label>
										<div class="border rounded-4 text-center p-4 mb-4">
											<textarea id="editor" name="editor_content"></textarea>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<div class="d-md-flex d-grid align-items-center gap-3">
												<button type="submit" class="btn btn-primary px-4" name="submit2">Submit</button>
												<button type="reset" class="btn btn-light px-4">Reset</button>
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
				<!--end row-->


			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('assets.admin.footer')
	</div>
	<!--end wrapper-->
@endsection