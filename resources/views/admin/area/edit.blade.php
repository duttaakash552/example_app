@extends('assets.admin.layout')
@section('title','Edit Area')
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
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Area</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
								<a class="dropdown-item" href="<?= route('admin.area.list'); ?>">Go To List</a>
							</div>
						</div>
					</div>
				</div>
				<?php if($post->status != 'deleted') { ?>
				<div class="row">
					@if(Session::has('success_message'))
						<p class="alert alert-info">{{ Session::get('success_message') }}</p>
					@endif
                    <div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Edit Area</h5>
							</div>
							<div class="card-body p-4">
								<form id="jQueryValidationForm" method="post" action="<?= route('admin.area.update', $post->id); ?>" enctype="multipart/form-data">
									@csrf
									<div class="row mb-3">
										<label for="input35" class="col-sm-3 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input35" name="name" placeholder="Enter Post Name" value="<?= $post->name ?>" required>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input36" class="col-sm-3 col-form-label">Category</label>
										<div class="col-sm-9">
											<select class="form-select" multiple id="input36" name="category[]" required>
												<option disabled value="">Select Options</option>
												<?php foreach($categories as $c) { ?>
												<option value=<?= $c->id ?> <?= (in_array($c->id, $category_arr) ? 'selected' : '') ?>><?= $c->name ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<input type="hidden" name="add_remove_post_image" class="add_remove_post_image" value="0" />
									<div class="row mb-3">
										<label for="input37" class="col-sm-3 col-form-label">Upload Image</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="input37" name="image" >
										</div>
										<img src="<?= !empty($post->image) ? URL::to('/').'/public/uploads/post/'.$post->image : '' ?>" class="post_image_preview" />
										<input type="button" class="btn btn-danger px-4 remove_post_image" value="Remove" />
									</div>
									<input type="hidden" name="add_remove_post_banner_image" class="add_remove_post_banner_image" value="0" />
									<div class="row mb-3">
										<label for="input38" class="col-sm-3 col-form-label">Upload a Banner Image</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="input38" name="banner_image" >
										</div>
										<img src="<?= !empty($post->banner_image) ? URL::to('/').'/public/uploads/post/'.$post->banner_image : '' ?>" class="post_banner_image_preview" />
										<input type="button" class="btn btn-danger px-4 remove_post_banner_image" value="Remove" />
									</div>
									<div class="row mb-3">
										<?php
											$dt = new DateTime($post->created_at);
											$date = $dt->format('m-d-Y');
										?>
										<label for="" class="col-sm-3 col-form-label">Published Date</label>
										<div class="col-sm-9">
											<input id="datepicker" class="input-group form-control date" type="text" disabled name="published_date" data-date-format="mm-dd-yyyy" value="<?= $date ?>" />
											<span class="input-group-addon"> 
												<i class="glyphicon glyphicon-calendar"></i> 
											</span>
										</div>
									</div>
									<div class="row mb-3">
										<label for="editor" class="col-sm-3 col-form-label">Description</label>
										<div class="border rounded-4 text-center p-4 mb-4">
											<textarea id="editor" name="editor_content"><?= $post->description ?></textarea>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input39" class="col-sm-3 col-form-label">Status</label>
										<div class="col-sm-9">
											<select class="form-select" id="input39" name="status">
												<?php for($i = 0; $i < count($status); $i++) { ?>
												<option value=<?= $status[$i] ?> <?= (($post->status == $status[$i]) ? 'selected' : '') ?>><?= $status[$i] ?></option>
												<?php } ?>
											</select>
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
				<div class="row">
					@if(Session::has('success_field_message'))
						<p class="alert alert-info">{{ Session::get('success_field_message') }}</p>
					@endif
					<div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								Used Meta Keys: 
								@php
									$keys = [];
									foreach($custom_fields as $custom_field) {
										$keys[] = $custom_field->meta_key;
									}
									echo implode(', ', $keys);
								@endphp
								<h5 class="mb-0">Custom Fields</h5>
								<button class="btn btn-success add_meta_keys" style="float: right">Add</button>
							</div>
							<div class="card-body p-4 custom-fields">
								<input type="hidden" name="post_type" class="meta_post_type" value="post" />
								<input type="hidden" name="post_id" class="meta_post_id" value="{{ $post->id }}" />
								<?php foreach($custom_fields as $custom_field) { ?>
								<form method="post" action = "{{ route('admin.post.customfield') }}">
									@csrf
									<input type="hidden" name="id" value="{{ $custom_field->id }}" />
									<input type="hidden" name="post_type" class="meta_post_type" value="post" />
									<input type="hidden" name="post_id" class="meta_post_id" value="{{ $post->id }}" />
									<div class="row mb-3">
									<label for="" class="col-sm-3 col-form-label">Meta Key</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="" name="meta_key" value="{{ $custom_field->meta_key }}" required>
									</div>
									</div>
									<div class="row mb-3">
									<label for="" class="col-sm-3 col-form-label">Meta Value</label>
									<div class="col-sm-9">
									<textarea class="form-control" id="" name="meta_value" required>{{ $custom_field->meta_value }}</textarea>
									</div>
									</div>
									<div class="row">
									<label class="col-sm-3 col-form-label"></label>
									<div class="col-sm-9">
									<div class="d-md-flex d-grid align-items-center gap-3">
									<button type="submit" class="btn btn-primary px-4 meta_key_button">Submit</button>
									<button type="button" class="btn btn-danger px-4 remove_meta" data-id="{{ $custom_field->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
									</div>
									</div>
									</div>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					@if(Session::has('success_meta_message'))
						<p class="alert alert-info">{{ Session::get('success_meta_message') }}</p>
					@endif
					<div class="col-lg-8 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-3">
								<h5 class="mb-0">Meta Properties</h5>
							</div>
							<div class="card-body p-4">
								<form  id="jQueryValidationForm2" method="post" action="{{ route('admin.post.meta.update') }}">
									@csrf
									<input type="hidden" name="post_type" value="post" />
									<input type="hidden" name="post_id" value="{{ $post->id }}" />
									<div class="row mb-3">
										<label for="input15" class="col-sm-3 col-form-label">Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input15" name="title" value="{{ isset($categories_elements->title) ? $categories_elements->title : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input16" class="col-sm-3 col-form-label">Description</label>
										<div class="col-sm-9">
											<textarea class="form-control" id="input16" name="description">{{ isset($categories_elements->description) ? $categories_elements->description : '' }}</textarea>
										</div>
									</div>
									<div class="row mb-3">
										<label for="input17" class="col-sm-3 col-form-label">Keywords</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input17" name="keywords" value="{{ isset($categories_elements->keywords) ? $categories_elements->keywords : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input18" class="col-sm-3 col-form-label">Robots</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input18" name="robots" value="{{ isset($categories_elements->robots) ? $categories_elements->robots : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input19" class="col-sm-3 col-form-label">Revisit After</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input19" name="revisit_after" value="{{ isset($categories_elements->revisit_after) ? $categories_elements->revisit_after : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input20" class="col-sm-3 col-form-label">Og Locale</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input20" name="og_locale" value="{{ isset($categories_elements->og_locale) ? $categories_elements->og_locale : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input21" class="col-sm-3 col-form-label">Og Type</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input21" name="og_type" value="{{ isset($categories_elements->og_type) ? $categories_elements->og_type : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input22" class="col-sm-3 col-form-label">Og Image</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input22" name="og_image" value="{{ isset($categories_elements->og_image) ? $categories_elements->og_image : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input23" class="col-sm-3 col-form-label">Og Title</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input23" name="og_title" value="{{ isset($categories_elements->og_title) ? $categories_elements->og_title : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input24" class="col-sm-3 col-form-label">Og Url</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input24" name="og_url" value="{{ isset($categories_elements->og_url) ? $categories_elements->og_url : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input25" class="col-sm-3 col-form-label">Og Description</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input25" name="og_description" value="{{ isset($categories_elements->og_description) ? $categories_elements->og_description : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input26" class="col-sm-3 col-form-label">Og Site Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input26" name="og_site_name" value="{{ isset($categories_elements->og_site_name) ? $categories_elements->og_site_name : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input27" class="col-sm-3 col-form-label">Author</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input27" name="author" value="{{ isset($categories_elements->author) ? $categories_elements->author : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input28" class="col-sm-3 col-form-label">Canonical</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input28" name="canonical" value="{{ isset($categories_elements->canonical) ? $categories_elements->canonical : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input29" class="col-sm-3 col-form-label">Geo Region</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input29" name="geo_region" value="{{ isset($categories_elements->geo_region) ? $categories_elements->geo_region : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input30" class="col-sm-3 col-form-label">Geo Placename</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input30" name="geo_placename" value="{{ isset($categories_elements->geo_placename) ? $categories_elements->geo_placename : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input31" class="col-sm-3 col-form-label">Geo Position</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input31" name="geo_position" value="{{ isset($categories_elements->geo_position) ? $categories_elements->geo_position : '' }}">
										</div>
									</div>
									<div class="row mb-3">
										<label for="input32" class="col-sm-3 col-form-label">ICBM</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="input32" name="ICBM" value="{{ isset($categories_elements->ICBM) ? $categories_elements->ICBM : '' }}">
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
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Delete Custom Field</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<form method="post" action="{{ route('admin.remove.customfield') }}">
								@csrf
								<input type="hidden" class="post_meta_id" name="meta_id" value="" />
								<div class="modal-body">Are you sure you want to delete?</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Yes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php }else { ?>
					<p>This post is already deleted</p>
				<?php } ?>

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