$(document).ready(function () {
        $("#formcomment").submit(function(event){
        var text = $('#comment').val();
        var formNm = $("#formcomment");
	var placecomment = $('#placecomment');
	var realtimecomment = $('#realtimecomment');
        $.date = function(){
                return new Date().toLocaleTimeString();
        };
        var elements = {
        'border':'2px solid red'
        }
        if (text.length == 0) {
                $('#comment').fadeIn(1000).css(elements);
                $('.errortext2').fadeIn(1000);
                setTimeout(function (){
                $('#comment').attr('style' , '');
                $('.errortext2').fadeOut(1000);
                        }, 2000)
                }
	else if (text.length > 0){
        	$('#messageprint').fadeIn(500);
        	$.ajax({
                	type: "POST",
                	url: 'message.php',
                	data: formNm.serialize(),
                	success: function (data) {
				$('#textmessage').fadeIn(500).html(data);
                		$("#comment").val('');
				$('#textmessage').css("display" , "block");
        		}
        	});
	}
	setTimeout (function () {
		$('#textmessage').fadeOut(500);
		$('#messageprint').fadeOut(1000);
	}, 1000);
	
});
setInterval (function () {
        $.ajax({ 
                    url: "query.php",
                    cache: false,
                    success: function(html){
                        $(".realtimecomment").html(html);
                    }
                });
        }, 3000);
//setInterval( function(){
//        $('.realtimecomment').load("/ .realtimecomment");
//        $('#messageprint').fadeOut(1000);
//        }, 3000);
})
