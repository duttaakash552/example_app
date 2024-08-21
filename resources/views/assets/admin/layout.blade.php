<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	@php
	if(isset($settings)) {
	@endphp
	<link rel="icon" href="{{ URL::to('/') }}/public/uploads/settings/{{ $settings->fav_icon }}" type="image/png"/>
	@php
	}
	@endphp
	<!--plugins-->
	<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
	<link href="<?= URL::to('/'); ?>/public/assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="<?= URL::to('/'); ?>/public/assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<!--<link href="/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />-->
	<link href="<?= URL::to('/'); ?>/public/assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= URL::to('/'); ?>/public/assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<link href="<?= URL::to('/'); ?>/public/assets/admin/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= URL::to('/'); ?>/public/assets/admin/css/pace.min.css" rel="stylesheet"/>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= URL::to('/'); ?>/public/assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= URL::to('/'); ?>/public/assets/admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= URL::to('/'); ?>/public/assets/admin/css/app.css" rel="stylesheet">
	<link href="<?= URL::to('/'); ?>/public/assets/admin/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/admin/css/dark-theme.css"/>
	<link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/admin/css/semi-dark.css"/>
	<link rel="stylesheet" href="<?= URL::to('/'); ?>/public/assets/admin/css/header-colors.css"/>
	<!-- Froala Editor Stylesheet-->
	<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>@yield('title')</title>
</head>

<body>
@yield('content')
<!-- search modal -->
    <div class="modal" id="SearchModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		  <div class="modal-content">
			<div class="modal-header gap-2">
			  <div class="position-relative popup-search w-100">
				<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
				<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
			  </div>
			  <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
				   <p class="mb-1">Html Templates</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Web Designe Company</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Software Development</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
				   </div>
				   <p class="mb-1 mt-3">Online Shoping Portals</p>
				   <div class="list-group">
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
					  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
				   </div>
				</div>
			</div>
		  </div>
		</div>
	</div>
    <!-- end search modal -->




	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?= URL::to('/'); ?>/public/assets/admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= URL::to('/'); ?>/public/assets/admin/js/jquery.min.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?= URL::to('/'); ?>/public/assets/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<script>
        $(".datepicker").flatpickr();
		$(".date-time").flatpickr({
			enableTime: true,
			dateFormat: "Y-m-d H:i",
		});
    </script>
	<!--custom JS-->
	<script src="<?= URL::to('/'); ?>/public/assets/admin/js/custom.js"></script>
	<!--app JS-->
	<script src="<?= URL::to('/'); ?>/public/assets/admin/js/app.js"></script>
	<!-- Froala Editor JS-->
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
    <script>
        // init Froala Editor
        //new FroalaEditor('#editor');
		
		new FroalaEditor('#editor', {

          htmlAllowedTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'picture', 'div', 'span', 'img', 'hr', 'br', 'section', 'ul', 'li', 'a', 'iframe' , 'i', 'b', 'u', 'table', 'tr', 'td', 'th', 'strong', 'em', 'blockquote', 'code', 'pre', 'button', 'input', 'header']

        });
		
    </script>
	<script>
		function dragOverHandler(event) {
			event.preventDefault();
			event.dataTransfer.dropEffect = 'copy';
			document.getElementById('drop_zone').style.border = '2px dashed #1abc9c';
		}

		function dropHandler(event) {
			event.preventDefault();
			var arr = [];
			document.getElementById('drop_zone').style.border = '2px dashed #ccc';
			const files = event.dataTransfer.files;
			var fileInput = document.getElementById('fileInput');
			fileInput.files = files;
			
			for (let i = 0; i < files.length; i++) {
				uploadFile(files[i]);
			}
		}

		function previewImages(event) {
			const files = event.target.files;
			for (let i = 0; i < files.length; i++) {
				uploadFile(files[i]);
			}
		}

		function uploadFile(file) {
			const reader = new FileReader();
			$('#image_preview').text('');
			reader.onload = function(event) {
				const imgElement = document.createElement('img');
				imgElement.src = event.target.result;
				imgElement.style.maxWidth = '100%';
				imgElement.style.maxHeight = '200px';
				document.getElementById('image_preview').appendChild(imgElement);
				document.getElementById('image_preview').style.display = 'block'; // Show image preview
			};
			reader.readAsDataURL(file);
		}
		
		$('#input15').on('input', function() {
			var data = $('#input15').val();
			$('#input23').val(data);
		});
		
		$('#input16').on('input', function() {
			var data = $('#input16').val();
			$('#input25').val(data);
		});
	</script>
</body>

</html>