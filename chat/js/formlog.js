jQuery(document).ready(function () {
        $("#formlog").submit(function(event){
        var name = $('#namelog').val();
	var nameval = $('#namelog');
	var pass = $('#passlog').val();
	var passval = $('#passlog');
	var alllog = $('.logstyle');
        var formlog = $("#formlog");
	var attention = $('.attention');
        $.date = function(){
                return new Date().toLocaleTimeString();
	};
        var elements = {
        'border':'2px solid red'
        }
        if (name.length == 0 && pass.length == 0) {
		alllog.css("height","190px");
                nameval.fadeIn(500).css(elements);
		passval.fadeIn(500).css(elements);
                attention.fadeIn(500);
                setTimeout(function (){
			alllog.css("height","140px");
                	nameval.attr('style' , '');
			passval.attr('style' , '');
                	attention.hide();
                        }, 2000)
        }
	else if (name.length > 0 && pass.length > 0) {

        	$.ajax({
                	type: "POST",
                	url: 'login.php',
                	data: formlog.serialize(),
                	success: function (data) {
				attention.fadeIn(500).html(data);
				alllog.css("height","210px");
      			}
		});
		setTimeout (function () {
			if (jQuery("#usersesion").html() != null){
			window.location.replace('http://chat.smart-city.com.ua');
			}
		}, 5000);
	}
});
})
