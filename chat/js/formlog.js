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
        if (name.length == 0 || pass.length == 0) {
		alllog.css("height","190px");
		if (name.length !== 0){
			passval.fadeIn(1000).css(elements);
			attention.append("Заполните поле").fadeIn(1000);
		}
		else if (pass.length !==0){
			nameval.fadeIn(1000).css(elements);
			attention.append("Заполните поле").fadeIn(1000);
		}
		else {
		nameval.fadeIn(1000).css(elements);
                passval.fadeIn(1000).css(elements);
                attention.append("Заполните поля").fadeIn(1000);
		}
                setTimeout(function (){
			alllog.css("height","140px");
                	nameval.attr('style' , '');
			passval.attr('style' , '');
                	attention.fadeOut(1000).html('');
                        }, 2000)
        }
	else if (name.length > 0 && pass.length > 0) {

        	$.ajax({
                	type: "POST",
                	url: 'login.php',
                	data: formlog.serialize(),
                	success: function (data) {
				attention.fadeIn(1000).html(data);
				alllog.fadeIn(1000).css("height","210px");
      			}
		});
		setTimeout (function () {
			alllog.css("height","140px");
			attention.hide();
			if (jQuery("#usersesion").html() != null){
			window.location.replace('http://chat.smart-city.com.ua');
			}
		}, 3000);
	}
});
})
