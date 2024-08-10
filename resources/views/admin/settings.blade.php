@extends('assets.admin.layout')
@section('title','Edit Settings')
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
					<div class="breadcrumb-title pe-3">User Settings</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Settings</li>
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
											<img src="<?= !empty(auth()->user()->image) ? URL::to('/').'/public/uploads/'.auth()->user()->image : URL::to('/').'/assets/images/avatars/avatar-2.png'?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><?= !empty(auth()->user()->name) ? auth()->user()->name : '' ?></h4>
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
										<form method="POST" action="<?= route('admin.update.settings') ?>" enctype="multipart/form-data">
											@csrf
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Site Title</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="title" value="<?= !empty($user->title) ? $user->title : '' ?>" required />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Site Tagline</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="text" class="form-control" name="tag_line" value="<?= !empty($user->tag_line) ? $user->tag_line : '' ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Phone</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="phone" class="form-control" name="phone" value="<?= !empty($user->phone) ? $user->phone : '' ?>" required />
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
													<h6 class="mb-0">CC Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="email" class="form-control" name="cc_email" value="<?= !empty($user->cc_email) ? $user->cc_email : '' ?>" />
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">BCC Email</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="email" class="form-control" name="bcc_email" value="<?= !empty($user->bcc_email) ? $user->bcc_email : '' ?>" />
												</div>
											</div>
											<input type="hidden" name="add_remove_logo" class="add_remove_logo" value="0" />
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Upload a Logo</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="file" name="logo" class="form-control" />
												</div>
												<img src="<?= !empty($user->logo_image) ? URL::to('/').'/public/uploads/settings/'.$user->logo_image : '' ?>" class="logo_preview" />
												<input type="button" class="btn btn-danger px-4 remove_logo" value="Remove" />
											</div>
											<input type="hidden" name="add_remove_icon" class="add_remove_icon" value="0" />
											<div class="row mb-3">
												<div class="col-sm-3">
													<h6 class="mb-0">Upload a Fav Icon</h6>
												</div>
												<div class="col-sm-9 text-secondary">
													<input type="file" name="fav_icon" class="form-control" />
												</div>
												<img src="<?= !empty($user->fav_icon) ? URL::to('/').'/public/uploads/settings/'.$user->fav_icon : '' ?>" class="icon_preview" />
												<input type="button" class="btn btn-danger px-4 remove_icon" value="Remove" />
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
