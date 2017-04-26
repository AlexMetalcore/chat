jQuery(document).ready(function () {
	jQuery('#messagedel').on("click" , ".messyes" , function (event) {
        //jQuery('#messagedel').submit(function (event) {
		var form = jQuery('#messagedel');
		var messecho = jQuery('#echomessage');
		var mess = jQuery('.overlay , .delmess');
		jQuery.ajax({
		type: 'POST',
		url: 'delete.php',
		data: form.serialize(),
		success: function(data) {
		jQuery('.delmess').css("height" , "160px");
		messecho.html(data);
		setTimeout(function () {
			mess.fadeOut(500);
			//jQuery('.delmess').css("height" , "100px");
		}, 500)
                messecho.html(function () {
			setTimeout(function () {
                          messecho.html('');
                          jQuery('.delmess').css("height" , "100px");
                        }, 1500)
		});
		},
		error: function (jqXHR, text, error) {
		messecho.html(error);
		}		
		});
})
});
