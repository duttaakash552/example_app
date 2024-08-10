@extends('assets.admin.layout')
@section('title','Area List')
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
			<div class="breadcrumb-title pe-3">Area</div>
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
					<a class="btn btn-primary" href="<?= route('admin.area.create') ?>">Add</a>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->
		<h6 class="mb-0 text-uppercase">DataTable Import</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<?php $i = 0; ?>
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Categories</th>
								<th>Status</th>
								<th>Image</th>
								<th>Author</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($posts as $post) { ?>
						<?php $i++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $post->name ?></td>
								<td><?= $post->slug ?></td>
								<td>
									<?php foreach($categories as $category) {
										$category_arr = explode(",", $post->category);
										echo (in_array($category->id, $category_arr)) ? $category->name . "<br>" : '';
									} ?>
								</td>
								<td><?= $post->status ?></td>
								<td>
								<img src="<?= !empty($post->image) ? URL::to('/').'/public/uploads/post/'.$post->image : URL::to('/').'/assets/images/Image_not_available.png'?>" class="user-img" alt="post">
								</td>
								<td><?= $post->author ?></td>
								<td>
									<a href="<?= route('admin.area.edit', $post->id) ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Categories</th>
								<th>Status</th>
								<th>Image</th>
								<th>Author</th>
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
</div>
<!--end page wrapper -->
@endsection
