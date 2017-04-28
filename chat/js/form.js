$(document).ready(function () {
        $("#formcomment").on("keydown" , function(event) {
	if (event.keyCode == 13) {
        var textval = $('#comment').val();
	var text = $('#comment');
        var formNm = $("#formcomment");
	//var mess = $('#textmessage');
	var printmess = $('#messageprint');
	var error = $('.errortext2');
        $.date = function(){
                return new Date().toLocaleTimeString();
        };
        var elements = {
        'border':'2px solid red'
        }
        if (textval.length == 0) {
                text.fadeIn(1000).css(elements);
                error.fadeIn(1000);
                setTimeout(function (){
                	text.attr('style' , '');
                	error.fadeOut(1000);
                        }, 2000)
		event.preventDefault();
                }
	else if (textval.length > 0){
        	printmess.fadeIn(500);
        	$.ajax({
                	type: "POST",
                	url: 'message.php',
                	data: formNm.serialize(),
                	success: function (data) {
				//mess.fadeIn(500).html(data);
                		text.val('');
				//mess.css("display" , "block");
        		}
        	});
	}
	setTimeout (function () {
		//mess.fadeOut(200);
		printmess.fadeOut(300);
	}, 500);
}
}).submit(function(event) {
        var textval = $('#comment').val();
        var text = $('#comment');
        var formNm = $("#formcomment");
        //var mess = $('#textmessage');
        var printmess = $('#messageprint');
        var error = $('.errortext2');
        $.date = function(){
                return new Date().toLocaleTimeString();
        };
        var elements = {
        'border':'2px solid red'
        }
        if (textval.length == 0) {
                text.fadeIn(1000).css(elements);
                error.fadeIn(1000);
                setTimeout(function (){
                        text.attr('style' , '');
                        error.fadeOut(1000);
                        }, 2000)
                }
        else if (textval.length > 0){
                printmess.fadeIn(500);
                $.ajax({
                        type: "POST",
                        url: 'message.php',
                        data: formNm.serialize(),
                        success: function (data) {
                                //mess.fadeIn(500).html(data);
                                text.val('');
                                //mess.css("display" , "block");
                        }
                });
        }
        setTimeout (function () {
                //mess.fadeOut(200);
                printmess.fadeOut(300);
        }, 500);

});	
var realmess = $(".realtimecomment");
setInterval (function () {
        $.ajax({ 
                    url: "query.php",
                    cache: false,
                    success: function(html){
                        realmess.html(html);
                    }
                });
        }, 1000);
})
