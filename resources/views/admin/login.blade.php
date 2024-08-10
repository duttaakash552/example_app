@extends('assets.admin.auth_layout')
@section('title','Admin Login')
@section('content')
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									@php
									if(isset($settings)) {
									@endphp
									<div class="mb-3 text-center">
										<img src="{{ URL::to('/') }}/public/uploads/settings/{{ $settings->logo_image }}" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">{{ $settings->title }}</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									@php
									}
									@endphp
									<div class="form-body">
										@if(Session::has('success_message'))
											<p class="alert alert-info">{{ Session::get('success_message') }}</p>
										@endif
										<form class="" method="post" action="<?= route('admin.authentication'); ?>">
											@csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : '' ?>" placeholder="jhon@example.com" required>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" value="<?php echo isset($_COOKIE["password"]) ? $_COOKIE["password"] : '' ?>" id="inputChoosePassword" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" name="rememberme" value="1" id="flexSwitchCheckChecked" <?php echo isset($_COOKIE["remember"]) ? 'checked' : '' ?>>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="auth-basic-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
@endsection