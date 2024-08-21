<!--sidebar wrapper -->
	<div class="sidebar-wrapper" data-simplebar="true">
		<div class="sidebar-header">
			@php
			if(isset($settings)) {
			@endphp
			<div>
				<img src="{{ URL::to('/') }}/public/uploads/settings/{{ $settings->logo_image }}" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">{{ $settings->title }}</h4>
			</div>
			@php
			}
			@endphp
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
			</div>
		 </div>
		<!--navigation-->
		<ul class="metismenu" id="menu">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					<div class="parent-icon"><i class='bx bx-home-alt'></i>
					</div>
					<div class="menu-title">Dashboard</div>
				</a>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">Enquiries</div>
				</a>
				<ul>
					<li> <a href="<?= route('admin.enquiry.list'); ?>"><i class='bx bx-radio-circle'></i>List</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">Posts</div>
				</a>
				<ul>
					<li> <a href="<?= route('admin.post.categoty.list'); ?>"><i class='bx bx-radio-circle'></i>Categories</a>
					</li>
					<li> <a href="<?= route('admin.post.list') ?>"><i class='bx bx-radio-circle'></i>List</a>
					</li>
					<li> <a href="<?= route('admin.post.add') ?>"><i class='bx bx-radio-circle'></i>Add</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">Pages</div>
				</a>
				<ul>
					<li> <a href="<?= route('admin.page.list'); ?>"><i class='bx bx-radio-circle'></i>List</a>
					</li>
					<li> <a href="<?= route('admin.page.create') ?>"><i class='bx bx-radio-circle'></i>Add</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">Areas</div>
				</a>
				<ul>
					<li> <a href="{{ route('admin.area.list') }}"><i class='bx bx-radio-circle'></i>List</a>
					</li>
					<li> <a href="{{ route('admin.area.create') }}"><i class='bx bx-radio-circle'></i>Add</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-cookie"></i>
					</div>
					<div class="menu-title">Media</div>
				</a>
				<ul>
					<li> <a href="{{ route('admin.media.create') }}"><i class='bx bx-radio-circle'></i>Add</a>
					</li>
					<li> <a href="{{ route('admin.media.list') }}"><i class='bx bx-radio-circle'></i>List</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-category"></i>
					</div>
					<div class="menu-title">Templates</div>
				</a>
				<ul>
					<li> <a href="<?= route('admin.template.list'); ?>"><i class='bx bx-radio-circle'></i>List</a>
					</li>
					<li> <a href="<?= route('admin.template.create') ?>"><i class='bx bx-radio-circle'></i>Add</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bx-cookie"></i>
					</div>
					<div class="menu-title">Appearence</div>
				</a>
				<ul>
					<li> <a href="<?= route('widget'); ?>"><i class='bx bx-radio-circle'></i>Widgets</a>
					</li>
				</ul>
			</li>
		</ul>
		<!--end navigation-->
	</div>
	<!--end sidebar wrapper -->