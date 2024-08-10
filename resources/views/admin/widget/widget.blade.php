@extends('assets.admin.layout')
@section('title','Widget')
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
					<div class="breadcrumb-title pe-3">Appearence</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Widgets</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success add-widget">Add</button>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Widgets</h5>
						<hr/>
						@if(Session::has('success_message'))
							<p class="alert alert-info">{{ Session::get('success_message') }}</p>
						@endif
						<div class="accordion" id="accordionExample">
							<?php 
								$i = 1;
								foreach($widgets as $widget) {
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading<?= $i ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapse<?= $i ?>">
										{{ $widget->title }}
									</button>
								</h2>
								<div id="collapse<?= $i ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?= $i ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<form class="row g-3" method="post" action="{{ route('insert.widget') }}">
											@csrf
											<div class="col-md-12">
												<label for="input3" class="form-label">Title</label>
												<input type="text" class="form-control" id="input3" name="title" value='{{ $widget->title }}' placeholder="Enter Title">
											</div>
											<div class="col-md-12">
												<label for="input4" class="form-label">Description</label>
												<input type="text" class="form-control" id="input4" name="description" value='{{ $widget->description }}' placeholder="Enter Description">
											</div>
											<div class="col-md-12">
												<label for="input11" class="form-label">Content</label>
												<textarea class="form-control" id="input11" name="content" placeholder="Enter Content" rows="3">{{ $widget->content }}</textarea>
											</div>
											<input type="hidden" value="{{$widget->id}}" name="id" />
											<div class="col-md-12">
												<div class="d-md-flex d-grid align-items-center gap-3">
													<button type="submit" class="btn btn-primary px-4">Submit</button>
													<button type="button" class="btn btn-danger px-4 delete-widget" data-id="{{ $widget->id }}" >Delete</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<?php $i++; } ?>
						</div>
					</div>
				</div>
			</div>
			<!--end page content -->
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		@include('assets.admin.footer')
	</div>
	<!--end wrapper-->
	<div class="modal" id="myModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Add Widget</h5>
		  </div>
		  <div class="modal-body">
			<form class="row g-3" method="post" action="{{ route('insert.widget') }}">
				@csrf
				<div class="col-md-12">
					<label for="input3" class="form-label">Title</label>
					<input type="text" class="form-control" id="input3" name="title" value='' placeholder="Enter Title" required>
				</div>
				<div class="col-md-12">
					<label for="input4" class="form-label">Description</label>
					<input type="text" class="form-control" id="input4" name="description" value='' placeholder="Enter Description" required>
				</div>
				<div class="col-md-12">
					<label for="input11" class="form-label">Content</label>
					<textarea class="form-control" id="input11" name="content" placeholder="Enter Content" rows="3" required></textarea>
				</div>
				<div class="col-md-12">
					<div class="d-md-flex d-grid align-items-center gap-3">
						<button type="submit" class="btn btn-primary px-4">Submit</button>
						<button type="button" class="btn btn-danger px-4 widget-modal-close">close</button>
					</div>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Delete Widget?</h5>
		  </div>
		  <div class="modal-body">
			<form class="row g-3" method="post" action="{{ route('remove.widget') }}">
				@csrf
				<p>Are you sure you want to delete this widget?</p>
				<input type="hidden" value="{{isset($widget->id) ? $widget->id : 0}}" class="widget_id" name="id" />
				<div class="col-md-12">
					<div class="d-md-flex d-grid align-items-center gap-3">
						<button type="submit" class="btn btn-primary px-4">Yes</button>
						<button type="button" class="btn btn-danger px-4 widget-modal-close">Cancel</button>
					</div>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
@endsection