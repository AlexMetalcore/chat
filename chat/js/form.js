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
}).submit(function() {
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
function readImage ( input ) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
        $('#preview').fadeIn(2000).attr('src', e.target.result).addClass('img');
	$('#image').fadeOut(2000).css('display','none');
      }
 
      reader.readAsDataURL(input.files[0]);
    }
  }
	$('#image').change(function(){
    		readImage(this);
  	});
$('#image').click(function () {

if ($('#image').css('display')) {
                //e.preventDefault();
        $('#send1:disabled').removeAttr('disabled');
        }
});

$("#avatar").submit("submit", function (event) {
	//if ($('#image').css('display')) {
		//e.preventDefault();
	//$('#send1:disabled').removeAttr('disabled');
	//}
	//$('#send1')[0].disabled = false;
	//}
 var form_avatar = $("#avatar");
	var files = form_avatar, formData = new FormData(files.get(0));
        var mess = $(".errormess");
        $.ajax({
                        type: "POST",
                        url: '../img/upload.php',
                        cache: false,
                        contentType: false,
                        processData: false,
			data: formData,
                        success: function (data) {
                                mess.fadeIn(1000).html(data);
				mess.delay(3000).fadeOut(1000).html(data);
				$('#send1').prop('disabled' , true);
				
                        }
                });
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
