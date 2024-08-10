@extends('assets.admin.layout')
@section('title','Category List')
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
			<div class="breadcrumb-title pe-3">Category</div>
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
					<a class="btn btn-primary" href="<?= route('admin.post.categoty.add') ?>">Add</a>
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
								<th>Tree</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($data as $d) { ?>
						<?php $i++; ?>
							<tr>
								<td><?= $i ?></td>
								<td><?= $d->category ?></td>
								<td><?= $d->slug ?></td>
								<td><?= !empty($d->parent) ? $d->parent : $d->category ?></td>
								<td><a href="<?= route('admin.post.categoty.edit', $d->id) ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Slug</th>
								<th>Tree</th>
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
