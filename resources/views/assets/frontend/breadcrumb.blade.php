<ul class="breadcrumb">
	<?php
		$i = 0;
		foreach ($urlParts as $key => $part) {
			$name = ucwords(str_replace('-', ' ', $part));
			if ($i != count($urlParts) - 1) {
				if($i == 0) {
	?>
				<li><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i> home</a></li>
				<?php }else { ?>
				<li><a href="../{{ $part }}"> {{$name}}</a></li>
				<?php } }else { ?>
				<li><a href="javascript:void(0)" class="active"> {{$name}}</a></li>
			<?php } ?>
	<?php $i++; } ?>
</ul>