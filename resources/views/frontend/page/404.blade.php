@extends('assets.frontend.layout')
@php
if(isset($metadata) && !empty($metadata->title)) {
	$title = $metadata->title;
}else {
	$title = '404 page not found';
}
@endphp
@section('title',$title)
@section('content')
<section class="error-section">
    <div class="container">
        <img src="{{ URL::to('/') }}/public/assets/frontend/images/404.png" alt="404 Not Found" class="img-fluid">
        <h2>Oops! The Page you requested was not found!</h2>
        <a href="{{ route('home') }}" class="back_to_home"><i class="fa fa-home"></i>Back to Home</a>
    </div>
</section>
@endsection