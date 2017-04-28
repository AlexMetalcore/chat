<html>
<meta charset="utf-8">
<title>Чат</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script>
//document.onkeyup = function (e) {
//    e = e || window.event;
//    if (e.keyCode === 13) {
//        alert("Вы нажали Enter!");
//    }
//    return false;
//}
//document.getElementById("formcomment").onsubmit=
// function() {
//  alert(this.comment.value);
//  return false;
// }


</script>
<link type="text/css" rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/form.js"></script>
<script type="text/javascript" src="js/clock.js"></script>
<script type="text/javascript" src="js/message.js"></script>
<script type="text/javascript" src="js/delete.js"></script>
<script type="text/javascript" src="js/timer.js"></script>
</head>
<body class="realchat">
<div class="overlay"></div>
<div class="delmess">Вы точно хотите удалить сообщение?
<form id="messagedel" onsubmit="return false">
<input type="hidden" name="message" class="deletemess1" value="">
<input type="hidden" name="namemess" class="deletemess2" value="">
<input type="hidden" name="timemess" class="deletemess3" value="">
<input type="submit" name="send" value="Да" class="messyes">
<input type="button" name="nosend" value="Нет" class="messdel"><br>
<p id="echomessage"></p>
</form>
</div>
<?php
require_once ('commentdb.php');
session_start();
        $log = $_SESSION['login'];
	$id = $_SESSION['id'];
	$age = $row['age']; 
        if (empty($log) && empty($id)) {
                  echo '<div class="auto"><a href="login_add.php">Пожалуйста, авторизируйтесь</a>&nbsp;&nbsp;<br>редирект через...&nbsp;<span id="timer" long="4">5</span></div>';
                                header ("Refresh: 5; URL=http://chat.smart-city.com.ua/login_add.php");
        }
        else {
		function getage() {
			include "commentdb.php";
                        $userssql = $connect_db->query("SELECT *FROM users WHERE login='".$_SESSION['login']."';");
                        	while($row = $userssql -> fetch_array()){
                                		echo $row['age'].'&nbsp;лет';
                                }
                }

?>
<i><span id="clock"></span></i>
	<a class="logout" href="logout.php"><input type="submit" class="submit" value="Выйти  из чата"></a>
			<!--<audio controls loop><source src="/mp3/Pantera - Mouth For War.mp3"></audio>-->
	<form id="formcomment" onsubmit="return false">
<!--		<p style="margin: -10px 0; font-weight: bold; font-size: 18px;">
			<?php
			$userssql1 = $connect_db->query("SELECT *FROM users WHERE login='".$_SESSION['login']."' AND age='0';");
						if ($userssql1->num_rows > 0){
							echo $log;
						}
						else {
							echo $log.'&nbsp;, возраст&nbsp;'; getage();
						}
			?>
		</p><br>
		<textarea type="text" name="comment" id="comment" value="" placeholder="Введите сообщение..."></textarea><br><br><br>	
			<p class="errortext2">Напишите сообщение...</p>
		<input type="submit" value="Отправить" id="send"></br>
			<p id="textmessage">
				<?php include ('message.php'); ?>
			</p>
		<i><b class="chat">Чат</b></i>-->
			
			<p class="user">
                        <?php
                        $userssql1 = $connect_db->query("SELECT *FROM users WHERE login='".$_SESSION['login']."' AND age='0';");
                                                if ($userssql1->num_rows > 0){
                                                        echo $log;
                                                }
                                                else {
                                                        echo $log.'&nbsp;, возраст&nbsp;'; getage();
                                                }
                        ?>
                	</p><br>
			<div id="placecomment">
				<p id="messageprint">Печатают сообщение...</p>
					<p class="realtimecomment">
			<?php include ('query.php'); ?>
					</p>
			</div>
			<!--<p style="margin: -10px 0; font-weight: bold; font-size: 18px;">
                        <?php
                        $userssql1 = $connect_db->query("SELECT *FROM users WHERE login='".$_SESSION['login']."' AND age='0';");
                                                if ($userssql1->num_rows > 0){
                                                        echo $log;
                                                }
                                                else {
                                                        echo $log.'&nbsp;, возраст&nbsp;'; getage();
                                                }
                        ?>
                </p><br>-->
                <textarea type="text" name="comment" id="comment" value="" placeholder="Введите сообщение..."></textarea><br><br><br>
                        <p class="errortext2">Напишите сообщение...</p>
                <!--<input type="submit" value="Отправить" id="send"></br>-->
                        <p id="textmessage">
                                <?php include ('message.php'); ?>
                        </p>

	</form>
<?php require_once 'footer.php';?>
</body>
</html>
<?php
}
?>

