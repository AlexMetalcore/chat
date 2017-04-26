jQuery(document).ready(function () {
	jQuery(this).on("click" ,".delete" , function (event) {
	jQuery(".overlay , .delmess").fadeIn(300);
	var comm = event.target.title;
        var name = event.target.id;
        var time = event.target.type;
	jQuery('.deletemess1').val(comm);
	jQuery('.deletemess2').val(name);
	jQuery('.deletemess3').val(time);
	});
	jQuery(this).on("click" , ".overlay , .messdel" , function () {
                jQuery(".overlay , .delmess").fadeOut(300);
		jQuery('.deletemess1').val('');
        	jQuery('.deletemess2').val('');
        	jQuery('.deletemess3').val('');
        });
});
