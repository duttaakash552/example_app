@extends('assets.frontend.layout')
@section('title','Blog Details')
@section('content')
<section class="inner-banner">
    <picture>
        <source srcset="{{  URL::to('/').'/public/uploads/post/'.$post->banner_image }}">
        <source srcset="{{  URL::to('/').'/public/uploads/post/'.$post->banner_image }}">
        <img src="{{  URL::to('/').'/public/uploads/post/'.$post->banner_image }}" alt="{{ $post->name }}" class="img-fluid inner-banner-img">
    </picture>
    <div class="inner-banner-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="caption1">blog</span>
                </div>
            </div>
        </div>
    </div>
</section>

@php
	$datetimeString = $post->created_at; // Example datetime string

	// Create a DateTime object from the datetime string
	$datetime = new DateTime($datetimeString);

	// Format the DateTime object to get only the date
	$date = $datetime->format('d, M, Y');
	
@endphp
<section class="blog_section inner-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-details-img">
                    <img src="{{  URL::to('/').'/public/uploads/post/'.$post->image }}"
                        alt="{{ $post->name }}" title=""
                        class="img-fluid">
                    <div class="date">{{ $date }}</div>
                </div>
                <h1 class="mt-4 mb-3">{{ $post->name }}</h1>
				<?= $processed_input ?>
            </div>
            
        </div>
    </div>
</section>
@endsection
