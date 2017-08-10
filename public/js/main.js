$(function () {
    $('.form-horizontal').parsley().on('field:validated', function () {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    }).on('form:submit', function () {

    });


    $('.form-horizontal').on('submit', function (e) {

        e.preventDefault();

        var $this = $(this);
        var button = $this.find(':submit');
	    button.button('loading');

        $('button').prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: $this.attr('action'),
            data: $this.serialize(),
            dataType: 'json',
            success: function (response) {
            	if(response.success) {
            		$('.alert-success').html(response.success).show();
            	} else {
            		$('.alert-danger').html(response.failure).show();
            	}
            },
            error:  function (response) {
            	$('.alert-danger').html('User creation failed - this email is taken.').show();
            }
        }).always(function () {
           	button.button('reset');
        });
        return false;
    });

});