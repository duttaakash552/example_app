@extends('assets.admin.layout')
@section('title','Add Post')
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
								<li class="breadcrumb-item active" aria-current="page">Add Post</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<a class="dropdown-item" href="<?= route('admin.post.list'); ?>">Go To List</a>
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
								<h5 class="mb-0">Add Post</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post" action="<?= route('admin.post.insert'); ?>" enctype="multipart/form-data">
									@csrf
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="name" placeholder="Enter Post Name" required>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Category</label>
										<div class="col-sm-9">
											<select class="form-select" multiple id="input36" name="category[]" required>
												<option selected disabled value="">Select Options</option>
												<?php foreach($categories as $c) { ?>
												<option value=<?= $c->id ?>><?= $c->name ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Upload Image</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="input37" name="image" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="input38" class="col-sm-3 col-form-label">Upload a Banner Image</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="input38" name="banner_image" >
										</div>
									</div>
									<div class="row mb-3">
										<label for="" class="col-sm-3 col-form-label">Published Date</label>
										<div class="col-sm-9">
											<input type="text" class="form-control date-time" name="published_date" />
										</div>
									</div>
									<div class="row mb-3">
										<label for="editor" class="col-sm-3 col-form-label">Description</label>
										<div class="border rounded-4 p-4 mb-4">
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