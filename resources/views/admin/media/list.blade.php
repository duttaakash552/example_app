@extends('assets.admin.layout')
@section('title','Image List')
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
			<div class="breadcrumb-title pe-3">Media</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?= route('admin.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Data Table</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="btn-group">
					<a class="btn btn-primary" href="<?= route('admin.media.create') ?>">Add</a>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->
		<h6 class="mb-0 text-uppercase">DataTable Import</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				@if(Session::has('success_message'))
					<p class="alert alert-info">{{ Session::get('success_message') }}</p>
				@endif
				<div class="table-responsive">
					<?php $i = 0; ?>
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Uploaded By</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($medias as $media) { ?>
						<?php $i++; ?>
							<tr>
								<td>{{ $i }}</td>
								<td><img src="{{ URL::to('/').'/public/uploads/media/'.$media->image }}" class="user-img" alt="media" /></td>
								<td>{{ $media->name }}</td>
								<td>
									<button class="btn copy-media" data-link="{{ URL::to('/').'/public/uploads/media/'.$media->image }}">Copy</button>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-danger remove-media" data-id="{{ $media->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Uploaded By</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	@include('assets.admin.footer')
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<form id="uploadForm" method="POST" action="<?= route('admin.media.remove') ?>">
			@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Media</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<input type="hidden" name="id" class="remove-media-yes" value="" />
				<div class="modal-body">Are you sure you want to delete this?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<!--end page wrapper -->
@endsection
