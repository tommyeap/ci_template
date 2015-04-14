$(document).ready(function() {
	$.validator.setDefaults({
	    highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error');
	    },
	    errorElement: 'span',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});

	$("#logForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 6,
				maxlength: 20
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 20
			}
		},
		messages: {
			username: {
				required: 'Please fills your username',
				minlength: 'Minimum character length is 6',
				maxlength: 'Maximum character length is 20'
			},
			password: {
				required: 'Please fills your password',
				minlength: 'Minimum character length is 6',
				maxlength: 'Maximum character length is 20'
			}
		}
	});

	$("#regForm").validate({
		rules: {
			username: {
				required: true,
				minlength: 6,
				maxlength: 20
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 20
			},
			email: {
				required: true,
				email: true,
				maxlength:100
			}
		},
		messages: {
			username: {
				required: 'Please fills your username',
				minlength: 'Minimum character length is 6',
				maxlength: 'Maximum character length is 20'
			},
			password: {
				required: 'Please fills your password',
				minlength: 'Minimum character length is 6',
				maxlength: 'Maximum character length is 20'
			},
			email: {
				required: 'Please fills your email',
				email: 'Invalid Email Format',
				maxlength: 'Maximum character length is 100'
			}
		}
	});
});