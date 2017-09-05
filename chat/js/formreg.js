jQuery(document).ready(function () {
        $("#formreg").submit(function(event){
        var name = $('#namereg').val();
	var nameval = $('#namereg');
	var pass = $('#passreg').val();
	var passval = $('#passreg');
	var alllog = $('.regstyle');
        var formlog = $("#formreg");
	var attention1 = $('.attention1');
        $.date = function(){
                return new Date().toLocaleTimeString();
	};
        var elements = {
        'border':'2px solid red'
        }
        if (name.length == 0 || pass.length == 0) {
		alllog.css("height","250px");
		if (name.length !== 0){
                        passval.css(elements);
                        attention1.append("Заполните поле").fadeIn(1000);
                }
                else if (pass.length !==0){
                        nameval.css(elements);
                        attention1.append("Заполните поле").fadeIn(1000);
                }
                else {
                nameval.css(elements);
		passval.css(elements);
                attention1.append("Заполните поля").fadeIn(1000);
		}
                setTimeout(function (){
			alllog.css("height","200px");
                	nameval.attr('style' , '');
			passval.attr('style' , '');
                	attention1.fadeOut(1000).html('');
                        }, 2000)
        }
	else if (name.length > 0 && pass.length > 0) {

        	$.ajax({
                	type: "POST",
                	url: 'register.php',
                	data: formlog.serialize(),
                	success: function (data) {
				attention1.fadeIn(1000).html(data);
				alllog.css("height","340px");
      			}
		});
	setTimeout (function () {
			var reg = jQuery("#reguser").html();
                      alllog.css("height","200px");
                        attention1.hide();
			if (reg.length > 0){
				window.location.replace('http://chat.smart-city.com.ua/login_add.php');
				jQuery("#namelog").val(name);
				jQuery("#passlog").val(pass);
				
			}
			else if (jQuery("#reguser").html() === undefined){
				return false;
			}
                }, 3000);
	}
});
})
