@extends('assets.admin.layout')
@section('title','Dashboard')
@section('content')
<!--wrapper-->
<div class="wrapper">
	@include('assets.admin.sidebar')
	@include('assets.admin.header')
	<div class="page-wrapper">
		<div class="page-content">
			<p>Dashboard</p>
		</div>
	</div>
	@include('assets.admin.footer')
</div>
<!--end wrapper-->
@endsection
