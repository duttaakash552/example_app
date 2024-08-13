/*$(document).ready(function() {
	// Example using jQuery for simplicity
	$.ajax({
		url: './api/frontend/default-template/blog-content', // Replace with your Laravel route
		method: 'GET',
		success: function(response) {
			// Assuming 'response' contains the HTML content
			//froalaEditor.html.set(response);
			$('.blog_content').html(response.html);
		},
		error: function(xhr, status, error) {
			console.error('Error fetching blog content:', error);
		}
	});
});*/

$(document).ready(function() {
	var pageTitle = document.title;
	$(".page_title").val(pageTitle);
	
	let error = {key: '', message: ''};
	let is_valid = 0;
	
	var nameRegex = /^[A-Za-z]+(?:[\s\-'][A-Za-z]+)*$/;
	var specialCharsRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
	var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
	//var emailDotsCheckRegex = /^[^@]+@[^\.@]+\.[^\.@]+$/;
	var emailDotsCheckRegex = /^[^.@]+(\.[^.@]+)+@[^.]+\.[^.]+$/;
	//var checkSymbolRegex = /^[^~`\/@#$%^*]+$/;
	var checkSymbolRegex = /^[^~`\/@#$%^*\\]+$/;
	//var phoneRegex = /^(07|02|01|\+44)\d{8,11}$/; // This regex is for uk purpose
	var phoneRegex = /^(?:\+\d{2}\s?)?\d{9,13}$/; // This regex is for general purpose
	var htmlTagRegex = /<([a-zA-Z][^\s>]*)\s*[^>]*>(.*?)<\/\1\s*>/;
	var urlRegex = /(?:https?|ftp):\/\/[\w/\-?=%.]+\.[\w/\-?=%.]+/gi;
	
	$("#name").on('blur', function() {
		if($.trim($("#name").val()) == '') {
			error.key = 'name';
			error.message = 'Name is required';
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}else if(specialCharsRegex.test($.trim($("#name").val()))) {
			error.key = 'name';
			error.message = 'Name contains special characters';
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}else if(!nameRegex.test($.trim($("#name").val()))) {
			error.key = 'name';
			error.message = 'This is not a valid name';
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}else {
			$('.error_name').text('');
			$("#name").removeClass('error');
			is_valid = 0;
		}
	});
	
	$("#email").on('blur', function() {
		if($.trim($("#email").val()) == '') {
			error.key = 'email';
			error.message = 'Email is required';
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}else if(!emailRegex.test($.trim($("#email").val()))) {
			error.key = 'email';
			error.message = 'Email is not valid';
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}else if(emailDotsCheckRegex.test($.trim($("#email").val()))) {
			error.key = 'email';
			error.message = 'Email is not valid';
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}else {
			$('.error_email').text('');
			$("#email").removeClass('error');
			is_valid = 0;
		}
	});
	
	$("#phone").on('blur', function() {
		if($.trim($("#phone").val()) == '') {
			error.key = 'phone';
			error.message = 'Phone is required';
			$('.error_'+error.key).text(error.message);
			$("#phone").addClass('error');
		}else if (!phoneRegex.test($.trim($("#phone").val()))) {
			error.key = 'phone';
			error.message = 'Phone is not valid';
			$('.error_'+error.key).text(error.message);
			$("#phone").addClass('error');
		}else {
			$('.error_phone').text('');
			$("#phone").removeClass('error');
			is_valid = 0;
		}
	});
	
	$($("#message")).on('blur', function() {
		let trimmedStr = $.trim($("#message").val());
		let words = trimmedStr.split(/\s+/);
		if($.trim($("#message").val()) == '') {
			error.key = 'message';
			error.message = 'Message is required';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(words.length <= 1) {
			error.key = 'message';
			error.message = 'Message require more than 1 word';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(!checkSymbolRegex.test($("#message").val())) {
			error.key = 'message';
			error.message = 'Message contains special characters';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(htmlTagRegex.test($("#message").val())) {
			error.key = 'message';
			error.message = 'Message contains html tags';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(urlRegex.test($("#message").val())) {
			error.key = 'message';
			error.message = 'Message contains link';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else {
			$('.error_message').text('');
			$("#message").removeClass('error');
			is_valid = 0;
		}
	});
	
	$('.contact_btn').on('click', function() {
		let trimmedStr = $.trim($("#message").val());
		let words = trimmedStr.split(/\s+/);
		if($.trim($("#name").val()) == '') {
			is_valid = 1;
			error.key = 'name';
			error.message = 'Name is required';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}else if(specialCharsRegex.test($.trim($("#name").val()))) {
			is_valid = 1;
			error.key = 'name';
			error.message = 'Name contains special characters';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}else if(!nameRegex.test($.trim($("#name").val()))) {
			is_valid = 1;
			error.key = 'name';
			error.message = 'This is not a valid name';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#name").addClass('error');
		}
		
		if($.trim($("#email").val()) == '') {
			is_valid = 1;
			error.key = 'email';
			error.message = 'Email is required';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}else if(!emailRegex.test($.trim($("#email").val()))) {
			is_valid = 1;
			error.key = 'email';
			error.message = 'Email is not valid';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}else if(emailDotsCheckRegex.test($.trim($("#email").val()))) {
			is_valid = 1;
			error.key = 'email';
			error.message = 'Email is not valid';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#email").addClass('error');
		}
		
		if($.trim($("#phone").val()) == '') {
			is_valid = 1;
			error.key = 'phone';
			error.message = 'Phone is required';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#phone").addClass('error');
		}else if (!phoneRegex.test($.trim($("#phone").val()))) {
			is_valid = 1;
			error.key = 'phone';
			error.message = 'Phone is not valid';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#phone").addClass('error');
		}
		
		if($.trim($("#message").val()) == '') {
			is_valid = 1;
			error.key = 'message';
			error.message = 'Message is required';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(words.length <= 1) {
			is_valid = 1;
			error.key = 'message';
			error.message = 'Message require more than 1 word';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(!checkSymbolRegex.test($("#message").val())) {
			is_valid = 1;
			error.key = 'message';
			error.message = 'Message contains special characters';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(htmlTagRegex.test($("#message").val())) {
			is_valid = 1;
			error.key = 'message';
			error.message = 'Message contains html tags';
			//$('.error').text('');
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}else if(urlRegex.test($("#message").val())) {
			is_valid = 1;
			error.key = 'message';
			error.message = 'Message contains link';
			$('.error_'+error.key).text(error.message);
			$("#message").addClass('error');
		}
		
		/*else if (recaptchaResponse.length === 0) {
			is_valid = 1;
			error.key = 'captcha';
			error.message = 'Captcha is required';
			$('.error').text('');
		}*/
		/*else {
			$('.error_'+error.key).text('');
			is_valid = 0;
		}*/
		
		if(is_valid === 0) {
			error.key = '';
			error.message = '';
			
			$.ajax({
				method: 'post',
				url: './contact-form-submit',
				data: $("#contact-form").serialize(),
				beforeSend: function() {
					$('.contact_btn').attr("disabled", "true");
				},
				success: function(response) {
					if(response.status == true) {
						window.location.href = "./thank-you";
					}else {
						alert(response.danger);
					}
					console.log(response);
				}
			});
		}/*else {
			$('.error_'+error.key).text(error.message);
		}*/
	});
});

//This script is used to remove &nbsp; from line-block-two class
$(document).ready(function() {
	// Select the span with class name line-block-two
	var spanElement = $('.line-block-two');

	// Get the text content
	var textContent = spanElement.text();

	// Remove all spaces and &nbsp; using a regular expression
	var updatedContent = textContent.replace(/(&nbsp;|\s+)/g, '');

	// Set the updated content back to the span
	spanElement.text(updatedContent);
});

//This script is used to remove br tag from clearfix class
$(document).ready(function() {
	// Select the div with class name clearfix
	var divElement = $('.clearfix');

	// Find all <br> tags within the div and remove them
	divElement.find('br').remove();
});

//This script is used to convert strong to b tag with call-title strong class name
$(document).ready(function() {
	// Select the <strong> tag within the h3 with class "call-title"
	var strongTag = $(".call-title strong");

	// Create a new <b> tag
	var bTag = $("<b>").html(strongTag.html());

	// Replace the <strong> tag with the new <b> tag
	strongTag.replaceWith(bTag);
});

//This script is used for propper javascript:void(0) in href tag with test-readmore class name
$('.test-readmore').each(function() {
	// Get the current href attribute value
	var href = $(this).attr('href');
	
	// Decode the href attribute value to replace %3A with :
	var decodedHref = decodeURIComponent(href);
	
	// Update the href attribute with the decoded value
	$(this).attr('href', decodedHref);
});

$(document).ready(function() {
	// Find the <i> element with class 'fa-wordpress' inside '.cercle_item'
	$('.cercle_item i.fa-wordpress').removeClass('fa').addClass('fa-brands');
});

$(document).ready(function() {
	$('p[data-f-id="pbf"]').remove();
});

$(document).ready(function() {
	// Select all <img> tags within the editor
	$(document).find('img').each(function() {
		// Remove specific classes from the <img> tag
		$(this).removeClass('fr-fic fr-dii');
	});
});