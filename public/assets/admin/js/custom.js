$('.remove_logo').on('click', function () {
	$('.add_remove_logo').val(1);
	$('.logo_preview').remove();
});

$('.remove_icon').on('click', function () {
	$('.add_remove_icon').val(1);
	$('.icon_preview').remove();
});

$('.remove_category_image').on('click', function () {
	$('.add_remove_category_image').val(1);
	$('.category_image_preview').remove();
});

$('.remove_post_image').on('click', function () {
	$('.add_remove_post_image').val(1);
	$('.post_image_preview').remove();
});

$('.remove_post_banner_image').on('click', function () {
	$('.add_remove_post_banner_image').val(1);
	$('.post_banner_image_preview').remove();
});

$('.remove_page_image').on('click', function () {
	$('.add_remove_page_image').val(1);
	$('.page_image_preview').remove();
});

$('.add-widget').on('click', function() {
	$('#myModal').modal('show');
});

$('.widget-modal-close').on('click', function() {
	$('#myModal').modal('hide');
	$('#deleteModal').modal('hide');
});

$('.delete-widget').on('click', function() {
	let widgetID = $(this).data('id');
	$('.widget_id').val(widgetID);
	$('#deleteModal').modal('show');
});

$('.copy-media').on('click', function() {
	var copyText = $(this).data('link');

	// Copy the text inside the text field
	navigator.clipboard.writeText(copyText);

	// Alert the copied text
	alert("Copied to the clipboard");
});

$('.remove-media').on('click', function() {
	var id = $(this).data('id');
	$('.remove-media-yes').val(id);
});

let count = 0;
$('.add_meta_keys').on('click', function() {
	count++;
	let data = '';
	data += '<div class="row mb-3">';
	data += '<label for="" class="col-sm-3 col-form-label">Meta Key</label>';
	data += '<div class="col-sm-9">';
	data += '<input type="text" class="form-control meta_key'+count+'" id="" name="meta_key" value="">';
	data += '</div>';
	data += '</div>';
	data += '<div class="row mb-3">';
	data += '<label for="" class="col-sm-3 col-form-label">Meta Value</label>';
	data += '<div class="col-sm-9">';
	data += '<textarea class="form-control meta_value'+count+'" id="" name="meta_value"></textarea>';
	data += '</div>';
	data += '</div>';
	data += '<div class="row">';
	data += '<label class="col-sm-3 col-form-label"></label>';
	data += '<div class="col-sm-9">';
	data += '<div class="d-md-flex d-grid align-items-center gap-3">';
	data += '<button type="button" class="btn btn-primary px-4 meta_key_button" data-count="'+count+'">Submit</button>';
	data += '</div>';
	data += '</div>';
	data += '</div>';
	$('.custom-fields').append(data);
});

$(document).on('click', '.meta_key_button', function() {
	let i = $(this).data('count');
	let meta_key = $('.meta_key'+i).val();
	let meta_value = $('.meta_value'+i).val();
	let meta_post_type = $('.meta_post_type').val();
	let meta_post_id = $('.meta_post_id').val();
	if((meta_key != '') || meta_value != '') {
		$.ajax({
			url: '../../post-meta/update',
			data: {
				"post_type": meta_post_type,
				"post_id": meta_post_id,
				"meta_key": meta_key,
				"meta_value": meta_value
			},
			success: function(response) {
				var data = JSON.parse(response); // Parse JSON string to JavaScript object
				alert(data.message);
			}
		});
	}else {
		alert('Meta key & Meta description is required field');
	}
});

$('.remove_meta').on('click', function() {
	let id = $(this).data('id');
	$('.post_meta_id').val(id);
});
