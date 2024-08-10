<section class="blog_section inner-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="blog_section-title">Our <strong>Blog</strong></h1>
				
				<div class="row">
				@php foreach($blog_posts as $blog) { @endphp
				@php
					$datetimeString = $blog->created_at; // Example datetime string

					// Create a DateTime object from the datetime string
					$datetime = new DateTime($datetimeString);

					// Format the DateTime object to get only the date
					$date = $datetime->format('d, M, Y');
					
					$str1 = strip_tags($blog->description);
				@endphp
					<div class="col-lg-6 mb-4">
						<div class="blog">
					
						<a href="{{ url('/').'/blog/'.$blog->slug }}" class="img-holder"><img src="{{ URL::to('/').'/uploads/post/'.$blog->image }}" alt="{{ $blog->name }}" title="" class="img-responsive w-100">
						<div class="date"><i class="fa fa-calendar"></i> {{ $date }}</div>
						</a>
					
					
						<div class="blog_text">
							<h2><a href="{{ url('/').'/blog/'.$blog->slug }}">{{ $blog->name }}</a></h2>
							<p>{{ substr($str1, 0, 100).'...' }}</p>
						</div>
					</div>					
					</div>
				@php } @endphp
				</div>
				
			</div>
			
		</div>
	</div>
</section>