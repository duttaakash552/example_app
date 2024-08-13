<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <style>
    
  </style>
</head>


<body>

  <table style="{{ $style->meta_value }}">
    <tr>
      <td style="margin: 0 auto;vertical-align: baseline;text-align: center;">
        <a href="#"><img src="{{ URL::to('/') }}/public/uploads/settings/{{ $settings->logo_image }}" alt="" style="width:230px; filter: invert(1) brightness(100);"></a>         
      </td>
    </tr>
    <tr style="margin:20px 0; display: block;">
      <td style="display:block; text-align: center;">
        <p style="text-align: center;margin: 0;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 26px; font-weight: 700;">Welcome to {{ $settings->title }}</p>
      </td>
    </tr>



    <tr style="margin:20px 0; display:block;">
      <td style="display:block;">
        <p style="margin: 0 0 10px;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 20px; font-weight: 500;">Hello User,</p>
      </td>
      <td style="display:block;">
        <p style="margin: 0;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 18px; font-weight: 400;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
      </td>
    </tr>
	@foreach ($details as $key => $value)
		@if ($key != '_token')
			<tr style="margin:10px 0; display:block; border: 1px solid #fff;">
			  <td style="width: 28%; display: inline-block; color: #fff;font-family: 'Open Sans', sans-serif; vertical-align: text-top; padding:8px 10px; font-size:18px; font-weight: 500;">
				{{ ucfirst(str_replace('_', ' ', $key)) }}: 
			  </td>
			  @if (is_array($value))
				@php
					$count = count($value);
				@endphp
				<td style="width: 63%; line-height: 1.5; display: inline-block; color: #fff;font-family: 'Open Sans', sans-serif; vertical-align: text-top; padding:8px 10px; font-size:16px; border-left: 1px solid #fff; font-weight: 400;">
					@foreach ($value as $index => $item)
						{{ $item }}@if ($index < $count - 1), @endif
					@endforeach
				</td>
			  @else
				<td style="width: 63%; line-height: 1.5; display: inline-block; color: #fff;font-family: 'Open Sans', sans-serif; vertical-align: text-top; padding:8px 10px; font-size:16px; border-left: 1px solid #fff; font-weight: 400;">
					{{ $value }}
				</td>
			</tr>
			@endif
		@endif
	@endforeach
     <tr>
      <td style="background: url(images/footer_bg.png); background-repeat: no-repeat; margin:0 auto; width: 326px;height: 110px; background-position: center;">
        <p style="margin: 0;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 16px; font-weight: 600;padding-top: 20px; padding-bottom: 10px;">Best Regards,</p>
        <p style="margin: 0;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 16px; font-weight: 400;">Team {{ $settings->title }}</p>
        <a href="{{ URL::to('/') }}" target="_blank" style="margin: 0;font-family: 'Open Sans', sans-serif; color: #fff; font-size: 16px; font-weight: 400;">{{ URL::to('/') }}</a>
      </td>
    </tr>


  </table>

</body>


</html>
