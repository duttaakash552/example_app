@extends('assets.frontend.layout')
@php
if(isset($metadata) && !empty($metadata->title)) {
	$title = $metadata->title;
}else {
	$title = !empty($page->title) ? $page->title : 'STDCheck';
}
@endphp
@section('title', $title)
@section('content')
<section class="error-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="thakyou">
					<?= $processed_input ?>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection