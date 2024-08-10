@extends('assets.admin.layout')
@section('title','Enquiry Details')
@section('content')
	<!--wrapper-->
	<?php
		$status = ['active', 'inactive', 'deleted'];
	?>
	<div class="wrapper">
		@include('assets.admin.sidebar')
		@include('assets.admin.header')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Enquiries</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Enquiry Details</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<a class="dropdown-item" href="<?= route('admin.enquiry.list'); ?>">Go To List</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Enquiry Details</h5>
							</div>
							<div class="card-body p-4">
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Name</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="name" value="<?= isset($enquiry_details->name) ? $enquiry_details->name : '' ?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Email</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="email" value="<?= isset($enquiry_details->email) ? $enquiry_details->email : '' ?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Phone</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="phone" value="<?= isset($enquiry_details->phone) ? $enquiry_details->phone : '' ?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Message</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="message"><?= isset($enquiry_details->message) ? $enquiry_details->message : '' ?></textarea>
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Enquiry Type</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="enquiry_type" value="<?= isset($enquiry_details->enquiry_type) ? $enquiry_details->enquiry_type : '' ?>">
									</div>
								</div>
								<div class="row mb-3">
									<label class="col-sm-3 col-form-label">Enquiry Date</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="enquiry_date" value="<?= isset($enquiry_details->created_at) ? $date_only = date('d-M-Y', strtotime($enquiry_details->created_at)) : '' ?>">
									</div>
								</div>
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