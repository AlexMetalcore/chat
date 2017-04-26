jQuery(document).ready(function () {
        $("#formreg").submit(function(event){
        var name = $('#namereg').val();
	var nameval = $('#namereg');
	var pass = $('#passreg').val();
	var passval = $('#passreg');
	var alllog = $('.regstyle');
        var formlog = $("#formreg");
	var attention = $('.attention');
        $.date = function(){
                return new Date().toLocaleTimeString();
	};
        var elements = {
        'border':'2px solid red'
        }
        if (name.length == 0 && pass.length == 0) {
		alllog.css("height","270px");
                nameval.fadeIn(500).css(elements);
		passval.fadeIn(500).css(elements);
                attention.fadeIn(500);
                setTimeout(function (){
			alllog.css("height","200px");
                	nameval.attr('style' , '');
			passval.attr('style' , '');
                	attention.hide();
                        }, 2000)
        }
	else if (name.length > 0 && pass.length > 0) {

        	$.ajax({
                	type: "POST",
                	url: 'register.php',
                	data: formlog.serialize(),
                	success: function (data) {
				attention.fadeIn(500).html(data);
				alllog.css("height","340px");
      			}
		});
	}
});
})
