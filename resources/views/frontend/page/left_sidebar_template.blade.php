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
<section class="inner-banner">
    <picture>
        <source srcset="{{ URL::to('/') }}/public/uploads/page/{{ $page->image }}">
        <source srcset="{{ URL::to('/') }}/public/uploads/page/{{ $page->image }}">
        <img src="{{ URL::to('/') }}/public/uploads/page/{{ $page->image }}" alt="{{ $page->title }}" class="img-fluid inner-banner-img">
    </picture>
    <div class="inner-banner-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="caption1"><?= !empty($banner_header) ? $banner_header->meta_value : $page->title ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-section">
    <div class="container">
        <div class="row flex-row-reverse">
           
            <div class="col-md-8">
                <div class="inner-section-content">
                    <h1>{{ $page->title }}</h1>
					<?= $processed_input ?>
                </div>
            </div>
            
			@include('frontend.page.left_bar')
			
        </div>
    </div>
</section>
@endsection