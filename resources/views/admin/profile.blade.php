@extends('assets.admin.layout')
@section('title','Edit Profile')
@section('content')
	<link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<!--wrapper-->
	<div class="wrapper">
		@include('assets.admin.sidebar')
		@include('assets.admin.header')
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?= !empty($user->image) ? URL::to('/').'/public/uploads/'.$user->image: URL::to('/').'/public/assets/images/avatars/avatar-2.png'?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?= !empty($user->name) ? $user->name : '' ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										@if(Session::has('success_message'))
											<p class="alert alert-info">{{ Session::get('success_message') }}</p>
										@endif
										<form method="POST" action="<?= route('admin.update.profile') ?>" enctype="multipart/form-data">
											@csrf
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Full Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="name" value="<?= !empty($user->name) ? $user->name : '' ?>" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="email" class="form-control" name="email" value="<?= !empty($user->email) ? $user->email : '' ?>" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Roles</h6>
												</div>
												<?php
													$user_role = explode(",", $user->user_role);
												?>
												<div class="col-sm-9 text-secondary">
													<select class="form-select" multiple name="user_role[]" aria-label="multiple select example" required >
													  <option value="">Select Roles</option>
													  <?php foreach($roles as $role) { ?>
													  <option <?= in_array($role->id, $user_role) ? "selected" : "" ?> value="<?= $role->id ?>"><?= $role->role_name ?></option>
													  <?php } ?>
													</select>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Image</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="file" name="file" class="form-control" />
													<?= !empty($user->image) ? $user->image : '' ?>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">D.O.B</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control datepicker" name="dob" value="<?= !empty($user->dob) ? $user->dob : '' ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Company Name</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="company_name" value="<?= !empty($user->company_name) ? $user->company_name : '' ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Company Reg No.</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="company_regno" value="<?= !empty($user->company_regno) ? $user->company_regno : '' ?>" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3"></div>
												<div class="col-sm-9 text-secondary">
													<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
