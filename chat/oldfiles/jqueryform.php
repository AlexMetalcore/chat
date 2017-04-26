<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Чатик</title>
<head>
<?php
require_once ('commentdb.php');
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>
<style type="text/css">
body {
	background-color: #EBE6E6;
	text-align: center;
}
a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
i	{
	color: red;
}
#comment {
	margin: 10px;
	padding: 10px;
	width: 200px;
	height: 200px;
	overflow: auto;
	background-color: #FCEFCF;
}
#name {
	background-color: #FCEFCF;
}
#send {
	margin: 0 10px;
	position: relative;
	top: -15px;
	width: 100px;
	height: 30px;
	font-family: italic;
	font-size: 15px;
	border-radius: 2px;
	background-color: #768DD6;	
}
#send:hover {
	cursor: pointer;
	background-color: #ccc;
	box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.8);
}
#placecomment {
	width: 500px;
	border: 1px solid black;
	height: 400px;
	overflow: auto;
	margin: 10px;
	/*margin: 65px 10px;*/
	padding: 0 10px;
	left: 90%;
	/*left: 50%;*/
	top: 0;
	position: absolute;
	text-align: left;
	border-radius: 10px;
	cursor: text;
	font-size: 16px;
	color: black;
	float: right;
        background-color: #CFEAFC;
	box-shadow: 4px 4px 4px 4px rgba(0,0,0,0.4);
}
.errortext , .errortext1 , .errortext2{
	display: none;
	font-weight: bold;
	font-size: 18px;
	font-style: oblique;
	position: relative;
	top: -42px;
	color: red;
}

.color {
	background-color: #D9AFAF;
}

#formcomment {
	position: relative;
	width: 50%;
	height: 500px;
	margin: 20px 20px;
	padding: 20px 10px;
	text-align: center;
}

.chat {
	/*margin: 10px 200px;*/
	margin: -45px 200px;
	color: black; 
	position: absolute; 
	/*left: 52%;*/
	left: 95%;
	top: 25px; 
	font-size: 25px;
}
#messageprint {
	display: none;
	color: red;
	margin: 10px 10px;
}
/*.realtimecomment {
	margin: 0 10px;
}*/
</style>
<script type="text/javascript">
	$(document).ready(function () {
	$("#formcomment").submit(function(event){
	var text = $('#comment').val();
	var nametext = $('#name').val();
	var formNm = $("#formcomment");
	$.date = function(){
    		return new Date().toLocaleTimeString();
	};
	var elements = {
	'border':'2px solid red'
	}
	if (text.length == 0 && nametext.length == 0) {
                $('#comment , #name').fadeIn(1000).css(elements);
                $('.errortext').fadeIn(1000);
                setTimeout(function (){
                $('#comment , #name').attr('style' , '');
                $('.errortext').fadeOut(1000);
		        }, 2000)
		}
	else if (nametext.length == 0 && text.length > 0) {
		$('#name').fadeIn(1000).css(elements);
                $('.errortext1').fadeIn(1000);
                setTimeout(function (){
                $('#name').attr('style' , '');
                $('.errortext1').fadeOut(1000);
                        }, 2000)
                }
	else if (nametext.length > 0 && text.length == 0) {
                $('#comment').fadeIn(1000).css(elements);
                $('.errortext2').fadeIn(1000);
                setTimeout(function (){
                $('#comment').attr('style' , '');
                $('.errortext2').fadeOut(1000);
                        }, 2000)
                }
else if (text.length > 0 && nametext.length > 0){
	$('#messageprint').fadeIn(500);
	$.ajax({
                type: "POST",
                url: '',
		data: formNm.serialize(),
                success: function (data) {
		//$("#placecomment").prepend("<p class='realtimecomment'><br>Сообщение отправлено в "+ $.date() + ": " + text + '<br>' + '<i>пользователь\u0020'  + nametext  +  '</i>'  +  "</p>");
		$("#name , #comment").val('');
	}
	});
}
});
setInterval( function(){
        $('.realtimecomment').load("jqueryform.php .realtimecomment");
	$('#messageprint').fadeOut(1000);
        }, 3000);


$(document).on("click" ,"a", function(event){
	var name = $(this).html()
	$('#name').val(name);	
})

$(document).on("click" , "#name" , function (){
	if ($('#name').attr('type') != null){
	$('#name').val('');
	}
})
})
</script>
</head>
<body>
<audio controls loop><source src="/mp3/Pantera - Mouth For War.mp3"></audio>
<form id="formcomment" onsubmit="return false">
<p style="margin: -10px 0;"><input type="text" name="name" id="name" value="" placeholder="Ваше имя..."></p><br>
<textarea type="text" name="comment" id="comment" value="" placeholder="Введите сообщение..."></textarea><br><br>
<p class="errortext">Заполните поля...</p>
<p class="errortext1">Введите имя...</p>
<p class="errortext2">Напишите сообщение...</p>
<input type="submit" value="Отправить" id="send"></br>
<p id="textmessage">
<?php
setlocale(LC_TIME,  "ru_RU.UTF-8");
$str = strftime("%e  %B  %A");
//$str = mb_convert_case($str , MB_CASE_TITLE, "UTF-8");
$today = date("Y-m-d H:i:s");
$sql = "INSERT INTO `comments` (`name` , `comment` , `commenttime` , `day`) VALUES ('".$name."' , '".$comment."' , '$today' , '$str')";
if (isset($_POST["name"]) && isset($_POST["comment"]) == 'true' && !empty($name) && !empty($comment)) {
                $result = $connect_db->query($sql);
                $row_count = $result->nuw_rows;
                        if ($result === TRUE && !empty($_POST["name"]) && !empty($_POST["comment"])){
                                echo '<br>Сообщение отправлено пользователем '.$name.'';
                        }
	}
else if (empty($name) && empty($comment)){

	echo "";
}
?>
</p>
<b class="chat">Чатик</b>

<div id="placecomment">
<p id="messageprint">Печатают сообщение...</p>
<p class="realtimecomment">
<?php
$commentsql = $connect_db -> query("SELECT *FROM comments WHERE id ORDER BY id DESC;");
                while ($row = $commentsql -> fetch_array()){
                //echo '<br><br>Сообщение отправлено в&nbsp;<b>'.$row["commentdate"].'</b>: &nbsp;' .$row["comment"]. '<br><i>пользователь&nbsp;&nbsp;<a href="#" class="namesend">' .$row["name"]. '</a></i>' ;
                echo '<br><br>Сообщение:&nbsp;'.$row["comment"]. '<br><i>пользователь&nbsp;&nbsp;<a href="#" class="namesend">' .$row["name"]. '</a></i><br><b>Дата и время:&nbsp;'.$row["day"]. '&nbsp;в&nbsp;' .$row["commenttime"]. '</b>';
		}
?>
</p>
</div>
</form>
</body>
</html>


