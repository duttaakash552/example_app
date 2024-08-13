<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
	    // Check if the connection is secure (HTTPS)
        $isSecure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';

        // Determine the protocol
        $protocol = $isSecure ? 'https' : 'http';
        
		$currentURL = "$protocol://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	@endphp
	
	@php
		if (isset($settings)) {
	@endphp
	<link rel="icon" href="{{URL::to('/')}}/public/uploads/settings/{{$settings->fav_icon}}" type="image/png">
	@php
		}
	@endphp
	<title>@yield('title')</title>
	@php
		if (isset($metadata) && !empty($metadata->description)) {
	@endphp
	<meta name="description" content="{{ $metadata->description }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->keywords)) {
	@endphp
	<meta name="keywords" content="{{ $metadata->keywords }}">
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->robots)) {
	@endphp
	<meta name="robots" content="{{ $metadata->robots }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->revisit_after)) {
	@endphp
	<meta name="revisit-after" content="{{ $metadata->revisit_after }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->og_locale)) {
	@endphp
	<meta property="og:locale" content="{{ $metadata->og_locale }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->og_type)) {
	@endphp
	<meta property="og:type" content="{{ $metadata->og_type }}" />
	@php
		}
	@endphp
	<?php
	if (isset($post) && !empty($post->banner_image)) {
		?>
		<meta property="og:image" content="{{  URL::to('/') . '/public/uploads/post/' . $post->banner_image }}" />
		<?php
	} else if (isset($metadata) && !empty($metadata->og_image)) {
	?>
	<meta property="og:image" content="{{ $metadata->og_image }}" />
	<?php
	}
	?>
	@php
		if (isset($metadata) && !empty($metadata->og_title)) {
	@endphp
	<meta property="og:title" content="{{ $metadata->og_title }}" />
	@php
		}
	@endphp
	<meta property="og:url" content="{{ $currentURL }}" />
	@php
		if (isset($metadata) && !empty($metadata->og_description)) {
	@endphp
	<meta property="og:description" content="{{ $metadata->og_description }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->og_site_name)) {
	@endphp
	<meta property="og:site_name" content="{{ $metadata->og_site_name }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->ICBM)) {
	@endphp
	<meta name="ICBM" content="{{ $metadata->ICBM }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->geo_region)) {
	@endphp
	<meta name="geo.region" content="{{ $metadata->geo_region }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->geo_placename)) {
	@endphp
	<meta name="geo.placename" content="{{ $metadata->geo_placename }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->geo_position)) {
	@endphp
	<meta name="geo.position" content="{{ $metadata->geo_position }}" />
	@php
		}
	@endphp
	@php
		if (isset($metadata) && !empty($metadata->author)) {
	@endphp
	<meta name="author" content="{{ $metadata->author }}" />
	@php
		}
	@endphp
	<link rel="canonical" href="{{ $currentURL }}" />
	
	<link rel="icon" type="image/x-icon" href="<?= URL::to('/').'/public/uploads/settings/'.$settings->fav_icon ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/frontend/css/slimmenu.min.css">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/frontend/css/style.css">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/frontend/css/responsive.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>
<header>
<div class="sticky-header fixed-header">
	<div class="desktop_sticky">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-8">
					<div class="phone-num">
						<i class="fa fa-phone"></i>
						<span class="phone_no"><a href="tel:020 37457523">020 37457523</a></span>
					</div>
				</div>
				<div class="col-md-6 col-sm-4">
					<div class="appoinment appoinment_fixed">
						<span><a href="#" data-bs-toggle="modal" data-bs-target="#appoinment_modal"
								data-backdrop="static" data-keyboard="false" class="iframe-btn"><img
									src="<?= URL::to('/'); ?>/public/assets/frontend/images/appoinment.png" alt="appoinment"> Book an
								appointment</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile_sticky">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="phone-num">
						<a href="tel:02037457523">Tap to call</a>
					</div>
				</div>
				<div class="col-6">
					<div class="appoinment appoinment_fixed">
						<a href="#" data-bs-toggle="modal" data-bs-target="#appoinment_modal" data-backdrop="static"
							data-keyboard="false" class="iframe-btn">Tap to Book</a>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<div class="mobile-sticky d-none">
	<a href="tel:02037457523" class="sticky_button"> Call Now</a>
	<a class="sticky_button iframe-btn" rel="noopener noreferrer" href="#" data-bs-toggle="modal"
		data-bs-target="#appoinment_modal" data-backdrop="static" data-keyboard="false">Book an Appointment</a>
</div>

<div class="mobile_top">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<a href="tel:02037457523" class="btn mobile_icon"><img src="<?= URL::to('/'); ?>/public/assets/frontend/images/header-phone-icon.png"
						alt="phone"></a>

			</div>
			<div class="col-6 last-child">
				<a target="_blank" class=" btn patient_login theme-btn"
					href="https://londonmedicalclinic.co.uk/medicalexpressclinic/patient/login">Patient Login</a>

			</div>
			<div class="col-12">

				<a href="#" data-bs-toggle="modal" data-bs-target="#appoinment_modal" data-backdrop="static"
					data-keyboard="false" class="btn call-btn iframe-btn">Book Online</a>
				<ul class="timing">
					<li>Monday - Friday<br><span>9:00 - 18:00</span></li>
					<li>Saturday - Sunday<br>
						<span>10:00 - 14:00</span>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>

<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 p_0">
				<div class="header-top-single mobile_contact">
					<ul class="contact list-unstyled ">
						<li><a href="tel:020 37457523">
								<img src="<?= URL::to('/'); ?>/public/assets/frontend/images/phone-icon.png" alt="phone">020 37457523</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-2 col-sm-12 p_0 text-center">
				<div class="header-top-single">
					<a target="_blank" class=" btn patient_login theme-btn"
						href="https://londonmedicalclinic.co.uk/medicalexpressclinic/patient/login">Patient
						Login</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-7 col-sm-12 p_0">
				<div class="header-top-single">
					<ul class="timing">
						<li>Monday - Friday<br><span>9:00 - 18:00</span></li>
						<li>Saturday - Sunday<br>
							<span>10:00 - 14:00</span>
						</li>
					</ul>
					<div class="header-top-single-inner">
						<a href="#" data-bs-toggle="modal" data-bs-target="#appoinment_modal" data-backdrop="static"
							data-keyboard="false" class="header-appointment iframe-btn"><img
								src="<?= URL::to('/'); ?>/public/assets/frontend/images/appoinment.png" alt="appoinment"> Book Appointment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="header-middle">
	<div class="container">
		<a class="navbar-brand" href="<?= route('home') ?>"><img src="<?= URL::to('/').'/public/uploads/settings/'.$settings->logo_image ?>" class="img-fluid"
				alt="STD Check Clinic"></a>

		<ul class="slimmenu" id="navigation">
			<?php for($i = 0; $i < count($array_key); $i++) { ?>
					<?php if(isset($menu[$array_key[$i]]['parent_page_slug'])) { ?>
						<li class="<?= (count($menu[$array_key[$i]]) > 2) ? 'mega-menu' : '' ?>">
							<?php if($menu[$array_key[$i]]['disable_link'] == 0) { ?>
							<a href="<?= URL::to('/') ?>/<?= $menu[$array_key[$i]]['parent_page_slug'] ?>"><?= $array_key[$i] ?></a>
							<?php }else { ?>
							<a href="javascript:void(0)"><?= $array_key[$i] ?></a>	
							<?php } ?>
							<?php if(count($menu[$array_key[$i]]) > 2) { ?>
							<ul>
								<?php foreach ($menu[$array_key[$i]] as $key => $value) { ?>
									<?php if (is_array($value)) { ?>
										<li class="has-menu">
											<?php if($value['disable_link'] == 0) { ?>
											<a href="<?= URL::to('/') ?>/<?= $value['sub_page_slug'] ?>"><?= $value['sub_page_title'] ?></a>
											<?php }else { ?>
											<a href="javascript:void(0)"><?= $value['sub_page_title'] ?></a>
											<?php } ?>
											<?php foreach($mega_menu as $key => $mega) { ?>
											<?php if($value['sub_page_title'] == $key) { ?>
											<ul>
											<?php foreach($mega_menu[$key] as $sub_key => $sub_menu) { ?>
											<li>
											<?php if($sub_menu['disable_link'] == 0) { ?>
											<a href="<?= $sub_menu['sub_page_slug'] ?>"><?= $sub_menu['sub_page_title'] ?></a>
											<?php }else { ?>
											<a href="javascript:void(0)"><?= $sub_menu['sub_page_title'] ?></a>
											<?php } ?>
											</li>
											<?php } ?>
											</ul>
											<?php } } ?>
										</li>
									<?php } ?>
								<?php } ?>
							</ul>
							<span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
							<?php } ?>
						</li>
					<?php } ?>
				<?php } ?>
			<!--<li class="has-submenu">  
				<a href="#">STI and STD Tests</a>
				<ul>
					<li><a href="#">Chlamydia</a></li>
					<li><a href="#">Gonorrhoea</a></li>
					<li><a href="#">Syphilis</a></li>
					<li><a href="#">HIV</a></li>
					<li class="has-submenu">
						<a href="#">Hepatitis</a>
						<ul>
							<li><a href="#">Hepatitis B</a></li>
							<li><a href="#">Hepatitis C</a></li>
						</ul>
						<span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
					</li>
					<li><a href="#">Genital Herpes</a></li>
					<li><a href="#">Genital Warts</a></li>
					<li><a href="#">Trichomoniasis</a></li>
					<li><a href="#">Scabies</a></li>
					<li><a href="#">Vaginal Thrush</a></li>
					<li><a href="#">Cystitis</a></li>
				</ul>
				<span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
			</li>



			<li><a href="#">Anonymous STD Tests</a></li>
			<li><a href="#">STD Testing Packages</a></li>
			<li><a href="#">Fees</a></li>
			<li><a href="#">STD Blood Test</a></li>-->
			<li><a href="<?= route('contact') ?>">Contact Us</a></li>

		</ul>
	</div>
</div>

<div class="header-menu">
	<div class="container">
		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand" href="<?= route('home') ?>"><img src="<?= URL::to('/').'/public/uploads/settings/'.$settings->logo_image ?>" class="img-fluid"
					alt="STD Check Clinic"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav navbar-right">
					<li class="iconp"><a href="#">STD Testing
							<br>Packages</a>
					</li>
					<li class="icon"><a href="#">HIV <br>Testing</a>
					</li>
					<li class="icon2"><a href="#">Chlamydia <br>
							Testing</a>
					</li>
					<li class="icon3"><a href="#">Syphilis
							<br>Testing</a>
					</li>
					<li class="icon4"><a href="#">Herpes <br>Testing</a>
					</li>
					<li class="icon5"><a href="#">Gonorrhoea
							<br>Testing</a>
					</li>
					<li class="icon6"><a href="#">Hepatitis
							<br>Testing</a>
					</li>
					<li class="icon7"><a href="#">HPV <br>Testing</a>
					</li>
				</ul>

			</div>
		</nav>
	</div>
</div>
</header>
@yield('content')
<footer class="mt-4">
    <div class="container">
        <div class="footer-top">
            <div class="footer-top-single">
                <img src="<?= URL::to('/'); ?>/public/assets/frontend/images/logo.png" alt="STD Check Clinic" class="footer_logo">
            </div>

            <div class="footer-top-single">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#appoinment_modal"
                    data-backdrop="static" data-keyboard="false">Book Appointment</a>
            </div>
            <div class="footer-top-single">
                <a href="https://www.stdcheck.london/privacy-policy">Privacy Policy</a>
            </div>
            <div class="footer-top-single">
                <a href="https://www.stdcheck.london/terms-and-condition">Terms &amp; Condition</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="footer-logo-single text-center">
                        <img src="<?= URL::to('/'); ?>/public/assets/frontend/images/cqc-logon.png" class="footer_logo img-fluid" alt="CQC Logo">
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="footer-text">
                        <p class="mb-2">The clinic is registered with the Care Quality Commission to provide a range
                            of regulated medical activities, <br>including family planning, treatment of diseases,
                            surgical, diagnostic and screening procedures.</p>
                        <p>All doctors working at the clinic are registered with the General Medical Council, and
                            all of our specialists are Consultants in their fields, on the specialist register of
                            the GMC. </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <ul>
                        <li><a href="https://www.stdcheck.london">Home</a></li>
                        <li><a href="https://www.stdcheck.london/meet-the-team">Our Team</a></li>
                        <li><a href="https://www.stdcheck.london/fees">Fees</a></li>
                        <li><a href="https://www.stdcheck.london/blog">Blog</a></li>
                        <li><a href="https://www.stdcheck.london/contact">Contact</a></li>
                    </ul>
                    <ul class="social-network social-circle">
                        <li><a href="https://www.instagram.com/stdchecklondon/" class="icoinstagram" title="Instagram"
                                target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/STD-Check-London-2205478386407653" class="icoFacebook"
                                title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-8">
                    <p>Suite 1, 117A Harley St, Marylebone, London W1G 6AT, UK Copyright © {{ date('Y') }} STD Check London</p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="modal fade" id="appoinment_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe src="https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/" width="100%" height="750px">
            </iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="bronze-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-101" src="" width="100%"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="silver-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-102" src=""
                width="100%"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="gold-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-103" src=""
                width="100%"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="platinium-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-104" src=""
                width="100%"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="blood-urine-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-105" src=""
                width="100%"></iframe>
        </div>
    </div>
</div>

<div class="modal fade" id="blood-swab-modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>

            <iframe height="750px" id="iframe-106"
                src="?p=blood_sample_and_urine_or_swab" width="100%"></iframe>
        </div>
    </div>
</div>

<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/jquery-3.5.1.min.js"></script>
<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/bootstrap.bundle.min.js"></script>
<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/jquery.slimmenu.min.js"></script>
<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/jquery.validate.js"></script>
<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/popper.min.js"></script>
<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/main.js"></script>


<script type="text/javascript">


    $('#navigation').slimmenu(
        {
            resizeWidth: '767',
            collapserTitle: '',
            animSpeed: 'medium',
            easingEffect: null,
            indentChildren: false,
            childrenIndenter: '&nbsp;',
            collapseIcon: '<i class="fa fa-chevron-up"></i>'
        });

</script>

<script type="text/javascript">
    $(".iframe-btn").click(function () {
        $('#std_modal').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/');
        $('#pcr_modal').attr('src', 'https://travelpcrtest.com/std');
        $('#iframe-101').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/?p=bronze');
        $('#iframe-102').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/?p=silver');
        $('#iframe-103').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/?p=gold');
        $('#iframe-104').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/?p=platinium');
        $('#iframe-105').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/?p=blood_sample_and_urine');
        $('#iframe-106').attr('src', 'https://londonmedicalclinic.co.uk/medicalexpressclinic/book/std/');

    });
</script>

<script src="<?= URL::to('/'); ?>/public/assets/frontend/js/custom.js"></script>

</body>

</html>